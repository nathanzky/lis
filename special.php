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
	$specimen = explode(';',$specimen_data);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(50,5,'Specimen: ','0','0','L',false);
	$pdf->Cell(80,5,$specimen[1],'B','1','L',false);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(50,6,'Examination Desired: ','0',0,'L',false);
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(80,6,$rows[subtype],'B',0,'L',false); //6-4
	$pdf->Ln(10);

	if($norm != "NA" && $norm != "N/A" && $norm != "")
		{
				//$pdf->Cell(90,7," ",0,0,'C',true);
				//$pdf->Cell(50,7,"",0,0,'C',true);
				//$pdf->SetFont('Times','',12);
			//	$pdf->Cell(50,5,"Result",0,0,'C',true);
				//$pdf->Ln();
		}else
			{
				//$pdf->Cell(100,7,"",0,0,'C',true);
				//$pdf->SetFont('Times','',12);
			//	$pdf->Cell(70,5,"Result",0,0,'C',true);
				//$pdf->Ln();
			}
		 }
	$checker++;

	if($rows[subtype]=="Blood Typing"){
					$pdf->Ln(10);
    				$result=explode(" ", $results[$rows[labid]],2);
					$pdf->SetFont('Times','',12);
					//$pdf->Cell(70,5,'RESULT: ','0',0,'R',true);
					$pdf->Cell(50,10,"BLOOD TYPE",'0',0,'R',true);
					$pdf->SetFont('Times','B',35);
					$pdf->Cell(40,10,"\"".$result[0]."\"",'B',0,'C',true);
					$pdf->SetFont('Times','',12);
					$pdf->Cell(30,10,"Rh",'0',0,'R',true);
					$pdf->SetFont('Times','B',16);
					$pdf->Cell(40,10,$result[1],'B',0,'C',true);
					$x=$pdf->GetX();
					$y=$pdf->GetY();
					//$pdf->Line(70,$y+6,150,$y+6);
					$pdf->Ln();
					$fill = !$fill;
					$lasd1="";
	}
	elseif($rows[subtype]=="ASOT (Quantitative)"){
					$col1 = $rows[subtype];

					$pdf->SetFont('Times','I',12);
					$pdf->Ln(5);
					$pdf->Cell(50,10,"RESULT:",'0',1,'L',true);
					$pdf->SetFont('Times','',11);
					$pdf->SetX(30);
					//$pdf->Cell(10,5,'','0',0,'L',true);
					//$pdf->Cell(30,6,$col1,'0',0,'R',true);
					//$y=$pdf->GetY();
					$pdf->SetFont('Times','B',12);
					$pdf->MultiCell(30,-10,$results[$rows[labid]],'0',C,true);
					$y=$pdf->GetY();
					$pdf->Cell(63,10,"IU/ml",'0','L',true);
					$y=$pdf->GetY();
					//$pdf->SetXY(120,$y);
					//$pdf->Cell(15,5,$specimen[0],'0',0,'C',true);
					$pdf->Ln(20);
					$pdf->SetFont('Times','I',11);
					$pdf->SetX(10);
					$pdf->Cell(30,5,'Reference Range: '."$rows[normalmin] $rows[normalmax]",0,'R',false);
					$pdf->Ln(8);
	}
	elseif($rows[subtype]=="CRP"){
					$col1 = $rows[subtype];

					$pdf->SetFont('Times','I',12);
					$pdf->Cell(55,5,"RESULT:",'0',1,'L',true);
					$pdf->Ln(5);
				  	$pdf->SetFont('Times','',11);
					$pdf->SetX(30);
					//$pdf->Cell(10,5,'','0',0,'L',true);
					$pdf->Cell(30,6,$col1,'0',0,'R',true);
					$y=$pdf->GetY();
					$pdf->SetFont('Times','B',12);
					$pdf->MultiCell(120,6,$results[$rows[labid]],'0',C,true);
					$pdf->SetFont('Times','',12);
					//$pdf->SetXY(120,$y);
					//$pdf->Cell(15,5,$specimen[0],'0',0,'C',true);
					$pdf->Ln(10);
					$pdf->SetFont('Times','I',11);
					$pdf->SetX(13);
					$pdf->Cell(55,5,'Reference Range: '."$rows[normalmin] $rows[normalmax]",0,'R',false);
					$pdf->Ln(8);

	}elseif($rows[subtype]=="AFB stain" || $rows[subtype]=="KOH" || $rows[subtype]=="Anti Treponema Pallidum" ||
					$rows[subtype]=="Anti HAV IgM (Qualitative)"){

					$pdf->Ln(10);
					$pdf->SetX(20);
					//$col1 = "   " .$rows[subtype];
					$pdf->SetFont('Times','I',13);
					$pdf->Cell(50,5,"RESULT:",'0',0,'R',true);
				  	$pdf->SetFont('Times','',11);
					//$pdf->Cell(10,5,'','0',0,'L',true);
					//$pdf->Cell(30,5,$col1,'0',0,'R',true);
					$y=$pdf->GetY();
					$pdf->SetFont('Times','B',13);
					$pdf->MultiCell(100,5,$results[$rows[labid]],'0',L,true);
					//$pdf->SetFont('Times','',12);
					//$pdf->SetXY(120,$y);
					$pdf->Ln(5);
					//$pdf->Cell(20,5,$specimen[0],'0',0,'C',true);
	}elseif($rows[subtype]=="C3" || $rows[subtype]=="CA125" || $rows[subtype]=="Reticulocyte Count"){
					$pdf->Ln(5);
					$pdf->SetX(20);
					//$col1 = "   " .$rows[subtype];
					$pdf->SetFont('Times','I',13);
					$pdf->Cell(60,5,"RESULT: ",'0',0,'R',false);
					$pdf->SetFont('Times','B',13);
					$pdf->Cell(60,5,$results[$rows[labid]],'B',0,C,true);
					//$pdf->SetFont('Times','',12);
					//$pdf->SetXY(120,$y);
					//$pdf->Ln(5);
					$pdf->Cell(20,5,$specimen[0],'0',0,'L',true);
					$pdf->Ln(10);
					$pdf->SetFont('Times','I',12);
					$pdf->SetX(13);
					$pdf->Cell(55,5,'Reference Range: '."$rows[normalmin]  $rows[normalmax]",0,'L',false);
					//$pdf->Ln(5);
	}
	elseif($rows[subtype]=="1 Hour Postprandial Blood Sugar"){

					$pdf->SetX(20);
					$pdf->SetFont('Times','I',12);
					$pdf->Cell(50,5,"RESULT:",'0',1,'L',false);
					$pdf->Ln(3);
					$pdf->SetFont('Times','I',12);
					$pdf->SetX(30);
					$pdf->Cell(40,7,"",'1',0,'L',false);
					$pdf->Cell(40,7,"Patient Result",'1',0,'C',false);
					$pdf->Cell(40,7,"Units",'1',0,'C',false);
					$pdf->Cell(40,7,"Target Value",'1',0,'C',false);
					$pdf->Ln();
					$pdf->SetFont('Times','',12);
					$pdf->SetX(30);
					$pdf->Cell(40,6,"1 hour after meal",'1',0,'L',false);
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(40,6,$results[$rows[labid]],'1',0,'C',false);
					$pdf->SetFont('Times','',12);
					$pdf->Cell(40,6,$specimen[0],'1',0,'C',false);
					$pdf->Cell(40,6,$rows[normalmin],'1',0,'C',false);
				  	$pdf->Ln(10);
	}elseif($rows[subtype]=="HBA1c"){
					$pdf->Ln(10);
					$pdf->SetX(20);
					$pdf->SetFont('Times','I',12);
					$pdf->Cell(30,6,"RESULT:",'0',0,'R',false);
					$pdf->SetFont('Times','',12);
					$pdf->Cell(60,6,$results[$rows[labid]]." ".$specimen[0],'0',0,'C',false);
					$pdf->Cell(60,6,'Reference Range: '."$rows[normalmin] - $rows[normalmax]",0,'R',false);
				  	$pdf->Ln(10);
	}elseif($rows[subtype]=="TPSA (Quanti)"){
					$pdf->Ln(8);
					$pdf->SetX(30);
					$pdf->SetFont('Times','I',12);
					$pdf->Cell(15,6,"RESULT:",'0',0,'R',false);
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(55,6,$results[$rows[labid]],'0',0,'L',false);
					$pdf->Cell(25,6,$specimen[0],'0',0,'L',false);
					$pdf->SetFont('Times','',12);
					$pdf->Cell(70,6,'Normal Value: '."$rows[normalmin] - $rows[normalmax]",0,0,'R',false);
				  	$pdf->Ln(8);
	}elseif($rows[subtype]=="Oral Glucose Challenge Test (50g)"){
					$pdf->Ln(8);
					$pdf->SetX(40);
					$pdf->SetFont('Times','I',12);
					$pdf->Cell(50,6,"Result",'0',0,'C',false);
					$pdf->Cell(40,6,"Units",'0',0,'C',false);
					$pdf->Cell(50,6,"Reference Range",'0',1,'C',false);
					$pdf->Ln(5);
					$pdf->SetFont('Times','B',12);
					$pdf->SetX(40);
					$pdf->Cell(50,6,$results[$rows[labid]],'B',0,'C',false);
					$pdf->Cell(40,6,$specimen[0],'0',0,'C',false);
					$pdf->SetFont('Times','',12);
					$pdf->Cell(50,6,"$rows[normalmin] - $rows[normalmax]",'B',0,'C',false);
				  	$pdf->Ln(5);
	}

	else{
	if($norm != "NA" && $norm != "N/A" && $norm != "") //3 columns
	{
		if($rows[subtype] != "NA" && $rows[subtype] != "N/A" && $rows[subtype] != "na" && $rows[subtype] != "n/a" && $rows[subtype] != "") {
				$col1 = "   " .$rows[subtype];

					$pdf->SetFont('Times','I',12);
					$pdf->Cell(50,5,"RESULT:",'0',1,'L',true);
					$pdf->Ln(3);
				  	$pdf->SetFont('Times','',11);
					//$pdf->Cell(10,5,'','0',0,'L',true);
					$pdf->Cell(60,5,$col1,'0',0,'R',true);
					$y=$pdf->GetY();
					$pdf->SetFont('Times','B',12);
					$pdf->MultiCell(50,5,$results[$rows[labid]],'B',C,true);
					$pdf->SetFont('Times','',12);
					$pdf->SetXY(120,$y);
					$pdf->Cell(20,5,$specimen[0],'0',0,'C',true);
					$pdf->SetFont('Times','I',11);
					$pdf->Cell(55,5,'Reference Range: '."$rows[normalmin]-$rows[normalmax]",0,'R',false);
					//$pdf->Cell(20,5,"$rows[normalmin]-$rows[normalmax]",'0',1,'L',true);
		}else{
				$col1 = "    ".$rows[typeoftest];
			     if($col1 != "") {
					$pdf->Ln(10);
					$pdf->Cell(20,5,'','0',0,'L',true);
					//$pdf->Cell(50,5,'','0',0,'L',true);
					$pdf->SetFont('Times','I',12);
					$pdf->Cell(20,6,'RESULT:','0',0,'R',true);
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(40,5,$results[$rows[labid]],'B',0,'C',true);
					$pdf->Cell(20,5,$specimen[0],'0',0,'C',true);
					$pdf->SetFont('Times','I',11);
					$pdf->Cell(60,5,'Reference Range: '."$rows[normalmin]-$rows[normalmax]",'0',0,'R',true);
					//$pdf->Cell(20,5,"$rows[normalmin]-$rows[normalmax]",'0',0,'L',true);
					$pdf->Ln(10);
					$fill = !$fill;
					$lasd1="";
					}
		}

	}else{ //2 columns only walang normal
		if($rows[subtype] != "NA" && $rows[subtype] != "N/A" && $rows[subtype] != "na" && $rows[subtype] != "n/a" && $rows[subtype] != "") {
				$col1 = "   ".$rows[typeoftest];
				  if($lasd1 != $rows[typeoftest]) {
					$lasd1 = $rows[typeoftest];
				  }

					$pdf->SetFont('Times','',11);
					$pdf->SetX(30);
					$pdf->Cell(10,5,'RESULT: ','0',1,'R',true);
					$pdf->SetX(30);
					$pdf->Cell(50,5,$rows[subtype],'0',0,'R',true);
					$pdf->Cell(25,6,'..........................','0',0,'C',true);
					$y=$pdf->GetY();
					$pdf->SetFont('Times','B',12);
					$pdf->Multicell(60,5,$results[$rows[labid]],0,'L',false);
					$pdf->SetXY(165,$y);
					$pdf->Cell(20,5,$specimen[0],'0',0,'C',true);
					$pdf->Ln();
		}
		else{
		$col1 = "   ".$rows[typeoftest];
			     if($col1 != "") {
					$pdf->Ln(10);
					$pdf->SetFont('Times','',11);
					$pdf->SetX(20);
					$pdf->Cell(10,5,'RESULT: ','0',1,'R',true);
					$pdf->SetFont('Times','B',14);
					$pdf->Multicell(60,5,$results[$rows[labid]],0,'C',false);
					$y=$pdf->GetY();
					$pdf->SetXY(100,$y);
					$pdf->Cell(20,5,$specimen[0],'0',0,'C',true);
					$x=$pdf->GetX();
					$y=$pdf->GetY();
					$pdf->Line(70,$y+6,150,$y+6);
					$pdf->Ln();
					$fill = !$fill;
					$lasd1="";
					}
		}

		}
		}
		}
?>
