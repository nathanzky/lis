<?php
ini_set('display_errors', 'On');
date_default_timezone_set("Asia/Manila");
$con="true";
include "connect.php";
$priv = $privy[previewrequest];
include "log.php";

$patientid=$_POST[patientid];
$mt=$_POST[mt]; //medical Technician
$rp=$_POST[rp]; //requesting physician
$pt=$_POST[pt]; // pathologist
$dr=$_POST[dr]; //date received
$do=$_POST[dor]; //date ordered
$list = $_POST[testid]; // mga na check na i sub test
$tests = $_POST[ltest]; // list of test na dapat i test
$sg=$_POST[sg]; //Sonologist
$rg = $_POST[rg]; //Radiologist
$cc = $_POST[cc];
$t=count($list);

//Get some patient info
$sq = "SELECT * FROM patient FORCE INDEX(PRIMARY) where  patientid='$patientid'";
$rc = $links->query($sq) or die($links->error);
$datas = $rc->fetch_assoc();

function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);

}
$b = "$patientid-$datas[lastname]-$datas[firstname]-$datas[mi]";
//$barcode = "barcode/$b.png";
$sex = $datas[sex];
$cs= $datas[civil_status];
$address1= $datas[address]." ".$datas[city]." ".$datas[province];

$yrs = dateDifference($datas[bday],date("Y-m-d"),'%y');
$mos = dateDifference($datas[bday],date("Y-m-d"),'%m');
$days = dateDifference($datas[bday],date("Y-m-d"),'%d');
if($yrs < 12){
	if($yrs < 1) {
		if($mos < 1)
		{
			$dateofbirt = dateDifference($datas[bday],date("Y-m-d"),'%d'.' days');
		}
		else{
			$dateofbirt = dateDifference($datas[bday],date("Y-m-d"),'%m'.' m'.' %d'.' d');
			}
	}
	else {
$dateofbirt = dateDifference($datas[bday],date("Y-m-d"),'%y'.' y'.' %m'.' m');
}
}
else {
$dateofbirt = dateDifference($datas[bday],date("Y-m-d"),'%y'.' yrs');
}
		//save muna ang sales...
		$dd = explode("-",$dr);
		$m = $dd[1];
		$d = $dd[2];
		$y = $dd[0];


	$topay = $_POST[total];
    $gross = $topay + $discount;
	$amountpaid = $_POST[paid];
	$balance = $topay;

	if($balance < 1)
		{
		  $rem = "Paid";
		}	else
			{
				$rem = "Not Paid";
			}

if($_POST[submit]=="Save")
	{ //save

if($_COOKIE[saved]=="not") { // mag save sa sales na database kung hindi ni reload ng user ang browser nya
		$links->query("INSERT INTO sales value('','$datas[lastname], $datas[firstname] $datas[mi]','$tests','$topay','$rem','$patientid','$m','$d','$y','','','','','','$_POST[inout]','','$topay','$topay','$dr')") or die($links->error);
		$lastid = $links->insert_id;
									}
									else { //kung nag reload lang ang user dito mapupunta para makuha yong last id ng sales
										   	$result = $links->query("SELECT MAX(id) as lastid FROM sales") or die($links->error);
											$row = $result->fetch_assoc() ;
											$lastid = $row[lastid];
									}

 $input = $lastid;
 $transactionid = str_pad($input, 5, "0", STR_PAD_LEFT);

for($i=0;$i < $t; $i++)
	{
		$data = explode("-",$list[$i]);
		if($tests == "X Ray" || strtoupper($tests)=="ROENTGENOLOGICAL") {
			$mt = '';
			$pt = $rg;
		}elseif (strtoupper($tests)=="ULTRASOUND") {
			$mt='';
			$pt = $sg;
		}

		$insValues .= "('', '$patientid','$data[0]','','','','$do','$dr','','$data[4]','$rp','$mt','$pt','$lastid'),";
		$labtest .= "$data[1]-$data[2]-$data[3]-$data[4]-$data[5]<br>";
	}

if($_COOKIE[saved]=="not") { // mag save sa test na table kung hindi reload ang browser
//save record....
			$insValues = rtrim($insValues,",");
   //save ang test
			$links->query("INSERT INTO test value $insValues") or die($links->error);


}

setcookie("saved", "done", time() + (86400 * 3), "/"); // kailangan gumamit ng cookies to check kung ni reload ng user ang browser.. need ito para maiwasan ang duplicate saving


include "header.php";
echo "<h3>Record is successfully saved...</h3>";

//Para pag gustong i print ng user ang mga test request...

echo "<form method='post' action='#' target='_bago'>";
echo "<input type='hidden' name='patientid' value='$_POST[patientid]'>
 <input type='hidden' name='mt' value='$_POST[mt]'>
<input type='hidden' name='rp' value='$_POST[rp]'>
<input type='hidden' name='pt' value='$_POST[pt]'>
<input type='hidden' name='dr' value='$_POST[dr]'>
<input type='hidden' name='dor' value='$_POST[dor]'>
<input type='hidden' name='cc' value='$_POST[cc]'>
<input type='hidden' name='lastid' value='$lastid'>
<input type='hidden' name='total' value='$topay'>
<input type='hidden' name='paid' value='$amountpaid'>
";

$list = $_POST[testid]; // mga na check na i sub test
for($i=0; $i < count($list); $i++)
	{
		echo "<input type='hidden' name='testid[]' value='$list[$i]'>";
	}
		echo "<input type='hidden' name='ltest' value='$_POST[ltest]'>";

echo "<input type='submit' name='submit' value='Print Request'>";
echo "</form>";
include "footer.php";

	} //end of condition save
	else { //preview


$lastid=$_POST[lastid]; // ito yong last id na nasave sa sales na table
$input = $lastid;
if($input > 0) $transactionid = str_pad($input, 5, "0", STR_PAD_LEFT);	//gagawa ng transaction id 5 digits
for($i=0;$i < $t; $i++)
	{
		$data = explode("-",$list[$i]);
        $labtest .= "$data[1]-$data[2]-$data[3]-$data[4]-$data[5]<br>";// gumawa ng condition kung N/A yong data 3 para dina mag pakita
	}

//Start of pdf creation for printable output...
$fname  =strip_tags($config[3]);

$fname=stripslashes(str_replace("\r","",$fname)); //filename of log
$rtitle = $config[0];
$address = $config[1];
$phone = $config[2];
$license = $config[4];
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image("$GLOBALS[fname]",30,6,160);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Move to the right
    //$this->Cell(80);
    // Title
   // $this->Cell(30,10,"$GLOBALS[rtitle]",0,0,'C');
	$this->Ln(14);
	 $this->SetFont('Arial','',16);
	$this->Cell(0,8,"$GLOBALS[address]",0,1,'C');
	$this->SetFont('Arial','',16);
	
	$this->Ln(5);
	$this->SetFont('Arial','B',15);
	$this->Cell(0,10,"Request Form",0,1,'C');
	$this->Ln(5);
    // Line break
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
	$this->SetX(69);
    // Arial italic 8
	// $this->Image("$GLOBALS[barcode]");
    $this->SetFont('Arial','I',8);
    // Page number
	$this->SetX(0);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


// Instanciation of inherited class
$pdf = new PDF("P","mm","letter");
$pdf->AliasNbPages();


$toshow = explode("<br>",$labtest);
$mtest = explode(",",$tests);
for($ii=0; $ii < count($mtest); $ii++)
	{
		$search = $mtest[$ii];
		$matches = array_filter($toshow, function($var) use ($search) { return preg_match("/\b$search\b/i", $var); });


$pdf->AddPage();

$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','',11);

$pdf->Cell(150,6,"Date : " .date("Y-m-d"),0,0,'L',true);
$y = $pdf->GetY() + 6;
$pdf->Line(22,$y-1,50,$y-1);

$pdf->Cell(50,6,"Lab No : $transactionid",0,1,'L',true);
$pdf->Line(177,$y-1,192,$y-1);

$pdf->SetFont('Arial','',11);
$pdf->Cell(40,6,'Name of Patient: ',0,0,L,true);
$pdf->SetFont('Arial','',11);
$firstnamestring = utf8_decode($datas[firstname]);
$lastnamestring = utf8_decode($datas[lastname]);
$pdf->Cell(150,6,"$lastnamestring".","." $firstnamestring".",". " $datas[mi]",0,1,'L',true);
//$pdf->Cell(150,6,"$datas[lastname], $datas[firstname] $datas[mi]",0,1,'L',true);
$y = $pdf->GetY();
$pdf->Line(43,$y-1,192,$y-1);

$pdf->Cell(17,6,"Address :",0,0,'L',true);
$pdf->SetFont('Arial','',10.5);
$addstring = utf8_decode($address1);
$pdf->Cell(73,6,"$addstring",0,0,'L',true);
$y = $pdf->GetY() + 6;
$pdf->Line(28,$y-1,105,$y-1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(30,6,"Age : $dateofbirt",0,0,'L',true);
$pdf->Line(110,$y-1,134,$y-1);
$pdf->Cell(30,6,"Sex : $sex",0,0,'L',true);
$pdf->Line(140,$y-1,160,$y-1);
$pdf->Cell(30,6,"C.S. : $cs",0,1,'L',true);
$pdf->Line(171,$y-1,192,$y-1);


$pdf->Cell(10,6,"CC :",0,0,'L',true);
$pdf->SetFont('Arial','',10.5);
$pdf->Cell(90,6,"$cc",0,0,'L',true);
$y = $pdf->GetY() + 6;
$pdf->Line(20,$y-1,107,$y-1);


$pdf->SetFont('Arial','',11);
$pdf->Cell(105,6,"Requesting Physician : ".utf8_decode($rp),0,0,'L',true);
$pdf->Line(152,$y-1,192,$y-1);

$pdf->Ln(10);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,10,"$search",0,1,'C');
//$pdf->Ln(10);

$pdf->SetFont('Times','',12);
//create a table
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('','B');
    // Header
        $pdf->Cell(150,7,"Lab Test",1,0,'C',true);
		$pdf->Cell(30,7,"Price",1,0,'C',true);
        $pdf->Ln();
    // Color and font restoration
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    // Data
	   $fill=false;


		foreach ($matches as $value) {
		$dat=explode("-",$value);
		if($dat[2] != "NA" && $dat[2] != "N/A" && $dat[2] != "na" && $dat[2] != "n/a" && $dat[2] != "") {
				$col1 = "     " .$dat[1];
				  if($lasd1 != $dat[0]) {
				//	 $pdf->SetFont('Times','B',12);
				//	$pdf->Cell(150,6,$dat[0],'1',0,'L',true);
				//	$pdf->Cell(30,6,'','1',0,'R',true);
				//	$pdf->Ln();
				  }
					$lasd1 = $dat[0];
					$pdf->SetFont('Times','',12);
					//$pdf->Cell(180,6,$col1,'1',1,'L',true);
					$pdf->Cell(150,6,$col1.' - '.$dat[2],'1',0,'L',true);
					$pdf->Cell(30,6,number_format($dat[3]),'1',0,'R',true);
					$pdf->Ln();
		}else{
		$col1 = "     " .$dat[1];
			     if($col1 != "") {

					//$pdf->Cell(180,6,$col1,'1',1,'L',true);
					$pdf->Cell(150,6,$col1,'1',0,'L',true);
					$pdf->Cell(30,6,number_format($dat[3]),'1',0,'R',true);
					$pdf->Ln();
					$fill = !$fill;
					$lasd1="";
					}
		}

		}
	} //unang for

		$pdf->SetFont('Times','B',12);
		$pdf->Cell(150,6,"",'1',0,'L',true);
		$pdf->Cell(30,6,"",'1',0,'R',true);
		$pdf->Ln();

		if($_POST[discount]!="" && $_POST[discount]!="0")
			{
	//	$pdf->SetFont('Times','B',12);
	//	$pdf->Cell(80,6,"Discount Type:",'1',0,'L',true);
	//	$pdf->Cell(70,6,$discname,'1',0,'L',true);
	//	$pdf->Cell(30,6,$discpercent,'1',0,'L',true);
	//	$pdf->Ln();

	//	$pdf->SetFont('Times','B',12);
	//	$pdf->Cell(150,6,"Total Discount:",'1',0,'L',true);
	//	$pdf->Cell(30,6,$discount,'1',0,'R',true);
	//	$pdf->Ln();
			}


		$pdf->SetFont('Times','B',12);
		$pdf->Cell(150,6,"Total Amount",'1',0,'L',true);
		$pdf->Cell(30,6,number_format($topay,'2','.',''),'1',0,'R',true);
        $pdf->Ln();


		//$pdf->SetFont('Times','B',12);
		//$pdf->Cell(150,6,"Total Amount Paid",'1',0,'L',true);
		//$pdf->Cell(30,6,number_format($amountpaid,'2','.',''),'1',0,'R',true);
        //$pdf->Ln();

		//$pdf->SetFont('Times','B',12);
		//$pdf->Cell(150,6,"Total Balance",'1',0,'L',true);
		//$pdf->Cell(30,6,number_format($balance,'2','.',''),'1',0,'R',true);




    // Closing line

	//$pdf->Cell(2,0,'','T');
//end of table creation
 $pdf->Output();
	}
?>
