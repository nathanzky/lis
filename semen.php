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
	//$pdf->SetFont('Times','',12);
	//$pdf->Cell(50,6,'Examination Desired: ','0',0,'L',false);
	//$pdf->SetFont('Times','B',11);
	//$pdf->Cell(80,6,$rows[typeoftest],'B',0,'L',false); //6-4
	//$pdf->Ln(7);

	$pdf->SetFont('Times','',13);
	$y=$pdf->GetY();
	$pdf->Cell(95,7,'   Time Collected: ','1',0,'L',true);
	$time_col  = date("g:i A", strtotime($specimen_array[0]));
	$pdf->Cell(-5,7,$time_col,'B',1,0,'L',true);
	$pdf->Cell(95,7,'   Time Received: ','1',0,'L',true);
	$time_rec  = date("g:i A", strtotime($specimen_array[1]));
	$pdf->Cell(-5,7,$time_rec,'B',1,0,'L',true);
	//$pdf->Cell(95,7,'   Time Examined: ','1',0,'L',true);
	//$time_exm  = date("g:i A", strtotime($specimen_array[2]));
	//$pdf->Cell(-5,7,$time_exm,'B',1,0,'L',true);
	//$y=$pdf->GetY()+7;
	//$pdf->SetFont('Times','',13);
	//$pdf->Cell(95,7,'   Volume: ','1',0,'L',true);
	//$pdf->Cell(-10,7,$specimen_array[3].' mL','B',1,'R',true);
	//$pdf->Cell(90,7,'   Viscousity: ','1',0,'L',true);
	//$pdf->Cell(-10,7,$specimen_array[4].'','B',1,'R',true);
	//$pdf->Cell(90,7,'   PH: ','1',0,'L',true);
	//$pdf->Cell(-10,7,$specimen_array[5],'B',1,'R',true);
	//$pdf->Cell(90,7,'   Liquefaction Time: ','1',0,'L',true);
	//$pdf->Cell(-10,7,$specimen_array[6],'B',1,'R',true);
	//$pdf->Cell(90,7,'   Sperm Count: ','1',0,'L',true);
	//$pdf->Cell(-10,7,$specimen_array[7],'B',1,'R',true);



	$pdf->SetFont('Times','',13);
	$pdf->SetXY(100,$y);
	$pdf->SetX(100);
	$pdf->Cell(95,7,'Motility ','1',0,'C',true);
	$pdf->Cell(-1,0,"",'B',0,'C',true);
	$x=$pdf->GetX();
	$pdf->SetXY(100,$y+7);
	$pdf->Cell(95,7,'    Motile: ','1',0,'L',true);
	$pdf->Cell(-5,7,$specimen_array[8]." %",'B',1,'R',true);
	$pdf->Cell(85,-7,'','1',0,'R',true);
	//$pdf->SetXY(100,$y+14);
	//$pdf->Cell(95,7,'    Less Motile: ','1',0,'L',true);
	//$pdf->Cell(-3,7,$specimen_array[9]." %",'B',1,'R',true);
	//$pdf->SetXY(100,$y+21);
	//$pdf->Cell(95,7,'    Non Motile: ','1',0,'L',true);
	//$pdf->Cell(-3,7,$specimen_array[10]." %",'B',1,'R',true);
	//$pdf->SetXY(100,$y+28);
	//$pdf->Cell(95,7,'   Normal: ','1',0,'L',true);
	//$pdf->Cell(-3,7,$specimen_array[11]." %",'B',1,'R',true);
	//$pdf->SetXY(100,$y+35);
	//$pdf->Cell(95,7,'   Abnormal: ','1',0,'L',true);
	//$pdf->Cell(-3,7,$specimen_array[12]." %",'B',1,'R',true);
	//$pdf->SetXY(100,$y+42);
	//$pdf->Cell(95,7,'   Pus Cells: ','1',0,'L',true);
	//$pdf->Cell(-3,7,$specimen_array[13]." /hpf",'B',1,'R',true);
	//$pdf->SetXY(100,$y+49);
	//$pdf->Cell(95,7,'   RBC: ','1',0,'L',true);
	//$pdf->Cell(-3,7,$specimen_array[14]." /hpf",'B',1,'R',true);
	//$pdf->SetFont('Times','',10);


	$pdf->SetXY(10,120);
	$xx=$pdf->GetX();
	$yy=$pdf->GetY();
	$pdf->SetFont('Times','B',13);
	$pdf->Cell(90,7,'Normal Value: 60-120 million/mL','0',0,'L',false);

	//$pdf->SetXY($xx+90,$yy);
	//$pdf->Cell(40,6,'Total Sperm Count: ','0',0,'R',false);
	//$pdf->SetXY($xx+140,$yy);
	//$pdf->Cell(50,5,$results[$rows[labid]].' /mL','B',0,'L',false);
	$checker++;
	}
}
	$pdf->Ln(-5);

?>
