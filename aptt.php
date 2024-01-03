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
	$pdf->Cell(80,5,$specimen_array[2],'B','1','L',true);
	$pdf->SetFont('Times','',12); 
	$pdf->Cell(50,6,'Examination Desired: ','0',0,'L',true);
    $pdf->SetFont('Times','B',10); 
	$pdf->Cell(80,6,"APTT",'B',0,'L',true); 
	$pdf->Ln(10);
	

    //end of header
    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(50);	
    $pdf->Cell(35,5,"Results",0,0,'L',true);
    $pdf->Cell(40,5,"..............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,$specimen_array[0]."  seconds",0,1,'L',true);
    
    

    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(50);	
    $pdf->Cell(35,5,"Control",0,0,'L',true);
    $pdf->Cell(40,5,"..............................................",0,0,'C',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(60,5,$specimen_array[1]."  seconds",0,1,'L',true);
    
    
    

    $pdf->Ln(5);
    $pdf->SetFont('Times','',11); 	
    $pdf->SetX(10);	
    $pdf->Cell(30,5,"Reference Range: ",0,0,'R',true);
    $pdf->SetFont('Times','B',11); 	
     $pdf->Cell(35,5,"25.4 - 28.4 seconds ",0,0,'L',true);
$pdf->Ln(5);
?>