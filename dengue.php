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
	$pdf->Cell(80,5,$specimen_array[3],'B','1','L',true);
	$pdf->SetFont('Times','',12); 
	$pdf->Cell(50,6,'Examination Desired: ','0',0,'L',true);
    $pdf->SetFont('Times','B',10); 
	$pdf->Cell(80,6,"Dengue Duo NS1 Ag, IgG & IgM",'B',0,'L',true); 
	$pdf->Ln(8);
	
	$pdf->Cell(50,5,"RESULT",0,0,'L',true);
    //end of header
	$pdf->Ln(5);
    $pdf->SetFont('Times','',11); 
    $pdf->SetX(50);	
    $pdf->Cell(25,5,"NS1 Ag",0,0,'L',true);
    $pdf->Cell(40,5,"...............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,strtoupper($specimen_array[0]),0,1,'L',true);

    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(50);	
    $pdf->Cell(25,5,"IgG",0,0,'L',true);
    $pdf->Cell(40,5,"..............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,strtoupper($specimen_array[1]),0,1,'L',true);
    

    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(50);	
    $pdf->Cell(25,5,"IgM",0,0,'L',true);
    $pdf->Cell(40,5,".............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,strtoupper($specimen_array[2]),0,1,'L',true);
    

?>