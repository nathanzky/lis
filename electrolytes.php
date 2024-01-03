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
	while ($rows = $rec->fetch_assoc()){
	$specimen_array=explode(";", $specimen_data);
	$checker++;
	if(!empty($specimen_array[0]) && $specimen_array[0]!="NA" && $specimen_array[0]!="0" && $specimen_array[0]!="na" && $specimen_array[0]!="-"){
		$test1="SODIUM ";
	}
	if(!empty($specimen_array[1]) && $specimen_array[1]!="NA" && $specimen_array[1]!="0" && $specimen_array[1]!="na" && $specimen_array[1]!="-"){
		$test2="POTASSIUM ";
	}
	if(!empty($specimen_array[2]) && $specimen_array[2]!="NA" && $specimen_array[2]!="0" && $specimen_array[2]!="na" && $specimen_array[2]!="-"){
		$test3="CHLORIDE ";
	}
	if(!empty($specimen_array[3]) && $specimen_array[3]!="NA" && $specimen_array[3]!="0" && $specimen_array[3]!="na" && $specimen_array[3]!="-"){
		$test4="iCALCIUM";
	}
	if(!empty($specimen_array[4]) && $specimen_array[4]!="NA" && $specimen_array[4]!="0" && $specimen_array[4]!="na" && $specimen_array[4]!="-"){
		$test4="Total CALCIUM";
	}
	$pdf->SetFont('Times','',12);
	$pdf->Cell(50,5,'Specimen: ','0','0','L',true);
	$pdf->Cell(80,5,$specimen_array[5],'B','1','L',true);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(50,6,'Examination Desired: ','0',0,'L',true);
    $pdf->SetFont('Times','B',10);
	$pdf->Cell(80,6,$rows[subtype],'B',0,'L',true);
	//$pdf->Cell(80,6,$test1.$test2.$test3.$test4,'B',0,'L',true);
	$pdf->Ln(10);

    $pdf->SetFont('Times','B',11);
    $pdf->SetX(40);
    $pdf->Cell(35,5,"",0,0,'L',true);
    $pdf->Cell(30,5,"Result",0,0,'C',true);
    $pdf->Cell(30,5,"Units",0,0,'C',true);
    $pdf->Cell(40,5,"Reference Range",0,1,L,true);
    $pdf->Ln(5);

    //end of header
		if(!empty($specimen_array[0]) && $specimen_array[0]!="NA" && $specimen_array[0]!="0" && $specimen_array[0]!="na" && $specimen_array[0]!="-"){
    $pdf->SetFont('Times','',11);
    $pdf->SetX(40);
    $pdf->Cell(35,5,"SODIUM",0,0,'L',true);
    $pdf->Cell(30,5,$specimen_array[0],0,0,'C',true);
    $pdf->Cell(30,5,"mmol/L",0,0,'C',true);
    $y=$pdf->GetY()+4;
    $pdf->Line(80,$y,105,$y);
    $pdf->Cell(40,5,"135.0 - 145.0",0,1,L,true);
    $pdf->Line(135,$y,175,$y);
    $pdf->SetFont('Times','B',11);
	}

	if(!empty($specimen_array[1]) && $specimen_array[1]!="NA" && $specimen_array[1]!="0" && $specimen_array[1]!="na" && $specimen_array[1]!="-"){
    $pdf->SetFont('Times','',11);
    $pdf->SetX(40);
    $pdf->Cell(35,5,"POTASSIUM",0,0,'L',true);
    $pdf->Cell(30,5,$specimen_array[1],0,0,'C',true);
    $pdf->Cell(30,5,"mmol/L",0,0,'C',true);
     $y=$pdf->GetY()+4;
    $pdf->Line(80,$y,105,$y);
    $pdf->Cell(40,5,"3.50 - 5.10",0,1,L,true);
    $pdf->Line(135,$y,175,$y);
    $pdf->SetFont('Times','B',11);
	}

	if(!empty($specimen_array[2]) && $specimen_array[2]!="NA" && $specimen_array[2]!="0" && $specimen_array[2]!="na" && $specimen_array[2]!="-"){
    $pdf->SetFont('Times','',11);
    $pdf->SetX(40);
    $pdf->Cell(35,5,"CHLORIDE",0,0,'L',true);
    $pdf->Cell(30,5,$specimen_array[2],0,0,'C',true);
     $pdf->Cell(30,5,"mmol/L",0,0,'C',true);
     $y=$pdf->GetY()+4;
    $pdf->Line(80,$y,105,$y);
    $pdf->Cell(40,5,"98.0 - 107.0",0,1,L,true);
    $pdf->Line(135,$y,175,$y);
    $pdf->SetFont('Times','B',11);
	}

	if(!empty($specimen_array[3]) && $specimen_array[3]!="NA" && $specimen_array[3]!="0" && $specimen_array[3]!="na" && $specimen_array[3]!="-"){
    $pdf->SetFont('Times','',11);
    $pdf->SetX(40);
    $pdf->Cell(35,5,"iCALCIUM",0,0,'L',true);
    $pdf->Cell(30,5,$specimen_array[3],0,0,'C',true);
    $pdf->Cell(30,5,"mmol/L",0,0,'C',true);
     $y=$pdf->GetY()+4;
    $pdf->Line(80,$y,105,$y);
    $pdf->Cell(40,5,"1.15 - 1.33",0,1,L,true);
    $pdf->Line(135,$y,175,$y);
    $pdf->SetFont('Times','B',11);
	}
	
	if(!empty($specimen_array[4]) && $specimen_array[4]!="NA" && $specimen_array[4]!="0" && $specimen_array[4]!="na" && $specimen_array[4]!="-"){
    $pdf->SetFont('Times','',11);
    $pdf->SetX(40);
    $pdf->Cell(35,5,"Total CALCIUM",0,0,'L',true);
    $pdf->Cell(30,5,$specimen_array[4],0,0,'C',true);
    $pdf->Cell(30,5,"mmol/L",0,0,'C',true);
     $y=$pdf->GetY()+4;
    $pdf->Line(80,$y,105,$y);
    $pdf->Cell(40,5,"2.10 - 2.60",0,1,L,true);
    $pdf->Line(135,$y,175,$y);
    $pdf->SetFont('Times','B',11);
	}
}

?>
