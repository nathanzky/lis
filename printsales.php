<?php
$con="true";
include "connect.php";
$priv = $privy[printsales];
include "log.php";
$cdate=$_POST[cdate];
$tdate = $_POST[tdate];
$testtype = $_POST[testtype];
if($cdate == "") $cdate=date("Y-m-d");

 
		
if(!empty($tdate)) 
	{
		$sql = "SELECT * FROM sales where sales.cdate BETWEEN '$cdate' AND '$tdate' AND particular LIKE '$testtype%' ";
		$range = "From $cdate to $tdate";
	}else{
		$sql = "SELECT * FROM sales where sales.cdate BETWEEN '$cdate' AND '$nowdate' AND particular LIKE '$testtype%' ";
		$range = $cdate;
	}		

$rec = $links->query($sql) or die($links->error);


	

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
    $this->Cell(80);
    // Title
    //$this->Cell(30,10,"$GLOBALS[rtitle]",0,0,'C');
	$this->Ln(14);
	 $this->SetFont('Arial','',12);
	$this->Cell(0,8,"$GLOBALS[address]",0,1,'C');
	$this->SetFont('Arial','',12);
	//$this->Cell(0,5,"Tel No. $GLOBALS[phone]",0,1,'C');
	//$this->SetFont('Arial','',12);
	//$this->Cell(0,5,"Lincese No. $GLOBALS[license]",0,1,'C');
    // Line break
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
$pdf = new PDF("P","mm","letter");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,10,'Daily sales report',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,$range,0,1,'C');
$pdf->Ln(3);


$pdf->SetFont('Times','',12);
//create a table 
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('','B');
    // Header
		$pdf->Cell(20,7,"Date",1,0,'C',true);
        $pdf->Cell(14,7,"P. ID",1,0,'C',true);
		$pdf->Cell(56,7,"Patient",1,0,'C',true);
		$pdf->Cell(40,7,"Particular",1,0,'C',true);
		$pdf->Cell(20,7,"Price",1,0,'C',true);
		$pdf->Cell(20,7,"Paid",1,0,'C',true);
		$pdf->Cell(20,7,"Balance",1,0,'C',true);
        $pdf->Ln();

	 
    // Color and font restoration
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    // Data
	 $fill=false;
	while($datas=$rec->fetch_assoc()) 
	{  $paid = $datas[payment];
	     $totalsales += $datas[amount];
	   $totalpaid += $paid;
	   $payables += $datas[balance];	
	   //$particular = explode(',',$datas[particular]);
		
					$pdf->SetFont('Times','',11); 
					$pdf->Cell(20,6,$datas[cdate],'1',0,'L',true);
					$pdf->Cell(14,6,$datas[patientid],'1',0,'C',true);
					$pdf->Cell(56,6,$datas[patient],'1',0,'L',true);
					$pdf->Cell(40,6,$datas[particular],'1',0,'L',true);
					$pdf->Cell(20,6,number_format($datas[amount],2),'1',0,'R',true);
					$pdf->Cell(20,6,number_format($paid,2),'1',0,'R',true);
					$pdf->Cell(20,6,number_format($datas[balance],2),'1',0,'R',true);
					$pdf->Ln();
		}
		
		
					$pdf->SetFont('Times','',11); 
					$pdf->Cell(130,6,"",'1',0,'L',true);
					$pdf->Cell(20,6,"",'1',0,'R',true);
					$pdf->Cell(20,6,"",'1',0,'R',true);
					$pdf->Cell(20,6,"",'1',0,'R',true);
					$pdf->Ln();
					
					$pdf->SetFont('Times','B',11); 
					$pdf->Cell(130,6,"Total",'1',0,'L',true);
					$pdf->Cell(20,6, number_format($totalsales,2),'1',0,'R',true);
					$pdf->Cell(20,6, number_format($totalpaid,2),'1',0,'R',true);
					$pdf->Cell(20,6, number_format($payables,2),'1',0,'R',true);
					$pdf->Ln();
		
        
    // Closing line
setcookie("pi", $patientid, time() + (86400 * 3), "/"); 
setcookie("ct", $_POST[test], time() + (86400 * 3), "/"); 
	//$pdf->Cell(2,0,'','T');
//end of table creation
 $pdf->Output();
 ?>
	 
	 
	 