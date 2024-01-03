<?php
$con="true";
include "connect.php";
$priv = $privy[printsales];
include "log.php";
date_default_timezone_set("Asia/Manila");
$nowdate = date('Y-m-d');
$cdate=$_POST[cdate];
$tdate = $_POST[tdate];
$testtype = $_POST[testtype];
$condition1 =$_POST[condition1];
$tot= $_POST[tot];
$condition2 =$_POST[condition2];
$subtype= $_POST[subtype];
$condition3 =$_POST[condition3];
$viewbydate= $_POST[viewbydate];
$numrows= $_POST[numrows];
$cr = $_POST[cr];
$range = $_POST[range];
//echo "Condition 1".$condition1;
//echo "Condition 2".$condition2;
//echo "Condition 3".$condition3;

if($cdate == "") $cdate=date("Y-m-d");

if(!empty($_POST[condition1])){
$testtype="AND labtest.test='$condition1' ";    
}else{
$testtype="";    
}
//echo $testtype;

if(!empty($_POST[condition2])){
$tot="AND labtest.typeoftest='$condition2' ";    
}else{
$tot="";    
}
//echo $tot;

if(!empty($_POST[condition3])){
$subtype="AND test.labtestid="."'$condition3' ";    
}else{
$subtype="";    
}
//echo $subtype;

if(!empty($_POST[viewbydate])){
$viewbydate=$_POST[viewbydate];
}else{
$viewbydate="datereceived";
}
//echo $viewbydate;
		


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
    $this->Image("$GLOBALS[fname]",60,6,160);
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
$pdf = new PDF("L","mm","letter");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,10,'Laboratory Test Report',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,$range,0,1,'C');
$pdf->Ln(3);



    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    $pdf->SetFont('Times','B',12);
$pdf->Cell(235,7,"Total Number of Tests Conducted",1,0,'L',true);
        $pdf->Cell(25,7,$numrows,1,1,'C',true);
        $pdf->Cell(235,7,"Total Number of Results Released",1,0,'L',true);
        $pdf->Cell(25,7,$cr,1,1,'C',true);
        $pdf->Ln();
//create a table 
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('Times','B',11);
    // Header
        
	$pdf->Cell(25,7,"Date Received",1,0,'C',true);
    $pdf->Cell(20,7,"Test ID",1,0,'C',true);
	$pdf->Cell(70,7,"Patient",1,0,'C',true);
	$pdf->Cell(120,7,"Name of Test",1,0,'C',true);
	$pdf->Cell(25,7,"Date Released",1,0,'C',true);
    $pdf->Ln();

	 
    // Color and font restoration
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    // Data
	 $fill=false;
     if(!empty($tdate)) 
	{
		$sql = "SELECT DISTINCT test.testid,test.patientid, test.labtestid, test.daterelease, test.datereceived, test.salesid,patient.patientid, patient.lastname, patient.firstname, patient.mi, labtest.labid, labtest.test, labtest.typeoftest, labtest.subtype FROM patient,test,labtest WHERE patient.patientid=test.patientid AND labtest.labid=test.labtestid $testtype $tot $subtype AND test.$viewbydate BETWEEN '$cdate' AND '$tdate' ORDER BY test.$viewbydate DESC";
	$range = date('M d, Y',strtotime($cdate))." to ".date('M d, Y',strtotime($tdate));
    }else{
		$sql = "SELECT DISTINCT test.testid,test.patientid, test.labtestid, test.daterelease, test.datereceived, test.salesid,patient.patientid, patient.lastname, patient.firstname, patient.mi, labtest.labid,labtest.test, labtest.typeoftest, labtest.subtype  FROM patient,test,labtest WHERE patient.patientid=test.patientid AND labtest.labid=test.labtestid $testtype $tot $subtype AND test.datereceived='$nowdate' ORDER BY test.datereceived DESC";
	$range = "today ".date('M d, Y',strtotime($nowdate));	
	}		
$rec = $links->query($sql) or die($links->error);
	while($datas=$rec->fetch_assoc()) 
	{  	
        $datereceived=$datas[datereceived];
        $testid=$datas[salesid];
        $patientname = utf8_decode($datas[lastname]).", ".utf8_decode($datas[firstname])." ".utf8_decode($datas[mi]).".";
        $datereleased=$datas[daterelease];
        if(($datas[subtype] != "NA") && ($datas[subtype] != "N/A") && ($datas[subtype] != "na")) {
						   $subtype = " - ".$datas[subtype];
        }else{
            $subtype='';
        }

        $testname=$datas[typeoftest].$subtype;
		$pdf->SetFont('Times','',11); 
		$pdf->Cell(25,7,$datereceived,1,0,'L',true);
        $pdf->Cell(20,7,$testid,1,0,'C',true);
		$pdf->Cell(70,7,$patientname,1,0,'L',true);
		$pdf->Cell(120,7,$testname,1,0,'L',true);
        if(empty($datereleased)){
            $datereleased="PENDING";
            $pdf->SetTextColor(255,0,0);
        }
		$pdf->Cell(25,7,$datereleased,1,0,'L',true);
        $pdf->SetTextColor(0);
		$pdf->Ln();
		}
        $pdf->SetFont('Times','BI',11); 
	$pdf->Cell(260,7,"End of List",1,0,'C',true);
        
    // Closing line
setcookie("pi", $patientid, time() + (86400 * 3), "/"); 
setcookie("ct", $_POST[test], time() + (86400 * 3), "/"); 
	//$pdf->Cell(2,0,'','T');
//end of table creation
 $pdf->Output();
 ?>
	 
	 
	 