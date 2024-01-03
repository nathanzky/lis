<?php
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
	$yy=$pdf->GetY();
	$x=$pdf->GetX();

	$pdf->SetFont('Times','B',16); 
	$pdf->Cell(55,8,'PHYSICAL PROPERTIES ','0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->SetFont('Times','',16);
	$pdf->Cell(45,7,'	Color: ','0',0,'L',true);
	$pdf->Cell(40,7,$specimen_array[0],'0',1,'L',true);
	$x=$pdf->GetX();
	$y=$pdf->GetY();
	$pdf->Line(30,$y-1,90,$y-1);
	$pdf->Cell(45,7,'	Consistency: ','0',0,'L',true);
	$pdf->Cell(40,7,$specimen_array[1],'0',1,'L',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(40,$y-1,90,$y-1);
	$pdf->Ln();
	$pdf->SetFont('Times','B',16);
	$pdf->Cell(55,8,'CHEMICAL TEST','0',1,'L',true);
	$pdf->SetFont('Times','',16);
	$pdf->Cell(45,7,'	Occult Blood: ','0',0,'L',true);
	$pdf->Cell(40,7,$specimen_array[2],'0',1,'L',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(40,$y-1,90,$y-1);
	$pdf->Ln();
	$pdf->SetFont('Times','B',16);
	$pdf->Cell(55,8,'MICROSCOPIC FINDINGS ','0',1,'L',true);
	$pdf->SetFont('Times','',16);
	$pdf->Cell(45,8,'	Pus Cells: ','0',0,'L',true);
	$pdf->Cell(40,8,$specimen_array[3],'0',1,'L',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(35,$y-2,90,$y-2);
	$pdf->Cell(45,8,'	RBC: ','0',0,'L',true);
	$pdf->Cell(40,8,$specimen_array[4],'0',1,'L',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(30,$y-2,90,$y-2);
	$pdf->Cell(45,8,'	Fat Globules: ','0',0,'L',true);
	$pdf->Cell(40,8,$specimen_array[5],'0',1,'L',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(40,$y-2,90,$y-2);
	$pdf->Cell(45,8,'	Yeast Cells: ','0',0,'L',true);
	$pdf->Cell(40,8,$specimen_array[6],'0',1,'L',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(37,$y-2,90,$y-2);
	$pdf->Cell(45,8,'	Others: ','0',0,'L',true);
	$pdf->Cell(40,8,$specimen_array[7],'0',1,'L',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(35,$y-2,90,$y-2);

//RIGHT COLUMN
	
	$pdf->SetFont('Times','B',16); 
	$pdf->SetXY(100,$yy);
	$x=$pdf->GetX();
	$pdf->Cell(55,8,'PARASITES ','0',1,'L',true);
	$pdf->SetFont('Times','',13.5);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'Ascaris Lumbricoides: ','0',0,'L',true);
	$pdf->SetX($x+45);
	$xx=$pdf->GetX();
	$pdf->Cell(40,7,$specimen_array[8],'0',1,'L',true);
	$pdf->SetX($x);
	$y=$pdf->GetY();
	$pdf->Line(145,$y-1,190,$y-1);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'	T. Trichura: ','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,7,$specimen_array[9],'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(125,$y-1,190,$y-1);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'	Hookworm: ','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,7,$specimen_array[10],'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(127,$y-1,190,$y-1);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'	Others: ','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,7,$specimen_array[11],'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(120,$y-1,190,$y-1);
	
	$pdf->SetFont('Times','B',16);
	//$pdf->SetX($x);
	$y=$pdf->GetY();
	$pdf->SetXY($x,$y+5);
	$pdf->Cell(55,8,'AMOEBA','0',1,'L',true);
	$pdf->SetFont('Times','',14);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'	E. hystolytica cyst: ','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,8,$specimen_array[12],'0',1,'L',true);
	$y=$pdf->GetY();
	
	$pdf->Line(137,$y-2,190,$y-2);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'	Trophozoite: ','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,8,$specimen_array[13],'0',1,'L',true);
	$y=$pdf->GetY();
	
	$pdf->Line(127,$y-2,190,$y-2);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'	E. coli cyst: ','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,8,$specimen_array[14],'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(126,$y-2,190,$y-2);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'	Trophozoite: ','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,8,$specimen_array[15],'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(127,$y-2,190,$y-2);
	
	$pdf->SetXY($x,$y+5);
	$pdf->Cell(45,7,'Blastocystis hominis:','0',1,'L',true);
	$pdf->SetFont('Times','',16);
	$pdf->SetX($xx);
	$pdf->Cell(40,-8,$specimen_array[16],'0',0,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(140,$y-2,190,$y-2);
	
	$pdf->SetFont('Times','B',16);
	$y=$pdf->GetY();
	$pdf->SetXY($x,$y+5);
	$pdf->Cell(55,8,'OTHERS','0',1,'L',true);
	$pdf->SetFont('Times','',13.5);
	$pdf->SetX($x);
	$pdf->Cell(60,7,$specimen_array[17],'0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Multicell(35,8,$specimen_array[18],0,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(140,$y-2,190,$y-2);

	
//}
$pdf->Ln(10);
$pdf->Cell(10,7,$specimen_array[19],1,0,'L',true);
$pdf->Cell(0,7,'Specimen collected at the center.',L,1,'L',true);

?>