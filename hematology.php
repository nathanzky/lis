<?php
//require('subwrite.php');
$pdf->Ln(7);
foreach(array_keys($results) as $lid) 
	{
		$ids .= "$lid,"	;	
	}
	$ids = rtrim($ids,",");
	$sql = "SELECT * FROM labtest where labid in($ids)";
	$rec = $links->query($sql) or die($links->error);
	$fir = 0;
	//while ($rows = $rec->fetch_assoc()){	
	$norm = $rows[normalmin];
	$specimen_array=explode(";", $specimen_data);
	$checker++;

    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(50,7,"Examinations",1,0,'C',true);
	$pdf->Cell(40,7,"Result",1,0,'C',true);
    $pdf->Cell(30,7,"Units",1,0,'C',true);
	$pdf->Cell(60,7,"Normal Range",1,1,'C',true);

    $pdf->SetFont('Times','',16); 	
    $pdf->Cell(50,10,"Hemoglobin",1,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,10,$specimen_array[0],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(65,$y,95,$y);
    $pdf->Cell(30,10," g/L",1,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,5,"Male: 140 - 175 \nFemale: 123 - 153",1,1,'L',true);

    $pdf->SetFont('Times','',16); 	
    $pdf->Cell(50,10,"Hematocrit",1,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,10,$specimen_array[1],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(65,$y,95,$y);
    $pdf->Cell(30,10,"Vol. Fr",1,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,5,"Male: 0.41 - 0.50 \nFemale: 0.38 - 0.47 ",1,1,'L',true);

    $pdf->SetFont('Times','',14.5); 	
    $pdf->Cell(50,10,"Red Blood Cell Count",1,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,10,$specimen_array[2],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(65,$y,95,$y);
    $pdf->SetFont('Times','B',16); 	
    $pdf->Cell(30,10,"x 10    /L",1,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,5,"Male: 4.5 - 5.9 \nFemale: 4.1 - 5.1 ",1,'L',true);
    $pdf->SetXY(-101,$y);
    $pdf->SetFont('Times','B',16); 	
    $pdf->subWrite(5,'12','',8,16);

    $pdf->SetY($y+3);
    $pdf->SetFont('Times','',14); 	
    $pdf->Cell(50,6,"White Blood Cell Count",1,0,'L',true);
    $pdf->SetFont('Times','B',14); 	
	$pdf->Cell(40,6,$specimen_array[3],1,0,'C',true);
    
	$y=$pdf->GetY()+6;
   //$pdf->Line(65,$y,95,$y);
   $pdf->Cell(30,6,"x 10   /L",1,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,6,"4.4 - 11.3",1,'L',true);
    $pdf->SetXY(-100,$y);
    $pdf->SetFont('Times','B',16); 	
    $pdf->subWrite(5,'9','',8,18);
	//$pdf->Cell(40,5,"",LTR,0,'C',true);
    //$pdf->Cell(30,5,"",LTR,0,'C',true);
    //$pdf->SetFont('Times','',14); 	
	$pdf->Multicell(1,0,"",LTR,'L',true);
	   
	$pdf->SetFont('Times','',16); 	
    $pdf->Cell(50,6,"Differential Count",LTR,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,5,"",LTR,0,'C',true);
    $pdf->Cell(30,5,"",LTR,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,5,"",LTR,'L',true);

    $pdf->SetFont('Times','',16); 	
    $pdf->Cell(50,5,"   Neutrophil",LR,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	//$pdf->Cell(40,5,$specimen_array[8],LR,0,'C',true);
	$pdf->Cell(40,5,"",LR,0,'C',true);
     $y=$pdf->GetY()+4;
   //$pdf->Line(65,$y,95,$y);
   $pdf->Cell(30,6," ",LR,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,5,"",LR,'L',true);
  	

    $pdf->Cell(50,5,"       Segmenters",LR,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,5,$specimen_array[8],LR,0,'C',true);
     $y=$pdf->GetY()+4;
   $pdf->Line(65,$y,95,$y);
   $pdf->Cell(30,6,"%",LR,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,5,"0.40 - 0.69",LR,'L',true);

    $pdf->Cell(50,5,"       Stab",LR,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,5,$specimen_array[9],LR,0,'C',true);
     $y=$pdf->GetY()+4;
   $pdf->Line(65,$y,95,$y);
   $pdf->Cell(30,6,"%",LR,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,5,"0.00 - 0.05",LR,'L',true);

    $pdf->SetFont('Times','',16); 	
    $pdf->Cell(50,5,"  Lymphocytes",LR,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,5,$specimen_array[10],LR,0,'C',true);
     $y=$pdf->GetY()+4;
   $pdf->Line(65,$y,95,$y);
   $pdf->Cell(30,6,"%",LR,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,5,"0.22 - 0.42",LR,'L',true);
    

    $pdf->SetFont('Times','',16); 	
    $pdf->Cell(50,5,"  Eosinophils",LR,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,5,$specimen_array[11],LR,0,'C',true);
     $y=$pdf->GetY()+4;
   $pdf->Line(65,$y,95,$y);
   $pdf->Cell(30,6,"%",LR,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,5,"0.00 - 0.03",LR,'L',true);
   

    $pdf->SetFont('Times','',16); 	
    $pdf->Cell(50,5,"  Basophil",LR,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,5,$specimen_array[12],LR,0,'C',true);
     $y=$pdf->GetY()+4;
   $pdf->Line(65,$y,95,$y);
   $pdf->Cell(30,6,"%",LR,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,5,"0.00 - 0.01",LR,'L',true);
    

    $pdf->SetFont('Times','',16); 	
    $pdf->Cell(50,5,"  Monocyte",LBR,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,5,$specimen_array[13],LBR,0,'C',true);
     $y=$pdf->GetY()+4;
   $pdf->Line(65,$y,95,$y);
   $pdf->Cell(30,6,"%",LR,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,5,"0.00 - 0.08",LBR,'L',true);
     

    $pdf->SetFont('Times','',16); 	
    $pdf->Cell(50,6,"Platelet Count",1,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,6,$specimen_array[4],1,0,'C',true);
    
     $y=$pdf->GetY()+6;
   //$pdf->Line(65,$y,95,$y);
   $pdf->Cell(30,6,"x 10   /L",1,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,6,"150 - 450 x 10",1,'L',true);
    $pdf->SetXY(-100,$y);
    $pdf->SetFont('Times','B',16); 	
    $pdf->subWrite(5,'9','',8,18);

    $pdf->SetY($y);
    $pdf->SetFont('Times','',16); 	
    $pdf->Cell(50,6,"Bleeding Time",1,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,6,$specimen_array[5],1,0,'C',true);
     $y=$pdf->GetY()+6;
   //$pdf->Line(65,$y,95,$y);
   $pdf->Cell(30,6,"minutes",1,0,'C',true);
    $pdf->SetFont('Times','',14); 	
	$pdf->Multicell(60,6,"up to 3 minutes",1,'L',true);

    $pdf->SetFont('Times','',16); 	
    $pdf->Cell(50,6,"Clotting Time",1,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,6,$specimen_array[6],1,0,'C',true);
     $y=$pdf->GetY()+6;
   //$pdf->Line(65,$y,95,$y);
   $pdf->Cell(30,6,"minutes",1,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,6,"3 - 5 minutes",1,'L',true);
    
    $pdf->SetFont('Times','',16); 	
    $pdf->Cell(50,10,"ESR (Westergreen)",1,0,'L',true);
    $pdf->SetFont('Times','B',16); 	
	$pdf->Cell(40,10,$specimen_array[7],1,0,'C',true);
     $y=$pdf->GetY()+7;
   //$pdf->Line(65,$y,95,$y);
   $pdf->Cell(30,10,"mm/Hr",1,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Multicell(60,5,"Male: 0 - 15 \nFemale: 0 - 20",1,1,'L',true);
    if(isset($specimen_array[14])){
    $pdf->SetFont('Times','',16); 	
    $pdf->Cell(50,6,$specimen_array[14],1,0,'L',true);
    $pdf->SetFont('Times','B',16);	
	$pdf->Cell(40,6,$specimen_array[15],1,0,'C',true);
     $y=$pdf->GetY()+6;
   //$pdf->Line(65,$y,95,$y);
   $pdf->Cell(30,6,$specimen_array[16],1,0,'C',true);
    $pdf->SetFont('Times','',16); 	
	$pdf->Cell(60,6,$specimen_array[17],1,1,'L',true);
    }
$pdf->Ln(10);
$pdf->Cell(13,7,$specimen_array[18],1,0,'L',true);
$pdf->Cell(10,7,'Specimen collected at the center.',L,1,'L',true);
    

?>