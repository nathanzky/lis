<?php
if(strtoupper($tot)=="PELVIMETRY"){
while ($rows = $rec->fetch_assoc()){
		$specimen=explode(";", $specimen_data);
		// echo $rows[id] .">" .$results[$rows[id]];
			if($results[$rows[labid]] != "")
				{
				if($rows[subtype] != "NA" && $rows[subtype] != "N/A" && $rows[subtype] != "na") {
						   $subtype = " - ".$rows[subtype];
					   }
				$pdf->Cell(100,7,"Examination Requested : ".$specimen[0],'0',0,'L',true);
				$pdf->Cell(80,7,$specimen[1],'0',0,'L',true);
				$y = $pdf->GetY() + 6;
                $pdf->Line(53,$y,190,$y);
				$pdf->SetFont('Times','B',11);
				$pdf->SetXY(15,85);
                //$pdf->Cell(160,5, "Result: ",0,1,'L',true);
                $pdf->SetX(15);
                $pdf->SetFont('Times','B',11);
				$pdf->Cell(50,10, "DIAMETERS",1,0,'C',true);
				$pdf->Cell(20,10, "ACTUAL",1,0,'C',true);
				$pdf->Cell(20,10, "TOTAL",1,0,'C',true);
				$y = $pdf-> GetY();
				$pdf->MultiCell(30,5, "AVERAGE \n NORMAL",1,'C',true);
				$x = $pdf-> GetX();
				$pdf->SetXY($x+125,$y);
				$pdf->MultiCell(30,5, "AVERAGE \n TOTAL",1,'C',true);
				$pdf->SetXY($x+155,$y);
				$pdf->MultiCell(30,5, "LOW \n NORMAL",1,'C',true);
				$pdf->SetFont('Times','',11);
				$pdf->SetX(15);
				$pdf->Cell(180,6, "Actual Inlet ",1,1,'L',true);
				$pdf->SetX(15);
				$pdf->Cell(50,5, " Anteroposterior ",1,0,'L',true);
				$pdf->Cell(20,5, $specimen[2],1,0,'C',true);
				$pdf->Cell(20,10, $specimen[3],LTR,0,'C',true);
				$pdf->Cell(30,5, "13.5 ",1,0,'C',true);
				$pdf->Cell(30,5, "25.5 ",LTR,0,'C',true);
				$pdf->Cell(30,5, "22.0",LTR,0,'C',true);
				$pdf->Ln();
				$pdf->SetX(15);
				$pdf->Cell(50,5, " Traverse",1,0,'L',true);
				$pdf->Cell(20,5, $specimen[4],1,0,'C',true);
				$pdf->Cell(20,0, "",LR,0,'C',false);
				$pdf->Cell(30,5, "12.5 ",1,0,'C',true);
				$pdf->Cell(30,5, " ",LBR,0,'C',false);
				$pdf->Cell(30,5, " ",LBR,0,'C',false);
				$pdf->Ln();
				$pdf->SetX(15);
				$pdf->Cell(180,6, "Midpelvis",1,1,'L',true);
				$pdf->SetX(15);
				$pdf->Cell(50,5, " Anteroposterior ",1,0,'L',true);
				$pdf->Cell(20,5, $specimen[5],1,0,'C',true);
				$pdf->Cell(20,10, $specimen[6],LTR,0,'C',true);
				$pdf->Cell(30,5, "11.5 ",1,0,'C',true);
				$pdf->Cell(30,5, "22.0 ",LTR,0,'C',true);
				$pdf->Cell(30,5, "20.2 ",LTR,1,'C',true);
				$pdf->SetX(15);
				$pdf->Cell(50,5, " Transverse(bispinous)",1,0,'L',true);
				$pdf->Cell(20,5, $specimen[7],1,0,'C',true);
				$pdf->Cell(20,5, "",LBR,0,'C',false);
				$pdf->Cell(30,5, "10.5 ",1,0,'C',true);
				$pdf->Cell(30,5, " ",LBR,0,'C',false);
				$pdf->Cell(30,5, " ",LBR,1,'C',false);
				$pdf->SetX(15);
				$pdf->Cell(180,6, "Outlet",1,1,'L',true);

				$pdf->SetX(15);
				$pdf->Cell(50,5, " Anteroposterior (postsagittal)",1,0,'L',true);
				$pdf->Cell(20,5, $specimen[8],1,0,'C',true);
				$pdf->Cell(20,10, $specimen[9],LTR,0,'C',true);
				$pdf->Cell(30,5, "7.5 ",1,0,'C',true);
				$pdf->Cell(30,5, "18.0 ",LTR,0,'C',true);
				$pdf->Cell(30,5, "16.0 ",LTR,1,'C',true);
				$pdf->SetX(15);
				$pdf->Cell(50,5, " Transverse(bituberal)",1,0,'L',true);
				$pdf->Cell(20,5, $specimen[10],1,0,'C',true);
				$pdf->Cell(20,5, "",LBR,0,'C',false);
				$pdf->Cell(30,5, "10.5 ",1,0,'C',true);
				$pdf->Cell(30,5, " ",LBR,0,'C',false);
				$pdf->Cell(30,5, " ",LBR,1,'C',false);
				$pdf->Ln(5);
				$pdf->SetX(15);
				$pdf->Cell(180,6, "FETAL HEAD MEASUREMENTS",0,1,'L',true);
				$pdf->SetX(15);
				$pdf->Cell(65,5, "Anteposterior",0,0,'L',true);
				$pdf->Cell(60,5, "Transverse",0,0,'L',true);
				$pdf->Cell(45,5, "Average fetal head dia. = ",0,0,'L',true);
				$pdf->Cell(5,5, $specimen[15]." cm",0,1,'L',true);
				$pdf->SetX(15);
				$pdf->Cell(65,5, "Longest Dia. = ".$specimen[11],0,0,'L',true);
				$pdf->Cell(65,5, "Longest Dia. = ".$specimen[13],0,0,'L',true);
				$pdf->Cell(50,5, "",0,1,'L',true);
				$pdf->SetX(15);
				$pdf->Cell(65,5, "Shortest Dia. = ".$specimen[12],0,0,'L',true);
				$pdf->Cell(65,5, "Shortest Dia. = ".$specimen[14],0,0,'L',true);
				$pdf->Ln(8);
				$pdf->SetX(15);
				$pdf->Cell(65,5, "Position of fetal head = ".$specimen[16],0,0,'L',true);
				$pdf->Cell(65,5, "Shape of Pelvis = ".$specimen[17],0,1,'L',true);
				$pdf->SetX(15);
				$pdf->Cell(65,5, "Position of fetal spine = ".$specimen[18],0,0,'L',true);
				$pdf->Cell(65,5, "Sep. of sumphysis pubis = ".$specimen[19],0,1,'L',true);
				$pdf->SetX(15);
				$pdf->Cell(65,5, "Moulding of fetal head = ".$specimen[20],0,0,'L',true);
				$pdf->Cell(65,5, "coccyx = ".$specimen[21],0,1,'L',true);
				$pdf->Cell(50,5, "",0,1,'L',true);
				$pdf->SetX(15);
				$pdf->SetFont('Times','B',11);
				$pdf->Cell(160,5,"Additional Information:",0,1,'L',true);
				$pdf->SetX(15);
				$pdf->SetFont('Times','',11);
				$pdf->MultiCell(160,5,$note,0,'L',true);
				$pdf->Ln(5);
				$pdf->SetFont('Times','B',11);
				$pdf->SetX(15);
				$pdf->Multicell(120,5,"Impression:",0,'L',true);
				//$pdf->Ln();
				$pdf->SetX(15);
				$pdf->Multicell(160,5,$results[$rows[labid]],0,'L',true);
				 //$ni = "Impression : \n".$results[$rows[labid]];
				 $pdf->Ln();
				 //$y = $pdf->GetY();
				 $pdf->SetFont('Arial','',11);
				 $pdf->SetXY(160,$yy,192,$yy);
				 $pdf->Cell(50,6, "Case ID: ".$specimen[0],0,0,L,true);
				 $pdf->Line(178,$yy+5,192,$yy+5);
				 $pdf->SetY($y);
			       }
			  }
}else{

while ($rows = $rec->fetch_assoc()){
		$specimen=explode(";", $specimen_data,3);
		// echo $rows[id] .">" .$results[$rows[id]];
			if($results[$rows[labid]] != "")
				{
				if($rows[subtype] != "NA" && $rows[subtype] != "N/A" && $rows[subtype] != "na") {
						   $subtype = " - ".$rows[subtype];
					   }
				$pdf->Cell(100,7,"Examination Requested : ".$specimen[0],'0',0,'L',true);
				$pdf->Cell(80,7,$specimen[2],'0',0,'L',true);
				$y = $pdf->GetY() + 6;
                $pdf->Line(53,$y,190,$y);
				$pdf->SetXY(15,90);
                $pdf->SetFont('Times','B',11);
                $pdf->Cell(160,5, "Result: ",0,1,'L',true);
                $pdf->SetX(15);
                $pdf->SetFont('Times','',11);
				$pdf->MultiCell(160,5,$note,0,'L',true);
				$pdf->Ln(5);
				$pdf->SetFont('Times','B',11);
				$pdf->SetX(15);
				$pdf->Multicell(120,5,"Impression:",0,'L',true);
				//$pdf->Ln();
				$pdf->SetX(15);
				$pdf->Multicell(160,5,$results[$rows[labid]],0,'L',true);
				 //$ni = "Impression : \n".$results[$rows[labid]];
				 $pdf->Ln();
				 //$y = $pdf->GetY();
				 $pdf->SetFont('Arial','',11);
				 $pdf->SetXY(160,$yy,192,$yy);
				 $pdf->Cell(50,6, "Case ID: ".$specimen[1],0,0,L,true);
				 $pdf->Line(178,$yy+5,192,$yy+5);
				 $pdf->SetY($y);
			       }
			  }
			  }

?>
