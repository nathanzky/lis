<?php
//$pdf->Ln(2);
foreach(array_keys($results) as $lid) 
	{
		$ids .= "$lid,"	;	
	}
	$ids = rtrim($ids,",");
	$sql = "SELECT * FROM labtest where labid in($ids)";
	$rec = $links->query($sql) or die($links->error);
	$fir = 0;
	//while ($rows = $rec->fetch_assoc()){	
	$specimen_array=explode(";", $specimen_data);
	$checker++;

	$pdf->SetFont('Times','',12); 
	$pdf->Cell(50,5,'Specimen: ','0','0','L',true);
	$pdf->Cell(80,5,$specimen_array[10],'0','0','L',true);
    $y = $pdf->GetY();
    $pdf->Line(50,$y+5,120,$y+5);
	$pdf->Ln(5);
	$pdf->SetFont('Times','',12); 
	$pdf->Cell(50,6,'Examination Desired: ','0',0,'L',true);
    $pdf->SetFont('Times','B',11); 
	$pdf->Cell(80,6,"Differential Count",'0',0,'L',true); 
    $y = $pdf->GetY();
    $pdf->Line(50,$y+5,120,$y+5);
	$pdf->Ln(7);
	

    //end of header

    $pdf->SetFont('Times','B',11); 
    $pdf->Cell(40,5,"RESULT:",0,0,'L',true);
    $pdf->SetFont('Times','',11); 
    $pdf->Cell(35,5,"Neutrophil",0,0,'L',true);
    $pdf->Cell(40,5,"...............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,$specimen_array[0]."  %",0,1,'L',true);
    

    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(50);	
    $pdf->Cell(35,5,"     Segmenters",0,0,'L',true);
    $pdf->Cell(40,5,"..............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,$specimen_array[1]."  %",0,1,'L',true);
    

    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(50);	
    $pdf->Cell(35,5,"     Stab",0,0,'L',true);
    $pdf->Cell(40,5,".............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,$specimen_array[2]."  %",0,1,'L',true);    

    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(50);	
    $pdf->Cell(35,5,"Atypical Lymphocytes",0,0,'L',true);
    $pdf->Cell(40,5,"...............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,$specimen_array[3]."  %",0,1,'L',true);
   
    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(50);	
    $pdf->Cell(35,5,"Atypical Monocytes",0,0,'L',true);
    $pdf->Cell(40,5,"...............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,$specimen_array[4]."  %",0,1,'L',true);
   

    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(50);	
    $pdf->Cell(35,5,"Juvenile",0,0,'L',true);
    $pdf->Cell(40,5,"...............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,$specimen_array[5]."  %",0,1,'L',true);
   

    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(50);	
    $pdf->Cell(35,5,"Lymphocytes",0,0,'L',true);
    $pdf->Cell(40,5,"...............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,$specimen_array[6]."  %",0,1,'L',true);
   

    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(50);	
    $pdf->Cell(35,5,"Monocyte",0,0,'L',true);
    $pdf->Cell(40,5,"...............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,$specimen_array[7]."  %",0,1,'L',true);
   

    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(50);	
    $pdf->Cell(35,5,"Myeloblast",0,0,'L',true);
    $pdf->Cell(40,5,"...............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,$specimen_array[8]."  %",0,1,'L',true);
    

    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(50);	
    $pdf->Cell(35,5,"Myelocyte",0,0,'L',true);
    $pdf->Cell(40,5,"...............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,$specimen_array[9]."  %",0,0,'L',true);
?>