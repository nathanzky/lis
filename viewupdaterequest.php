<?php
ini_set('display_errors', 'On');
date_default_timezone_set("Asia/Manila");
$con="true";
include "connect.php";
$priv = $privy[viewupdaterequest];
include "log.php";


$patientid=$_POST[patientid];
$mt=$_POST[mt]; //medical Technician
$rp=$_POST[rp]; //requesting physician
$pt=$_POST[pt]; // pathologist
$dr=$_POST[dr]; //date received
$do=$_POST[dor]; //date ordered
$list = $_POST[testid]; // mga na check na i sub test
$tests = $_POST[ltest]; // list of test na dapat i test
$lastid = $_POST[si];
$patient = $_POST[pn];
$sg=$_POST[sg]; //Sonologist
$rg = $_POST[rg]; //Radiologist
$cc = $_POST[cc]; //Chief Complaint

$t=count($list);

 //Note... i check kung yong submit button is Delete.. kung delete.. i delete yong record...

 if($_POST[submit]=="Delete Record!")
	{
	setcookie("legit", "yes", time() + (86400), "/");
 ?>

   <script>
var ask = window.confirm("Are you sure you want to delete this record now?");
    if (ask) {
		document.location.href = "updaterequest.php?si=<?=$_POST[si]?>&c=yes";
        }else {
			//document.location.href = "pending.php";
			document.location.href = "updaterequest.php?pi=<?=$_POST[patientid]?>&si=<?=$_POST[si]?>&test=<?=$_POST[ltest]?>&pn=<?=$_POST[pn]?>&rem=<?=$rem?>&d=<?=$_POST[disa]?>&bal=<?=$_POST[balance]?>";
        }
 </script>
   <?php
   exit;
	}

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
$sex=$datas[sex];
$cs=$datas{civil_status};
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
$dateofbirt = dateDifference($datas[bday],date("Y-m-d"),'%y');
}

		//save muna ang sales...
		$dd = explode("-",$dr);
		$m = $dd[1];
		$d = $dd[2];
		$y = $dd[0];
		$od = $_POST[od];
		$disc = $_POST[discount];
		$dis = $od + $disc;
		$gross = $_POST[gross];
		$topay = $_POST[topay];
		$balance = $_POST[balance];
		if($balance > 0) {
			$rem="Not Paid";
		}else{
			$rem = "Paid";
		}

 $input = $_POST[si];
 $transactionid = str_pad($input, 5, "0", STR_PAD_LEFT);
for($i=0;$i < $t; $i++)
	{
		$data = explode("-",$list[$i]);

		if($tests == "X Ray"  || strtoupper($tests)=="ROENTGENOLOGICAL") {
			$mt = '';
			$pt = $rg;
		}elseif (strtoupper($tests)=="ULTRASOUND") {
			$mt='';
			$pt = $sg;
		}

		$insValues .= "('', '$patientid','$data[0]','','','','$do','$dr','','$data[4]','$rp','$mt','$pt','$lastid'),";
        $labtest .= "$data[1]-$data[2]-$data[3]-$data[4]-$data[5]<br>";// gumawa ng condition kung N/A yong data 3 para dina mag pakita
	}


//Kung save... ito lang mang yayari tapos exit na
if($_POST[submit]=="Save!")
	{
		if($_COOKIE[save]=="not") {
	//update sales
	    $links->query("Update sales SET  patient='$patient',
						amount='$topay',
						rem='$rem',
						discount='$dis',
						month='$m',
						day='$d',
						year='$y',
						balance='$balance',
						gross='$gross',
						cdate='$dr',
						particular='$tests'
						where id='$_POST[si]'") or die($links->error);
		//echo "dito pa umabot....";
		//dele all records from test table para i insert nalang yong bago...
		$links->query("Delete from test where salesid='$lastid'") or die($links->error);

//save record....
			$insValues = rtrim($insValues,",");
   //save ang test		Update record
			$links->query("INSERT INTO test value $insValues") or die($links->error);

}
setcookie("save", "done", time() + (86400 * 3), "/"); // kailangan gumamit ng cookies to check kung ni reload ng user ang browser.. need ito para maiwasan ang duplicate saving

include "header.php";
echo "<h3>Record is successfully updated...</h3>";
echo "<form method='post' action='#' target='_bago'>";
echo "<input type='hidden' name='patientid' value='$_POST[patientid]'>
 <input type='hidden' name='mt' value='$_POST[mt]'>
<input type='hidden' name='rp' value='$_POST[rp]'>
<input type='hidden' name='pt' value='$_POST[pt]'>
<input type='hidden' name='dr' value='$_POST[dr]'>
<input type='hidden' name='dor' value='$_POST[dor]'>
<input type='hidden' name='cc' value='$_POST[cc]'>
<input type='hidden' name='gross' value='$gross'>
<input type='hidden' name='si' value='$lastid'>
<input type='hidden' name='total' value='$topay'>
<input type='hidden' name='dis' value='$dis'>
<input type='hidden' name='od' value='$od'>
<input type='hidden' name='paid' value='$paid'>
<input type='hidden' name='balance' value='$balance'>";



$list = $_POST[testid]; // mga na check na i sub test
for($i=0; $i < count($list); $i++)
	{
		echo "<input type='hidden' name='testid[]' value='$list[$i]'>";
	}

		echo "<input type='hidden' name='ltest' value='$_POST[ltest]'>";



echo "<input type='submit' name='submit' value='Print!'>
	</form>";
include "footer.php";
	exit;
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
    $this->SetFont('Arial','B',16);
    // Move to the right
    //$this->Cell(80);
    // Title
   // $this->Cell(0,10,"$GLOBALS[rtitle]",0,0,'C');
	$this->Ln(14);
	 $this->SetFont('Arial','',12);
	$this->Cell(0,8,"$GLOBALS[address]",0,1,'C');
	$this->SetFont('Arial','',12);
	//$this->Cell(0,5,"Tel No. $GLOBALS[phone]",0,1,'C');
	//$this->SetFont('Arial','',12);
	//$this->Cell(0,5,"Lincese No. $GLOBALS[license]",0,1,'C');
    // Line break
	$this->Ln(5);
	$this->SetFont('Arial','B',15);
	$this->Cell(0,10,"Examination Request",0,1,'C');
    $this->Ln(5);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//$toshow = explode("<br>",$labtest);
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
$pdf->Cell(73,6,"$address1",0,0,'L',true);
$y = $pdf->GetY() + 6;
$pdf->Line(28,$y-1,95,$y-1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(30,6,"Age : $dateofbirt",0,0,'L',true);
$pdf->Line(110,$y-1,144,$y-1);
$pdf->Cell(30,6,"Sex : $sex",0,0,'L',true);
$pdf->Line(140,$y-1,170,$y-1);
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
				 // if($lasd1 != $dat[0]) {
				//	 $pdf->SetFont('Times','B',12);
				//	$pdf->Cell(150,6,$dat[0],'1',0,'L',true);
				//	$pdf->Cell(30,6,'','1',0,'R',true);
				//	$pdf->Ln();
				 // }
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

		//		if($_POST[discount]!="" && $_POST[discount]!="0" && $_POST[discount]!="0.00")
		//	{
		//$pdf->SetFont('Times','B',12);
		//$pdf->Cell(150,6,"Other Discount",'1',0,'L',true);
		//$pdf->Cell(30,6,number_format($od,'2','.',''),'1',0,'R',true);
		//$pdf->Ln();

		//$pdf->SetFont('Times','B',12);
		//$pdf->Cell(150,6,"Total Discount",'1',0,'L',true);
		//$pdf->Cell(30,6,number_format($dis,'2','.',''),'1',0,'R',true);
		//$pdf->Ln();
		//	}

		$pdf->SetFont('Times','B',12);
		$pdf->Cell(150,6,"Total Amount",'1',0,'L',true);
		$pdf->Cell(30,6,number_format($gross,'2','.',''),'1',0,'R',true);
        $pdf->Ln();


		//$pdf->SetFont('Times','B',12);
		//$pdf->Cell(150,6,"Total Amount Paid",'1',0,'L',true);
		//$pdf->Cell(30,6,number_format($paid,'2','.',''),'1',0,'R',true);
    	//$pdf->Ln();


		//$pdf->SetFont('Times','B',12);
		//$pdf->Cell(150,6,"Balance",'1',0,'L',true);
		//$pdf->Cell(30,6,number_format($balance,'2','.',''),'1',0,'R',true);


    // Closing line
//setcookie("pi", $patientid, time() + (86400 * 3), "/");
//setcookie("ct", $_POST[test], time() + (86400 * 3), "/");
	//$pdf->Cell(2,0,'','T');
//end of table creation
 $pdf->Output();
?>
