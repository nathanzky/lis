<?php
date_default_timezone_set("Asia/Manila");
ini_set('display_errors', 'On');
$con="true";
include "connect.php";
$priv = $privy[printoutresult];
 include "log.php";
$patientid=$_POST[patientid];
$mt=$_POST[mt];
$rp=$_POST[rp];
$pt=$_POST[pt];
$dr=$_POST[dr];
$drel=$_POST[drel];
$do=$_POST['do'];
$lastid = $_POST[li];
$test= $_POST[test];
$tot=$_POST[tot];
$testid = $_POST[testid];
$testresult = $_POST[testresult];
$transactionid = str_pad($lastid, 5, "0", STR_PAD_LEFT);
$ltid = $_POST[labtestid];
$t=count($testid);
$note = $_POST[note];
$ni = "Note : Please correlate result clinically.";

			$specimen_data ="";
			if(isset($_POST["result"]) && is_array($_POST["result"])){
			$specimen_data = implode(";", $_POST["result"]);
			$specimen_data = $specimen_data;
			}
			else{
				$specimen_data = $_POST[specimen];
				$specimen_data = $specimen_data;
			}

//Get some patient info
$sq = "SELECT * FROM patient FORCE INDEX(PRIMARY) where patientid='$patientid'";
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
$sex = $datas[sex];
$cs = $datas[civil_status];
$address = $datas[address] ." $datas[city] $datas[province]";
		//save muna ang sales...
		$dd = explode("-",$dr);
		$m = $dd[1];
		$d = $dd[2];
		$y = $dd[0];
		$rem=$_POST[rem];

if(empty($drel)) {
$daterelease = date("Y-m-d");
}
else{
	$daterelease = $drel;
}
$topay=0;

$cnnn=0;
//start of set
for($i=0;$i < $t; $i++)
	{
		$id = $testid[$i];
		$result = $testresult[$i];

	if($patientid != $_COOKIE[pi] && $_POST['test'] != $_COOKIE[ct]) {

		if($cnnn==0)
			{
			$links->query("UPDATE test SET pathologist='$_POST[pt]',medtech='$_POST[mt]', result='$result',daterelease='$daterelease' , note = '$note', specimen='$specimen_data' where testid='$id'") or die($links->error); //save result
			}else{
           $links->query("UPDATE test SET pathologist='$_POST[pt]', medtech='$_POST[mt]',result='$result',daterelease='$daterelease', note = '$note', specimen='$specimen_data'where testid='$id'") or die($links->error); //save result
			 }
	}
	   	$ind = $ltid[$i];
		$results[$ind] = $result;

		$cnnn++;
	}
//end of set

/*start of set

if( $patientid != $_COOKIE[pi] && $_POST['test'] != $_COOKIE[ct]) {
	//update sales
	    $links->query("Update sales SET  rem='$rem',month='$m',day='$d',year='$y' where id='$_POST[si]'") or die($links->error);
}
//end of set
*/
//get list of type of test

$testarr = explode(",",$_POST[test]);

//It kung isa lang ang test na gagawin for xray, ultrasound and roentgeno
$testuna = $testarr[0];


//Start of pdf creation for printable output...
$fname  =strip_tags($config[3]);

$fname=stripslashes(str_replace("\r","",$fname)); //filename of log
$rtitle = $config[0];
$addressl = $config[1];
$phone = $config[2];
$license = $config[4];
$medtech = $config[5];
$pat = $config[6];

require('fpdf.php');
class PDF extends FPDF
{
	function subWrite($h, $txt, $link='', $subFontSize=13, $subOffset=0)
{
	// resize font
	$subFontSizeold = $this->FontSizePt;
	$this->SetFontSize($subFontSize);

	// reposition y
	$subOffset = ((($subFontSize - $subFontSizeold) / $this->k) * 0.3) + ($subOffset / $this->k);
	$subX        = $this->x;
	$subY        = $this->y;
	$this->SetXY($subX, $subY - $subOffset);

	//Output text
	$this->Write($h, $txt, $link);

	// restore y position
	$subX        = $this->x;
	$subY        = $this->y;
	$this->SetXY($subX,  $subY + $subOffset);

	// restore font size
	$this->SetFontSize($subFontSizeold);
}
// Page header
function Header()
{
    // Logo
    $this->Image("$GLOBALS[fname]",30,6,170);
		// Arial bold 15
    $this->SetFont('Arial','B',16);
    // Move to the right
    //$this->Cell(80);
    // Title
    //$this->Cell(30,10,"$GLOBALS[rtitle]",0,0,'C');
	$this->SetDrawColor(0,0,0);
	$this->SetLineWidth(0.5);
	$this->Line(11,$y+28,193,$y+28);
	//$this->Line(11,$y+29,193,$y+29);
	//$this->Line(11,$y+50,193,$y+50);
	$this->Line(11,$y+52,193,$y+52);
	$this->Ln(8);
	 $this->SetFont('Arial','',11);
	$this->Cell(0,5,"$GLOBALS[addressl]",0,1,'C');
	$this->SetFont('Arial','',11);
	$this->Cell(0,5,"$GLOBALS[phone]",0,1,'C');
	//$this->SetFont('Arial','',12);
	//$this->Cell(0,5,"License No. $GLOBALS[license]",0,1,'C');
    // Line break
    $this->Ln(3);
}

// Page footer
function Footer()
{
$medtec=explode(":",$GLOBALS[mt],2);
$pathoc=explode(":",$GLOBALS[pt],2);
$this->SetFont('Times','',13);
	if(strtoupper($GLOBALS[testna])=="ROENTGENOLOGICAL" || $GLOBALS[testna] == "ECG")
	{
	$this->SetY(-25);
$this->Cell(100,5,"",'0',0,'L',true);
 $this->SetFont('Times','B',13);
$this->Cell(60,-2,$pathoc[0],'0',1,'L',true);
$this->Cell(100,5,"",'0',0,'L',true);
//$this->Cell(60,5,$pathoc[1],'0',0,'L',true);
$y = $this->GetY() + 4;
$this->Line(113,$y,200,$y);
$this->Ln(5);
 $this->Cell(130,5,"" ,'0',0,'L',true);
 $this->SetFont('Times','B',13);
$this->Cell(40,3,"Radiologist",'0',0,'L',true);
	}elseif(strtoupper($GLOBALS[testna])=="ULTRASOUND")
	{
	$this->SetY(-25);
$this->Cell(100,5,"",'0',0,'L',true);
 $this->SetFont('Times','B',13);
$this->Cell(60,-2,$pathoc[0],'0',1,'L',true);
$this->Cell(100,5,"",'0',0,'L',true);
//$this->Cell(60,5,$pathoc[1],'0',0,'L',true);
$y = $this->GetY() + 4;
$this->Line(113,$y,200,$y);
$this->Ln(5);
$this->Cell(130,5,"" ,'0',0,'L',true);
$this->Cell(40,3,"Sonologist",'0',0,'L',true);
	}else{
$medtec=explode(":",$GLOBALS[mt],2);
$pathoc=explode(":",$GLOBALS[pt],2);
$this->SetY(-25);
$this->Cell(110,5,"     " .$medtec[0],'0',0,'L',true);
$this->Cell(60,5,"     " .$pathoc[0],'0',1,'L',true);
$y = $this->GetY() + 10;
$this->Cell(110,4,"     " .$medtec[1],'0',0,'L',true);
$this->Line(10,$y-6,85,$y-6);
$y = $this->GetY();
$this->Cell(60,4,"     " .$pathoc[1],'0',0,'L',true);
$this->Line(120,$y+4,190,$y+4);
$this->Ln(5);
$this->Image('sign.png',130,247,45);
 $this->Cell(110,5,"     Medical Technologist" ,'0',0,'L',true);
$this->Cell(60,5,"      Pathologist",'0',0,'L',true);
	}


    // Position at 1.5 cm from bottom
    $this->SetY(-15);
	$this->SetX(69);
    // Arial italic 8
	// $this->Image("$GLOBALS[barcode]");

    $this->SetFont('Arial','I',8);
    // Page number
	$this->SetX(0);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
} //end footer
} //end header and footer

//$toshow = explode("<br>",$labtest);
// Instanciation of inherited class
if(($tot=="Special Tests") || ($tot=="Semen Analysis") || ($tot=="Differential Count") || ($tot=="PROTIME") || ($tot=="Dengue Duo") || ($tot=="OGTT") || ($tot=="Electrolytes") || ($tot=="Salmonella Typhi IgG and IgM") || ($tot=="T3, T4 and TSH") || ($tot=="FT3 and FT4")) {
$pdf = new PDF("P","mm","hlegal");
}else{
	$pdf = new PDF("P","mm","letter");
}
$pdf->AliasNbPages();

for ($i=0; $i < count($testarr); $i++) {
$testna = $testarr[$i];  //current test
$pdf->AddPage();
	if($i==0) {

 $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
$pdf->SetFont('Arial','',12.5);

$pdf->Cell(150,6,"Date : " .$daterelease,0,0,'L',true);
$y = $pdf->GetY() + 5;
$pdf->Line(22,$y,48,$y);
$yy = $pdf->GetY();

$pdf->Cell(50,6,"Lab No : $transactionid",0,0,'L',true);
$pdf->Line(179,$y,192,$y);


//$pdf->Cell(150,6,"",0,0,'L',true);
//$y = $pdf->GetY() + 5;

//$pdf->Cell(150,6,"Date : " .$daterelease,0,0,'L',true);
//$pdf->Line(172,$y,193,$y);
$pdf->Ln();

$pdf->SetFont('Arial','',12.5);
$pdf->Cell(29,6,'Patient Name: ',0,0,L,true);
$pdf->SetFont('Arial','',12.5);
$firstnamestring = utf8_decode($datas[firstname]);
$lastnamestring = utf8_decode($datas[lastname]);
$pdf->Cell(65,6,"$lastnamestring".","." $firstnamestring".",". " $datas[mi]",0,0,'L',true);
//$pdf->Cell(73,6,"$datas[lastname], $datas[firstname] $datas[mi]",0,0,'L',true);
$y = $pdf->GetY() + 5;
$pdf->Line(40,$y,100,$y);

$pdf->SetFont('Arial','',12.5);
$pdf->Cell(30,6,"Age : $dateofbirt",0,0,'L',true);
$pdf->Line(114,$y,150,$y);
$pdf->Cell(30,6,"Sex : $sex",0,0,'L',true);
$pdf->Line(145,$y,185,$y);
$pdf->Cell(30,6,"C.S. : $cs",0,0,'L',true);
$pdf->Line(175,$y,193,$y);
$pdf->Ln();
$pdf->Cell(20,6,"Address :",0,0,'L',true);
$pdf->SetFont('Arial','',12.5);
$pdf->Cell(71,6,"$address",0,0,'L',true);
$y = $pdf->GetY() + 5;
$pdf->Line(29,$y,103,$y);
$pdf->SetFont('Arial','',12.5);
$pdf->Cell(105,6,"Physician : ".utf8_decode($rp),0,0,'L',true);
$pdf->Line(125,$y,193,$y);


	}

if($i==0) $pdf->Ln(10);
if($i > 0) $pdf->Ln(-2);

if($test=="Laboratory"){
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,$tot,0,1,'C');

}
elseif(strtoupper($test)=="ROENTGENOLOGICAL" || strtoupper($test)=="ULTRASOUND"){
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,$testarr[$i]." Report",0,1,'C');
$pdf->Ln(3);
}
else{
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,"$testarr[$i]",0,1,'C');
}


$pdf->SetFont('Times','',14);
//create a table
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.2);
    $pdf->SetFont('','B');
    // Header

    // Color and font restoration
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');

    // Data
	   $fill=false;
if($testarr[$i]!= "Special Tests")
{
$sql = "select * from labtest where test = '$testarr[$i]' ORDER BY labid ";
$rec = $links->query($sql) or die($links->error);
}

	$checker =0;
	   $lasd1="";
	   $sr = 1;



	if($testarr[$i]=="Laboratory") {
		if ($tot=="Urinalysis")
			{
		$lasd1="";
	   	$sr = 1;
		          include "urinalysis.php";



			/******************************************end of marker*******************************/
			}elseif($tot=="Fecalysis")
			{
			            $lasd1="";
	                    $sr = 1;

						include "fecalysis.php";
		/******************************************end of marker*******************************/
			} //end of else Fecalysis
			elseif($tot=="Special Tests")
			{
			            $lasd1="";
	                    $sr = 1;

						include "special.php";

			} //end of  special
			elseif($tot=="Salmonella Typhi IgG and IgM")
			{
				$specimen = explode(';',$specimen_data);
				$pdf->Cell(120,7,"Serum:    ".$specimen[2],'0',0,'L',true);
				$y = $pdf->GetY() + 6;
                $pdf->Line(25,$y,100,$y);
				$pdf->Ln();
			    $pdf->Cell(120,7,"Examination Desired : Salmonella Typhi IgG and IgM",'0',0,'L',true);
				$y = $pdf->GetY() + 6;
                $pdf->Line(50,$y,120,$y);
				$pdf->Ln(8);
				$pdf->SetFont('Times','I',13);
				$pdf->Cell(120,7,"RESULT",'0',0,'L',true);
				$pdf->Ln(8);
				$pdf->SetX(40);
				$pdf->SetFont('Times','',12);
				$pdf->Cell(80,7,"IgG Antibody for Salmonella Typhi:",'0',0,'C',true);
				$pdf->Cell(40,7,$specimen[0],'B',0,'L',true);
				$pdf->Ln(8);
				$pdf->SetX(40);
				$pdf->Cell(80,7,"IgM Antibody for Salmonella Typhi:",'0',0,'C',true);
				$pdf->Cell(40,7,$specimen[1],'B',0,'L',true);
				$pdf->Ln(10);



			} //end of  Salmonella

			elseif($tot=="T3, T4 and TSH")
			{
				$lasd1="";
				$sr = 1;

				include "t3t4tsh.php";
			} //end of  T3, T4 and TSH
      elseif($tot=="FT3 and FT4")
			{
				$lasd1="";
				$sr = 1;

				include "ft3ft4.php";
			} //end of  FT3 and FT4
			elseif($tot=="Dengue Duo")
			{
			            $lasd1="";
	                    $sr = 1;

						include "dengue.php";

			} //end of dengue duo
			elseif($tot=="PROTIME")
			{
			            $lasd1="";
	                    $sr = 1;

						include "protime.php";

			} //end of protime
			elseif($tot=="Differential Count")
			{
			            $lasd1="";
	                    $sr = 1;

						include "diffcount.php";

			} //end of differential count
			elseif($tot=="OGTT")
			{
			            $lasd1="";
	                    $sr = 1;

						include "ogtt.php";

			} //end of else ogtt
			elseif($tot=="Semen Analysis")
			{
			            $lasd1="";
	                    $sr = 1;

						include "semen.php";

			} //end of else semen analysis
			elseif($tot=="Hematology")
			{
			            $lasd1="";
	                    $sr = 1;

						include "hematology.php";

			} //end of else hematology
			elseif($tot=="Blood Chemistry")
			{
			            $lasd1="";
	                    $sr = 1;

						include "bloodchem.php";

			} //end of else bloodchemistry
			elseif($tot=="Electrolytes")
			{
			            $lasd1="";
	                    $sr = 1;

						include "electrolytes.php";

			} //end of else electrolytes
	}
	elseif($testarr[$i]=="Ultrasound")
			{
			  include "ultra.php";


			} //end of Ultra Sound

	elseif($testarr[$i]=="Roentgenological")
			{
			  include "roent.php";

			} //end of ROENTGENOLOGICAL

				elseif($testarr[$i]=="ECG")
			{

			while ($rows = $rec->fetch_assoc()){
		$specimen=explode(";", $specimen_data,2);
		// echo $rows[id] .">" .$results[$rows[id]];
			if($results[$rows[labid]] != "")
				{
				if(($rows[subtype] != "NA") && ($rows[subtype] != "N/A") && ($rows[subtype] != "na")) {
						   $subtype = " - ".$rows[subtype];
					   }
				$pdf->Cell(120,7,"Examination Requested : $rows[typeoftest] $subtype",'0',0,'L',true);
				$y = $pdf->GetY() + 6;
                $pdf->Line(53,$y,140,$y);
				$pdf->SetXY(15,90);
                $pdf->SetFont('Times','B',11);
                $pdf->Cell(160,5, "Result: ",0,1,'L',true);
                $pdf->SetX(15);
                $pdf->SetFont('Times','',11);
				$pdf->MultiCell(160,5,$results[$rows[labid]],0,'L',true);
				$pdf->Ln(5);
				$pdf->SetFont('Times','B',11);
				$pdf->SetX(15);
				 //$ni = "Impression : \n".$results[$rows[labid]];
				 $pdf->Ln();
				 //$y = $pdf->GetY();
				 $pdf->SetFont('Arial','',11);
				 //$pdf->SetXY(160,$yy,192,$yy);
				 //$pdf->Cell(50,6, "Case ID: ".$specimen[0],0,0,L,true);
				 //$pdf->Line(178,$yy+5,192,$yy+5);
				 $pdf->SetY($y);
			       }
			  }


			} //end of XRAy
}//end of for loop
if (strtoupper($test) != "ROENTGENOLOGICAL" && strtoupper($test) != "ULTRASOUND" && strtoupper($test) != "ECG"){
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',13);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x +2, $y);
$pdf->SetFont('Times','B',13);
$pdf->MultiCell(160,5, "Remarks: ".$note,0,'L',true);
$pdf->Ln();
$pdf->SetFont('Times','BI',13);
$pdf->MultiCell(160,5,$ni, 0,'L',true);
}
// Closing line
setcookie("pi", $patientid, time() + (86400 * 3), "/");
setcookie("ct", $_POST[test], time() + (86400 * 3), "/");
	//$pdf->Cell(2,0,'','T');
//end of table creation
 $pdf->Output();
?>
