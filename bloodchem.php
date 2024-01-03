<?php
$pdf->Ln(2);
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

    $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(60,9,"Examinations",1,0,'C',true);
	$pdf->Cell(30,9,"Result",1,0,'C',true);
    $pdf->Cell(30,9,"Units",1,0,'C',true);
	$pdf->Cell(60,9,"Normal Range",1,1,'C',true);

	$pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,"Glucose (FBS)",LTR,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,9,$specimen_array[0],LTR,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,9,"mmol/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,"3.9 - 6.1",LTR,1,'L',true);
	
	$pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,"BUN",LTR,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,9,$specimen_array[1],LTR,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,9,"mmol/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,"2.9 - 8.2",LTR,1,'L',true);
  
    
    $pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,10,"Creatinine",1,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,10,$specimen_array[2],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,10,"umol/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Multicell(60,5,"Male: 70 - 115 \nFemale: 44 - 80",1,1,'L',true);

    $pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,10,"Uric Acid",1,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,10,$specimen_array[3],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,10,"umol/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Multicell(60,5,"Male: 208 - 428 \nFemale: 155 - 357",1,1,'L',true);
	
	
    $pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,"Cholesterol",1,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,9,$specimen_array[4],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,9,"mmol/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,"3.88 - 6.47",1,1,'L',true); 

	$pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,"Triglycerides",LTR,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,9,$specimen_array[5],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,9,"mmol/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,"0.11 - 2.15",1,1,'L',true);

    $pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,"HDL - C",LTR,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,9,$specimen_array[6],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,9,"mmol/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,">1.6",1,1,'L',true);
  	
    $pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,"LDL - C",LTR,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,9,$specimen_array[7],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,9,"mmol/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,"<2.6",1,1,'L',true);

    $pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,"SGOT",LTR,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,9,$specimen_array[8],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,9,"u/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,"4 - 36",1,1,'L',true);

    $pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,"SGPT",LTR,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,9,$specimen_array[9],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,9,"u/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,"8 - 33",1,1,'L',true);
    
    $pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,"Sodium",LTR,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,9,$specimen_array[10],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,9,"mmol/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,"135 - 148",1,1,'L',true);

    $pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,"Potassium",LTR,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,9,$specimen_array[11],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,9,"mmol/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,"3.5 - 5.3",1,1,'L',true);
  	
    $pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,"Calcium",LTR,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,9,$specimen_array[12],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,9,"mmol/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,"1.05 - 1.35",1,1,'L',true);

    $pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,"Chloride",LTR,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,9,$specimen_array[13],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,9,"mmol/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,"98 - 107",1,1,'L',true);

    $pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,"2HPPBS",LTR,0,'L',true);
     $pdf->SetFont('Times','B',13); 	
	$pdf->Cell(30,9,$specimen_array[14],1,0,'C',true);
    $y=$pdf->GetY()+7;
    //$pdf->Line(75,$y,95,$y);
    $pdf->Cell(30,9,"mmol/L",1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,"Less than 7.8",1,1,'L',true);
    
    if(isset($specimen_array[14])){
    $pdf->SetFont('Times','',13); 	
    $pdf->Cell(60,8,$specimen_array[15],1,0,'L',true);
    $pdf->SetFont('Times','B',13);	
	$pdf->Cell(30,8,$specimen_array[16],1,0,'C',true);
    $pdf->Cell(30,8,$specimen_array[17],1,0,'C',true);
    $pdf->SetFont('Times','',13); 	
	$pdf->Cell(60,8,$specimen_array[18],1,1,'L',true);
    //}
    //if(isset($specimen_array[19])){
    //$pdf->SetFont('Times','',13); 	
    //$pdf->Cell(60,5,$specimen_array[20],1,0,'L',true);
    //$pdf->SetFont('Times','B',13);	
	//$pdf->Cell(30,5,$specimen_array[21],1,0,'C',true);
    //$pdf->Cell(30,5,$specimen_array[22],1,0,'C',true);
    //$pdf->SetFont('Times','',13); 	
	//$pdf->Cell(60,5,$specimen_array[23],1,1,'L',true);
    }
$pdf->Ln(5);
$pdf->Cell(13,7,$specimen_array[19],1,0,'L',true);
$pdf->Cell(10,7,'Specimen collected at the center.',L,1,'L',true);
?>