<?php
while ($rows = $rec->fetch_assoc()){
	if(strtoupper($tot) == "FETAL AGING"){
		if($results[$rows[labid]] != "")
				   {
					   if($rows[subtype] != "NA" && $rows[subtype] != "N/A" && $rows[subtype] != "na") {
						   $subtype = " - ".$rows[subtype];
					   }
		$specimen_array=explode(";", $specimen_data);
		$pdf->Cell(100,7,"Examination Requested : $rows[typeoftest] $subtype",'0',0,'L',true);
		$y = $pdf->GetY() + 6;
    	$pdf->Line(53,$y,190,$y);
		$pdf->Ln();
		$pdf->Cell(45,5,'','0',0,'L',false);
		$pdf->Cell(80,5,$specimen_array[1],'0',0,'L',false);
		$pdf->Ln();
		$pdf->SetXY(10,85);
		$pdf->SetFont('Times','B',11);
        $pdf->Cell(160,5, "Result: ",0,1,'L',true);
		$pdf->Ln();
		$pdf->SetFont('Times','BU',11);
		$pdf->Cell(160,5, $specimen_array[2],0,1,'L',true);
		$pdf->SetFont('Times','',11);
		$pdf->Cell(160,5,'I. FETAL SURVEILLANCE',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(50,5,'Presentation - '.$specimen_array[3],0,0,'L',true);
		$pdf->Cell(60,5,'Gender - '.$specimen_array[8],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(50,5,'Number of Fetus - '.$specimen_array[4],0,0,'L',true);
		$pdf->Cell(60,5,'Placental Grade - '.$specimen_array[9],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(50,5,'Fetal Heart Rate - '.$specimen_array[5].' bpm',0,0,'L',true);
		$pdf->Cell(60,5,'Placental Position - '.$specimen_array[10],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(160,5,'Amniotic Fluid - '.$specimen_array[6],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(160,5,'Total - '.$specimen_array[7].' cm',0,1,'L',true);
		$pdf->Cell(160,5,'II.	FETAL BIOMETRY',0,1,'L',true);
		$pdf->Ln(3);
		$pdf->SetX(20);
		$pdf->Cell(30,5,'BPD - '.$specimen_array[11].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[12].' w',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[13].' d',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->Cell(30,5,'FL - '.$specimen_array[14].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[15].' w',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[16].' d',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->Cell(30,5,'HC - '.$specimen_array[17].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[18].' w',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[19].' d',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->Cell(30,5,'AC - '.$specimen_array[20].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[21].' w',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[22].' d',0,1,'L',true);
		$pdf->Ln();
		$pdf->SetX(20);
		$pdf->Cell(50,5,'Average Ultrasound Age - ',0,0,'L',true);
		$pdf->Cell(15,5,$specimen_array[23].' w',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[24].' d',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->Cell(80,5,'Estimated Fetal Weight - '.$specimen_array[25].' grams',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->SetFont('Times','B',11);
		$deldate = date("M d, Y", strtotime($specimen_array[26]));
		$pdf->Cell(80,5,'Estimated Date of Delivery - '.$deldate,0,1,'L',true);

		$pdf->Ln();
        $pdf->SetFont('Times','B',11);
		$pdf->MultiCell(180,5,$note,0,'L',true);
		$pdf->Ln(5);
		$pdf->SetFont('Times','B',11);

		$pdf->Multicell(120,5,"Impression:",0,'L',true);
		$pdf->Ln();

		$pdf->Multicell(180,5,$results[$rows[labid]],0,'L',true);
		//$ni = "Impression : \n".$results[$rows[labid]];
		$pdf->Ln();
		//$y = $pdf->GetY();
		$pdf->SetFont('Arial','',11);
		$pdf->SetXY(160,$yy,192,$yy);
		$pdf->Cell(50,6, "Case ID: ".$specimen_array[0],0,0,L,true);
		$pdf->Line(178,$yy+5,192,$yy+5);
		$pdf->SetY($y);
			}
		} elseif (strtoupper($tot) == "FETAL AGING WITH BIOPHYSICAL PROFILE (BPP)"){
		if($results[$rows[labid]] != "")
				   {
					   if($rows[subtype] != "NA" && $rows[subtype] != "N/A" && $rows[subtype] != "na") {
						   $subtype = " - ".$rows[subtype];
					   }
		$specimen_array=explode(";", $specimen_data);
		$pdf->Cell(150,7,"Examination Requested : $rows[typeoftest] $subtype",0,0,'L',true);
		$y = $pdf->GetY() + 6;
    	$pdf->Line(53,$y,190,$y);
		$pdf->Ln();
		$pdf->Cell(45,5,'','0',0,'L',false);
		$pdf->Cell(80,5,$specimen_array[1],'0',0,'L',false);
		$pdf->Ln();
		$pdf->SetXY(10,85);
		$pdf->SetFont('Times','B',11);
        $pdf->Cell(160,5, "Result: ",0,1,'L',true);
		$pdf->SetFont('Times','BU',11);
		$pdf->Cell(160,5, $specimen_array[2],0,1,'L',true);
		$pdf->SetFont('Times','',11);
		$pdf->Cell(160,5,'I. FETAL SURVEILLANCE',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(50,5,'Presentation - '.$specimen_array[3],0,0,'L',true);
		$pdf->Cell(60,5,'Gender - '.$specimen_array[8],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(50,5,'Number of Fetus - '.$specimen_array[4],0,0,'L',true);
		$pdf->Cell(60,5,'Placental Grade - '.$specimen_array[9],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(50,5,'Fetal Heart Rate - '.$specimen_array[5].' bpm',0,0,'L',true);
		$pdf->Cell(60,5,'Placental Position - '.$specimen_array[10],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(160,5,'Amniotic Fluid - '.$specimen_array[6],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(160,5,'Total - '.$specimen_array[7].' cm',0,1,'L',true);
		$pdf->Cell(160,5,'II.	FETAL BIOMETRY',0,1,'L',true);
		$pdf->Ln(3);
		$pdf->SetX(20);
		$pdf->Cell(30,5,'BPD - '.$specimen_array[11].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[12].' w',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[13].' d',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->Cell(30,5,'FL - '.$specimen_array[14].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[15].' w',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[16].' d',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->Cell(30,5,'HC - '.$specimen_array[17].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[18].' w',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[19].' d',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->Cell(30,5,'AC - '.$specimen_array[20].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[21].' w',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[22].' d',0,1,'L',true);
		$pdf->Ln();
		$pdf->SetX(20);
		$pdf->Cell(50,5,'Average Ultrasound Age - ',0,0,'L',true);
		$pdf->Cell(15,5,$specimen_array[23].' w',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[24].' d',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Estimated Fetal Weight - '.$specimen_array[25].' grams',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->SetFont('Times','B',11);
		$deldate = date("M d, Y", strtotime($specimen_array[26]));
		$pdf->Cell(80,5,'Estimated Date of Delivery - '.$deldate,0,1,'L',true);
		$pdf->Ln();
		$pdf->SetFont('Times','',11);
		$pdf->Cell(160,5,'II.	FETAL BIOMETRY',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Fetal Breathing - '.$specimen_array[27],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Fetal Tone - '.$specimen_array[28],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Fetal Movement - '.$specimen_array[29],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Amniotic Fluid - '.$specimen_array[30],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Total - '.$specimen_array[31],0,1,'L',true);
		$pdf->Ln();
        $pdf->SetFont('Times','B',11);
		$pdf->MultiCell(180,5,$note,0,'L',true);
		$pdf->Ln(5);
		$pdf->SetFont('Times','B',11);

		$pdf->Multicell(120,5,"Impression:",0,'L',true);
		$pdf->Ln();

		$pdf->Multicell(180,5,$results[$rows[labid]],0,'L',true);
		//$ni = "Impression : \n".$results[$rows[labid]];
		$pdf->Ln();
		//$y = $pdf->GetY();
		$pdf->SetFont('Arial','',11);
		$pdf->SetXY(160,$yy,192,$yy);
		$pdf->Cell(50,6, "Case ID: ".$specimen_array[0],0,0,L,true);
		$pdf->Line(178,$yy+5,192,$yy+5);
		$pdf->SetY($y);
			}
		}
	elseif (strtoupper($tot) == "FETAL AGING (TWINS)"){
		if($results[$rows[labid]] != "")
				   {
					   if($rows[subtype] != "NA" && $rows[subtype] != "N/A" && $rows[subtype] != "na") {
						   $subtype = " - ".$rows[subtype];
					   }
		$specimen_array=explode(";", $specimen_data);
		$pdf->Cell(100,7,"Examination Requested : $rows[typeoftest] $subtype",'0',0,'L',true);
		$y = $pdf->GetY() + 6;
    	$pdf->Line(53,$y,190,$y);
		$pdf->Ln();
		$pdf->Cell(45,5,'','0',0,'L',false);
		$pdf->Cell(80,5,$specimen_array[1],'0',0,'L',false);
		$pdf->Ln();
		$pdf->SetXY(10,85);
		$pdf->SetFont('Times','B',11);
        $pdf->Cell(160,5, "Result: ",0,1,'L',true);
		$pdf->SetFont('Times','BU',11);
		$pdf->Cell(160,5, $specimen_array[2],0,1,'L',true);
		$pdf->SetFont('Times','',11);
		$pdf->Cell(90,5,'I. FETAL SURVEILLANCE'.'- Fetus A',0,0,'L',true);
		$pdf->Cell(80,5,'II. FETAL SURVEILLANCE'.'- Fetus B',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(90,5,'Presentation - '.$specimen_array[3],0,0,'L',true);
		$pdf->Cell(80,5,'Presentation - '.$specimen_array[6],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(90,5,'Fetal Heart Rate - '.$specimen_array[4].' bpm',0,0,'L',true);
		$pdf->Cell(90,5,'Fetal Heart Rate - '.$specimen_array[7].' bpm',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(90,5,'Gender - '.$specimen_array[5],0,0,'L',true);
		$pdf->Cell(80,5,'Gender - '.$specimen_array[8],0,1,'L',true);
		$pdf->Ln(5);

		$pdf->Cell(90,5,'II.	FETAL BIOMETRY',0,0,'L',true);
		$pdf->Cell(80,5,'II.	FETAL BIOMETRY',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(40,5,'BPD - '.$specimen_array[9].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[10].' w',0,0,'L',true);
		$pdf->Cell(25,5,'- '.$specimen_array[11].' d',0,0,'L',true);
		$pdf->Cell(40,5,'BPD - '.$specimen_array[21].' cm',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[22].' w',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[23].' d',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->Cell(40,5,'FL - '.$specimen_array[12].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[13].' w',0,0,'L',true);
		$pdf->Cell(25,5,'- '.$specimen_array[14].' d',0,0,'L',true);
		$pdf->Cell(40,5,'FL - '.$specimen_array[24].' cm',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[25].' w',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[26].' d',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->Cell(40,5,'HC - '.$specimen_array[15].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[16].' w',0,0,'L',true);
		$pdf->Cell(25,5,'- '.$specimen_array[17].' d',0,0,'L',true);
		$pdf->Cell(40,5,'HC - '.$specimen_array[27].' cm',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[28].' w',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[29].' d',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->Cell(40,5,'AC - '.$specimen_array[18].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[19].' w',0,0,'L',true);
		$pdf->Cell(25,5,'- '.$specimen_array[20].' d',0,0,'L',true);
		$pdf->Cell(40,5,'AC - '.$specimen_array[30].' cm',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[31].' w',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[32].' d',0,1,'L',true);
		$pdf->Ln(5);
		$pdf->SetX(20);
		$pdf->Cell(45,5,'Average Ultrasound Age - ',0,0,'L',true);
		$pdf->Cell(15,5,$specimen_array[33].' w',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[34].' d',0,0,'L',true);
		$pdf->Cell(45,5,'Average Ultrasound Age - ',0,0,'L',true);
		$pdf->Cell(20,5,$specimen_array[37].' w',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[38].' d',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Estimated Fetal Weight -   '.$specimen_array[35].' grams',0,0,'L',true);
		$pdf->Cell(80,5,'Estimated Fetal Weight -   '.$specimen_array[39].' grams',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->SetFont('Times','B',11);
		$deldate = date("M d, Y", strtotime($specimen_array[36]));
		$pdf->Cell(80,5,'Estimated Date of Delivery - '.$deldate,0,0,'L',true);
		$deldate2 = date("M d, Y", strtotime($specimen_array[40]));
		$pdf->Cell(80,5,'Estimated Date of Delivery - '.$deldate2,0,1,'L',true);
		$pdf->Ln(5);
		$pdf->SetX(20);
		$pdf->Cell(60,5,'Placental Grade - '.$specimen_array[41],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(50,5,'Placental Position - '.$specimen_array[42],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Amniotic Fluid - '.$specimen_array[43],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Amniotic Fluid Index- '.$specimen_array[44],0,1,'L',true);
		$pdf->Ln(5);
        $pdf->SetFont('Times','B',11);
		$pdf->MultiCell(180,5,$note,0,'L',true);
		$pdf->Ln(5);
		$pdf->SetFont('Times','B',11);

		$pdf->Multicell(120,5,"Impression:",0,'L',true);
		$pdf->Ln();

		$pdf->Multicell(180,5,$results[$rows[labid]],0,'L',true);
		//$ni = "Impression : \n".$results[$rows[labid]];
		$pdf->Ln();
		//$y = $pdf->GetY();
		$pdf->SetFont('Arial','',11);
		$pdf->SetXY(160,$yy,192,$yy);
		$pdf->Cell(50,6, "Case ID: ".$specimen_array[0],0,0,L,true);
		$pdf->Line(178,$yy+5,192,$yy+5);
		$pdf->SetY($y);
			}
}	elseif (strtoupper($tot) == "FETAL AGING WITH BIOPHYSICAL PROFILE (BPP) (TWINS)"){
		if($results[$rows[labid]] != "")
				   {
					   if($rows[subtype] != "NA" && $rows[subtype] != "N/A" && $rows[subtype] != "na") {
						   $subtype = " - ".$rows[subtype];
					   }
		$specimen_array=explode(";", $specimen_data);
		$pdf->Cell(100,7,"Examination Requested : $rows[typeoftest] $subtype",'0',0,'L',true);
		$y = $pdf->GetY() + 6;
    	$pdf->Line(53,$y,190,$y);
		$pdf->Ln();
		$pdf->Cell(45,5,'','0',0,'L',false);
		$pdf->Cell(80,5,'1'.$specimen_array[1],'0',0,'L',false);
		$pdf->Ln();
		$pdf->SetXY(10,85);
		$pdf->SetFont('Times','B',11);
        $pdf->Cell(160,5, "Result: ",0,1,'L',true);
		$pdf->SetFont('Times','BU',11);
		$pdf->Cell(160,5, $specimen_array[2],0,1,'L',true);
		$pdf->SetFont('Times','',11);
		$pdf->Cell(90,5,'I. FETAL SURVEILLANCE'.'- Fetus A',0,0,'L',true);
		$pdf->Cell(80,5,'II. FETAL SURVEILLANCE'.'- Fetus B',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(90,5,'Presentation - '.$specimen_array[3],0,0,'L',true);
		$pdf->Cell(80,5,'Presentation - '.$specimen_array[6],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(90,5,'Fetal Heart Rate - '.$specimen_array[4].' bpm',0,0,'L',true);
		$pdf->Cell(90,5,'Fetal Heart Rate - '.$specimen_array[7].' bpm',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(90,5,'Gender - '.$specimen_array[5],0,0,'L',true);
		$pdf->Cell(80,5,'Gender - '.$specimen_array[8],0,1,'L',true);
		$pdf->Ln(3);

		$pdf->Cell(90,5,'II.	FETAL BIOMETRY',0,0,'L',true);
		$pdf->Cell(80,5,'II.	FETAL BIOMETRY',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(40,5,'BPD - '.$specimen_array[9].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[10].' w',0,0,'L',true);
		$pdf->Cell(25,5,'- '.$specimen_array[11].' d',0,0,'L',true);
		$pdf->Cell(40,5,'BPD - '.$specimen_array[21].' cm',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[22].' w',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[23].' d',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->Cell(40,5,'FL - '.$specimen_array[12].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[13].' w',0,0,'L',true);
		$pdf->Cell(25,5,'- '.$specimen_array[14].' d',0,0,'L',true);
		$pdf->Cell(40,5,'FL - '.$specimen_array[24].' cm',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[25].' w',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[26].' d',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->Cell(40,5,'HC - '.$specimen_array[15].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[16].' w',0,0,'L',true);
		$pdf->Cell(25,5,'- '.$specimen_array[17].' d',0,0,'L',true);
		$pdf->Cell(40,5,'HC - '.$specimen_array[27].' cm',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[28].' w',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[29].' d',0,1,'L',true);

		$pdf->SetX(20);
		$pdf->Cell(40,5,'AC - '.$specimen_array[18].' cm',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[19].' w',0,0,'L',true);
		$pdf->Cell(25,5,'- '.$specimen_array[20].' d',0,0,'L',true);
		$pdf->Cell(40,5,'AC - '.$specimen_array[30].' cm',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[31].' w',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[32].' d',0,1,'L',true);
		$pdf->Ln(3);
		$pdf->SetX(20);
		$pdf->Cell(45,5,'Average Ultrasound Age - ',0,0,'L',true);
		$pdf->Cell(15,5,$specimen_array[33].' w',0,0,'L',true);
		$pdf->Cell(20,5,'- '.$specimen_array[34].' d',0,0,'L',true);
		$pdf->Cell(45,5,'Average Ultrasound Age - ',0,0,'L',true);
		$pdf->Cell(20,5,$specimen_array[37].' w',0,0,'L',true);
		$pdf->Cell(15,5,'- '.$specimen_array[38].' d',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Estimated Fetal Weight -   '.$specimen_array[35].' grams',0,0,'L',true);
		$pdf->Cell(80,5,'Estimated Fetal Weight -   '.$specimen_array[39].' grams',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->SetFont('Times','B',11);
		$deldate = date("M d, Y", strtotime($specimen_array[36]));
		$pdf->Cell(80,5,'Estimated Date of Delivery - '.$deldate,0,0,'L',true);
		$deldate2 = date("M d, Y", strtotime($specimen_array[40]));
		$pdf->Cell(80,5,'Estimated Date of Delivery - '.$deldate2,0,1,'L',true);
		$pdf->Ln(3);
		$pdf->SetFont('Times','',11);
		$pdf->Cell(90,5,'III.	BIOPHYISCAL PROFILE',0,0,'L',true);
		$pdf->Cell(80,5,'III.	BIOPHYISCAL PROFILE',0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Fetal Breathing -   '.$specimen_array[41],0,0,'L',true);
		$pdf->Cell(80,5,'Fetal Breathing-   '.$specimen_array[46],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Fetal Tone -   '.$specimen_array[42],0,0,'L',true);
		$pdf->Cell(80,5,'Fetal Tone -   '.$specimen_array[47],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Fetal Movement -   '.$specimen_array[43],0,0,'L',true);
		$pdf->Cell(80,5,'Fetal Movement -   '.$specimen_array[48],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Amniotic Fluid -   '.$specimen_array[44],0,0,'L',true);
		$pdf->Cell(80,5,'Amniotic Fluid -   '.$specimen_array[49],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'     '.'Total -   '.$specimen_array[45],0,0,'L',true);
		$pdf->Cell(80,5,'     '.'Total -   '.$specimen_array[50],0,1,'L',true);
		$pdf->Ln(3);
		$pdf->SetX(20);
		$pdf->Cell(60,5,'Placental Grade - '.$specimen_array[51],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(50,5,'Placental Position - '.$specimen_array[52],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Amniotic Fluid - '.$specimen_array[53],0,1,'L',true);
		$pdf->SetX(20);
		$pdf->Cell(80,5,'Amniotic Fluid Index- '.$specimen_array[54],0,1,'L',true);
		$pdf->Ln(5);
        $pdf->SetFont('Times','B',11);
		$pdf->MultiCell(180,5,$note,0,'L',true);
		$pdf->Ln(5);
		$pdf->SetFont('Times','B',11);

		$pdf->Multicell(120,5,"Impression:",0,'L',true);
		$pdf->Multicell(180,5,$results[$rows[labid]],0,'L',true);
		//$ni = "Impression : \n".$results[$rows[labid]];
		$pdf->Ln(3);
		//$y = $pdf->GetY();
		$pdf->SetFont('Arial','',11);
		$pdf->SetXY(160,$yy,192,$yy);
		$pdf->Cell(50,6, "Case ID: ".$specimen_array[0],0,0,L,true);
		$pdf->Line(178,$yy+5,192,$yy+5);
		$pdf->SetY($y);
			}
}
else{
				 $specimen_array=explode(";", $specimen_data,3);
				 // echo $rows[id] .">" .$results[$rows[id]];
				   if($results[$rows[labid]] != "")
				   {
					   if($rows[subtype] != "NA" && $rows[subtype] != "N/A" && $rows[subtype] != "na") {
						   $subtype = " - ".$rows[subtype];
					   }
					$pdf->Cell(100,7,"Examination Requested : ".$specimen_array[0],'0',0,'L',true);
					$pdf->Cell(80,7,$specimen_array[2],'0',0,'L',true);
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
				 $pdf->Cell(50,6, "Case ID: ".$specimen_array[1],0,0,L,true);
				 $pdf->Line(178,$yy+5,192,$yy+5);
				 $pdf->SetY($y);
			       }
			  }
}
               $pdf->Ln(20);


?>
