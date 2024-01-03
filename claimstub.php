<?php
date_default_timezone_set("Asia/Manila");
$con="true";
include "connect.php";
$priv = $privy[printbilling];
include "log.php";
 

$patientid=$_POST[patientid];
$mt=$_POST[mt];
$rp=$_POST[rp];
$pt=$_POST[pt];
$dr=$_POST[dr];
$do=$_POST[dor];
$list = $_POST[testid];
$lastid = $_POST[si];
	
$t=count($list);

//Get some patient info
$sq = "SELECT * FROM patient FORCE INDEX(PRIMARY) where  patientid='$patientid'";
$rc = $links->query($sq) or die($links->error);
$datas = $rc->fetch_assoc();
$paddress = $datas[address]." ".$datas[city]." ".$datas[province];

function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
    
    $interval = date_diff($datetime1, $datetime2);
    
    return $interval->format($differenceFormat);
    
}

$b = "$patientid-$datas[lastname]-$datas[firstname]-$datas[mi]";
//$barcode = "barcode/$b.png";

$dateofbirt = dateDifference($datas[bday],date("Y-m-d"),'%y yrs & %m mos old');

		//save muna ang sales...
		$dd = explode("-",$dr);
		$m = $dd[1];
		$d = $dd[2];
		$y = $dd[0];
		//$rem=$_POST[rem];
		$gross= $_POST[gross];
		$balance = $_POST[balance];
		$sdiscname = $_POST[discountname];
		$sdiscpercent = $_POST[discpercent];
		$disa = $_POST[discount];
		$od = $_POST[od];
		$totdisc = $disa;
		$paid = $_POST[paid];
        $topay = $_POST[topay];

 $input = $_POST[si];
 
 if($balance < 1) $rem = "Paid";
 if($balance > 0) $rem = "No Paid";
 $transactionid = str_pad($input, 5, "0", STR_PAD_LEFT);
 
for($i=0;$i < $t; $i++)
	{
		$data = explode("-",$list[$i]);
        $labtest .= "$data[0]-$data[1]-$data[2]-$data[3]<br>";// gumawa ng condition kung N/A yong data 3 para dina mag pakita
	}



//Start of pdf creation for printable output...
$fname  =strip_tags($config[3]);
 
$fname=stripslashes(str_replace("\r","",$fname)); //filename of logo
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
    $this->Image("$GLOBALS[fname]",20,6,120);
    // Arial bold 15
    $this->SetFont('Arial','B',13);
    // Move to the right
    //$this->Cell(60);
    // Title
    //$this->Cell(30,8,"$GLOBALS[rtitle]",0,0,'C');
	$this->Ln(14);
	 $this->SetFont('Arial','',10);
	//$this->Cell(0,5,"$GLOBALS[address]",0,1,'C');
	$this->SetFont('Arial','',10);
	//$this->Cell(0,5,"Tel No. $GLOBALS[phone]",0,1,'C');
	$this->SetFont('Arial','B',15);
	$this->Cell(0,10,"CLAIMSTUB",0,1,'C');
    // Line break
   // $this->Ln();


}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    //$this->SetY(-25);
	//$this->SetX(69);
    // Arial italic 8
	 //$this->Image("$GLOBALS[barcode]");
$this->SetY(-25);	
$this->Cell(55,5,"",'0',0,'L',true);
$y = $this->GetY() + 5;
$this->Line(10,$y,55,$y);
$this->Cell(55,5,"",'0',0,'L',true);
$this->Line(60,$y,100,$y);
$this->Ln(5);
$this->SetFont('Arial','',12);
$this->Cell(50,5,"Authorized by" ,'T',0,'C',true);
$this->Cell(10,5,"" ,'0',0,'C',true);
$this->Cell(50,5,"Received by",'T',0,'C',true);


    // Page number or NOTE:
	$this->Ln(5);
    $this->SetFont('Arial','BI',12);
    $this->SetY(-10);
	$this->SetX(0);
	$this->Cell(0,5,"Note: Bring this stub for claiming results",'0',0,'C');
	//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$toshow = explode("<br>",$labtest);
// Instanciation of inherited class
$pdf = new PDF("P","mm","a5");
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','',10);
$pdf->Cell(25,5,"Patient Name: ",0,0,'L');
$firstnamestring = utf8_decode($datas[firstname]);
$lastnamestring = utf8_decode($datas[lastname]);
$pdf->Cell(65,5,"$lastnamestring, $firstnamestring $datas[mi]",B,0,'L');

$pdf->Cell(17,5,"Lab No : ",0,0,'R');
$pdf->Cell(15,5,"$transactionid",B,1,'R');

$pdf->Cell(18,5,"Address: ",0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(72,5,"$paddress",B,0,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(13,5,"Date:  ",0,0,'R');
$pdf->Cell(20,5,"$dr",B,1,'L');

//$pdf->SetY(50);
//$pdf->SetX(130);
$pdf->Ln();
//$pdf->SetFont('Arial','B',15);
//$pdf->Cell(0,10,"$_POST[test]",0,1,'C');


$pdf->SetFont('Times','',11);
//create a table 
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('','B');
    // Header
        $pdf->Cell(90,6,"Description",1,0,'C',true);
		$pdf->Cell(30,6,"Price",1,0,'C',true);
        $pdf->Ln();
    // Color and font restoration
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    // Data
	   $fill=false;
	   for($i=0;$i<count($toshow);$i++){
		
		$dat=explode("-",$toshow[$i]);
		
		if($dat[1] != "NA" && $dat[1] != "N/A" && $dat[1] != "na" && $dat[1] != "n/a" && $dat[1] != "") {
				$col1 = "     " .$dat[1];
				  if($lasd1 != $dat[0]) {
					 $pdf->SetFont('Times','B',11); 
					$pdf->Cell(90,5,$dat[0],'1',0,'L',true);
					$pdf->Cell(30,5,'','1',0,'R',true);
					$pdf->Ln();
				  }
					  $lasd1 = $dat[0];
					  $pdf->SetFont('Times','',11);
					  $pdf->Cell(90,5,$col1.' - '.$dat[2],'1',0,'L',true);
					  $pdf->Cell(30,5,number_format($dat[3],2),'1',0,'R',true);
					  $pdf->Ln();
		}else{
		$col1 = $dat[0];
			     if($col1 != "") {
					$pdf->Cell(90,5,$col1,'1',0,'L',true);
					$pdf->Cell(30,5,number_format($dat[3],2),'1',0,'R',true);
					$pdf->Ln();
					$fill = !$fill;
					$lasd1="";
					}		
		}
		
		}
		$pdf->SetFont('Times','B',11);
		$pdf->Cell(90,5,"",'1',0,'L',true);
		$pdf->Cell(30,5,"",'1',0,'R',true);
				$pdf->Ln();	

		$pdf->SetFont('Times','B',11);
		$pdf->Cell(90,5,"Gross Amount",'1',0,'L',true);
		$pdf->Cell(30,5,number_format($gross,'2','.',''),'1',0,'R',true);
		$pdf->Ln();		


		
				if($_POST[discount]!="" && $_POST[discount]!="0") 
			{
		$pdf->SetFont('Times','B',11);
		$pdf->Cell(90,5,"Discount: ".$sdiscname,'1',0,'L',true);
		$discperc = $sdiscpercent*100;
		$pdf->Cell(30,5,$discperc." %",'1',0,'R',true);
		$pdf->Ln();		

		$pdf->Cell(90,5,"Other Discount",'1',0,'L',true);
		$pdf->Cell(30,5,number_format($od,'2','.',''),'1',0,'R',true);
		//$pdf->Cell(40,5,$od,'1',0,'R',true);
		$pdf->Ln();	

		$pdf->SetFont('Times','B',11);
		$pdf->Cell(90,5,"Total Discount",'1',0,'L',true);
		$pdf->Cell(30,5,number_format($totdisc,'2','.',''),'1',0,'R',true);
		$pdf->Ln();
			}
		
		$pdf->Cell(120,5,"",'1',1,'L',true);
		$pdf->SetFont('Times','B',11);
		$pdf->Cell(90,5,"To Pay",'1',0,'L',true);
		$pdf->Cell(30,5,number_format($topay,'2','.',''),'1',0,'R',true);
		$pdf->Ln();	
		
		$pdf->SetFont('Times','B',11);
		$pdf->Cell(90,5,"Amount Paid",'1',0,'L',true);
		$pdf->Cell(30,5,number_format($paid,'2','.',''),'1',0,'R',true);
        $pdf->Ln();
		
		$pdf->SetFont('Times','B',11);
		$pdf->Cell(90,5,"Balance",'1',0,'L',true);
		$pdf->Cell(30,5,number_format($balance,'2','.',''),'1',0,'R',true);
		
		
    // Closing line
setcookie("pi", $patientid, time() + (86400 * 3), "/"); 
setcookie("ct", $_POST[test], time() + (86400 * 3), "/"); 
	//$pdf->Cell(2,0,'','T');
//end of table creation
$pdf->Output();
?>

 