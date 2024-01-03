<?php
$pdf->Ln(5);
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
	$pdf->Cell(45,7,'	Transparency: ','0',0,'L',true);
	$pdf->Cell(40,7,$specimen_array[1],'0',1,'L',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(40,$y-1,90,$y-1);
	
	$pdf->Ln();
	$pdf->SetFont('Times','B',16);
	$pdf->Cell(55,8,'CHEMICAL TEST','0',1,'L',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->SetFont('Times','',16);
	//$pdf->Line(40,$y-1,90,$y-1);
	$pdf->Cell(45,7,'	pH ','0',0,'L',true);
	$pdf->Cell(40,7,$specimen_array[2],'0',1,'L',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(40,$y-1,90,$y-1);
	$pdf->Cell(45,7,'	Specific Gravity: ','0',0,'L',true);
	$pdf->Cell(40,7,$specimen_array[3],'0',1,'L',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(40,$y-1,90,$y-1);
	$pdf->SetFont('Times','',16);
	$pdf->Cell(45,7,'	Protein: ','0',0,'L',true);
	$pdf->Cell(35,7,$specimen_array[4],'0',1,'L',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(40,$y-1,90,$y-1);
	$pdf->Cell(45,7,'	Glucose: ','0',0,'L',true);
	$pdf->Cell(35,7,$specimen_array[5],'0',1,'L',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(40,$y-1,90,$y-1);
	$pdf->Ln();
	$pdf->SetFont('Times','B',16);
	$pdf->Cell(55,8,'MICROSCOPIC FINDINGS ','0',1,'L',true);
	$pdf->SetFont('Times','',16);
	$pdf->Cell(45,7,'	WBC: ','0',0,'L',true);
	$pdf->Cell(40,7,$specimen_array[6].' / HPF','0',1,'C',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(40,$y-1,90,$y-1);
	$pdf->Cell(45,7,'	RBC: ','0',0,'L',true);
	$pdf->Cell(40,7,$specimen_array[7].' / HPF','0',1,'C',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(40,$y-1,90,$y-1);
	
	$pdf->Ln();
	$pdf->SetFont('Times','B',16);
	$pdf->Cell(55,8,'RBC Morphology: ','0',1,'L',true);
	$pdf->SetFont('Times','',16);
	$pdf->Cell(45,7,'	   Intact: ','0',0,'L',true);
	$pdf->Cell(40,7,$specimen_array[8]." %",'0',1,'C',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(40,$y-1,90,$y-1);
	$pdf->Cell(45,7,'	   Crenated: ','0',0,'L',true);
	$pdf->Cell(40,7,$specimen_array[9]." %",'0',1,'C',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(40,$y-1,90,$y-1);
	$pdf->Cell(45,7,'	   Dysmorphic: ','0',0,'L',true);
	$pdf->Cell(40,7,$specimen_array[10]." %",'0',1,'C',true);
	$y=$pdf->GetY();
	$x=$pdf->GetX();
	$pdf->Line(40,$y-1,90,$y-1);
	//$pdf->Cell(45,7,'	   Shadow: ','0',0,'L',true);
	//$pdf->Cell(40,7,$specimen_array[11]."%",'0',1,'C',true);
	//$y=$pdf->GetY();
	//$x=$pdf->GetX();
	//$pdf->Line(35,$y-1,90,$y-1);
	//$pdf->Cell(45,7,'	   Swollen: ','0',0,'L',true);
	//$pdf->Cell(40,7,$specimen_array[12]."%",'0',1,'C',true);
	//$y=$pdf->GetY();
	//$x=$pdf->GetX();
	//$pdf->Line(35,$y-1,90,$y-1);

//RIGHT COLUMN
	
	$pdf->SetFont('Times','B',14.5); 
	$pdf->SetXY(100,$yy);
	$x=$pdf->GetX();
	$pdf->Cell(55,8,'      CASTS:','0',1,'L',true);
	$pdf->SetFont('Times','',13);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'WBC: ','0',0,'L',true);
	$pdf->SetX($x+55);
	$xx=$pdf->GetX();
	$pdf->Cell(40,7,$specimen_array[11]." / LPF",'0',1,'L',true);
	$pdf->SetX($x);
	$y=$pdf->GetY();
	$pdf->Line(120,$y-1,190,$y-1);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'RBC: ','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,7,$specimen_array[12]." / LPF",'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(120,$y-1,190,$y-1);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'Waxy','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,7,$specimen_array[13]." / LPF",'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(120,$y-1,190,$y-1);
	$pdf->SetX($x);
	//$pdf->Cell(45,7,'Hyaline:','0',0,'L',true);
	//$pdf->SetX($xx);
	//$pdf->Cell(40,7,$specimen_array[14],'0',1,'L',true);
	//$y=$pdf->GetY();
	//$pdf->Line(120,$y-1,190,$y-1);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'Coarse:','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,7,$specimen_array[14]." / LPF",'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(120,$y-1,190,$y-1);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'Fine:','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,7,$specimen_array[15]." / LPF",'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(120,$y-1,190,$y-1);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	
	
	$pdf->SetX($x);
	$pdf->Cell(45,7,'Squamous Epithelial Cells:','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,7,$specimen_array[16],'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(148,$y-1,190,$y-1);
	$pdf->SetX($x);
	$pdf->Cell(50,7,'Transitional Epithelial Cells:','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,7,$specimen_array[17],'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(148,$y-1,190,$y-1);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'Renal Epithelial:','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,7,$specimen_array[18]." / HPF",'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(148,$y-1,190,$y-1);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'Amorphous Deposits:','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,7,$specimen_array[19],'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(148,$y-1,190,$y-1);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'Bacteria:','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,7,$specimen_array[20],'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(148,$y-1,190,$y-1);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'Mucus Threads:','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Cell(40,7,$specimen_array[21],'0',1,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(148,$y-1,190,$y-1);
	$pdf->SetX($x);
	$pdf->Cell(45,7,'Yeast Cells:','0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Multicell(40,7,$specimen_array[22],0,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(148,$y-1,190,$y-1);
	$pdf->SetX($x);	
	$pdf->Cell(50,7,$specimen_array[23],'0',0,'L',true);
	$pdf->SetX($xx);
	$pdf->Multicell(40,7,$specimen_array[24],0,'L',true);
	$y=$pdf->GetY();
	$pdf->Line(148,$y-1,190,$y-1);

//$pdf->SetY();
$pdf->Ln(17);
$pdf->Cell(10,7,$specimen_array[25],1,0,'L',true);
$pdf->Cell(0,7,'Specimen collected at the center.',L,1,'L',true);
?>