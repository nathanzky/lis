<?php
$fil = 0;

foreach(array_keys($results) as $lid)
	{
		$ids .= "$lid,"	;
	}
	$ids = rtrim($ids,",");

	//Query all lab test na may results
	$sql = "SELECT * FROM labtest where labid in($ids)";
	$rec = $links->query($sql) or die($links->error);
	$fir = 0;
	while ($rows = $rec->fetch_assoc()){
/******************************Special Tests set start marker *******************************************/

	if($checker==0) {
	$norm = $rows[normalmin];
	$specimen_array=explode(";", $specimen_data);
	//$pdf->SetFont('Times','',12);
	//$pdf->Cell(50,5,'Specimen: ','0','0','L',false);
	//$pdf->Cell(80,5,$specimen,'B','1','L',false);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(50,6,'Examination Desired: ','0',0,'L',false);
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(80,6,$rows[typeoftest],'B',0,'L',false); //6-4
	$pdf->Ln(7);

	$pdf->SetFont('Times','',11);
	$pdf->Cell(50,6,'Time Collected: ','1',0,'L',false);
	$time_col  = date("g:i A", strtotime($specimen_array[0]));
	$y=$pdf->GetY();
	$pdf->Cell(30,6,$time_col,'B',1,'L',false);
	//$pdf->Cell(50,6,$specimen,'0',0,'L',false);
	//$pdf->Ln();
	$pdf->Cell(50,5,'Time Received: ','1',0,'L',false);
	$time_rec  = date("g:i A", strtotime($specimen_array[1]));
	$pdf->Cell(30,6,$time_rec,'B',1,'L',false);
	$pdf->Cell(50,5,'Time Examined: ','0',0,'L',false);
	$time_exm  = date("g:i A", strtotime($specimen_array[2]));
	$pdf->Cell(30,6,$time_exm,'B',1,'L',false);
	$pdf->Cell(50,5,'Volume: ','0',0,'L',false);
	$pdf->Cell(30,6,$specimen_array[3].' mL','B',1,'L',false);
	$pdf->Cell(50,5,'Reaction: ','0',0,'L',false);
	$pdf->Cell(30,6,$specimen_array[4].'','B',1,'L',false);
	$pdf->Cell(50,5,'Viscousity: ','0',0,'L',false);
	$pdf->Cell(30,6,$specimen_array[5],'B',1,'L',false);
	$pdf->Cell(50,5,'Liquifaction Time: ','0',0,'L',false);
	$pdf->Cell(30,6,$specimen_array[6],'B',1,'L',false);



	$pdf->SetFont('Times','',11);
	$pdf->SetXY(100,$y);
	//$pdf->SetX(100);
	$pdf->Cell(50,5,'Motility ','0',0,'L',false);
	$pdf->Cell(15,5,"",'0',1,'L',false);
	$x=$pdf->GetX();
	$pdf->SetXY(100,$y+5);
	$pdf->Cell(50,5,'    Motile: ','0',0,'L',false);
	$pdf->Cell(30,5,$specimen_array[7]." %",'B',1,'L',false);
	$pdf->SetXY(100,$y+10);
	$pdf->Cell(50,5,'    Less Motile: ','0',0,'L',false);
	$pdf->Cell(30,5,$specimen_array[8]." %",'B',1,'L',false);
	$pdf->SetXY(100,$y+15);
	$pdf->Cell(50,5,'    Non Motile: ','0',0,'L',false);
	$pdf->Cell(30,5,$specimen_array[9]." %",'B',1,'L',false);
	$pdf->SetXY(100,$y+20);
	$pdf->Cell(50,5,'Morphology: ','0',0,'L',false);
	$pdf->Ln();
	$pdf->SetXY(100,$y+25);
	$pdf->Cell(50,5,'   Normal: ','0',0,'L',false);
	$pdf->Cell(30,5,$specimen_array[10]." %",'B',1,'L',false);
	$pdf->SetXY(100,$y+30);
	$pdf->Cell(50,5,'   Abnormal: ','0',0,'L',false);
	$pdf->Cell(30,5,$specimen_array[11]." %",'B',1,'L',false);
	$pdf->SetXY(100,$y+35);
	$pdf->Cell(50,5,'   Pus Cells ','0',0,'L',false);
	$pdf->Cell(30,5,$specimen_array[12]." /hpf",'B',1,'L',false);
	$pdf->SetXY(100,$y+40);
	$pdf->Cell(50,5,'   RBC ','0',0,'L',false);
	$pdf->Cell(30,5,$specimen_array[13]." /hpf",'B',1,'L',false);
	$pdf->SetFont('Times','',10);


	$pdf->SetXY(10,120);
	$xx=$pdf->GetX();
	$yy=$pdf->GetY();
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(50,6,'Normal Value: 60-120 million/mL','0',0,'L',false);

	$pdf->SetXY($xx+90,$yy);
	$pdf->Cell(40,6,'Total Sperm Count: ','0',0,'R',false);
	$pdf->SetXY($xx+140,$yy);
	$pdf->Cell(50,5,$results[$rows[labid]].' /mL','B',0,'L',false);
	$checker++;
	}
}
	//$pdf->Ln();

?>
