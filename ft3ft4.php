<?php
$specimen = explode(';',$specimen_data);
$pdf->Cell(120,7,"Serum:    ".$specimen[3],'0',0,'L',false);
$y = $pdf->GetY() + 6;
$pdf->Line(25,$y,100,$y);
$pdf->Ln();
if(empty($specimen[0]) && $specimen[0]!="NA" && $specimen[0]!="0" && $specimen[0]!="na" && $specimen[0]!="-"){
	$ft3="FT4 ";
}

elseif(empty($specimen[1]) && $specimen[1]!="NA" && $specimen[1]!="0" && $specimen[1]!="na" && $specimen[1]!="-"){
	$ft4="FT3 ";
}
else{
	$ft3.$ft4="FT3 & FT4";
}
$pdf->Cell(120,7,"Examination Desired : ".$ft3  .$ft4,'0',0,'L',false);
$y = $pdf->GetY() + 6;
$pdf->Line(50,$y,120,$y);
$pdf->Ln();
$pdf->SetX(30);
$pdf->Cell(120,7,"RESULT",'0',0,'L',false);
$pdf->Ln(10);
$pdf->SetX(30);
$pdf->SetFont('Times','B',12);
$pdf->Cell(40,7,"TEST",'1',0,'C',false);
$pdf->Cell(40,7,"Results",'1',0,'C',false);
$pdf->Cell(30,7,"Units",'1',0,'C',false);
$pdf->SetFont('Times','BI',12);
$pdf->Cell(40,7,"Reference Range",'1',0,'C',false);
$pdf->Ln(7);
if(!empty($specimen[0]) && $specimen[0]!="NA" && $specimen[0]!="0" && $specimen[0]!="na" && $specimen[0]!="-"){
$pdf->SetX(30);
$pdf->SetFont('Times','B',12);
$pdf->Cell(40,7,"FT3",'1',0,'C',false);
$pdf->Cell(40,7,$specimen[0],'1',0,'C',false);
$pdf->SetFont('Times','',12);
$pdf->Cell(30,7," pmol/l",'1',0,'C',false);
$y = $pdf->GetY() + 6;
$pdf->Cell(40,7,"3.5 - 6.5",'1',0,'C',false);
$pdf->Ln(7);
}
if(!empty($specimen[1]) && $specimen[1]!="NA" && $specimen[1]!="0" && $specimen[1]!="na" && $specimen[1]!="-"){
$pdf->SetX(30);
$pdf->SetFont('Times','B',12);
$pdf->Cell(40,7,"FT4",'1',0,'C',false);
$pdf->Cell(40,7,$specimen[1],'1',0,'C',false);
$pdf->SetFont('Times','',12);
$pdf->Cell(30,7," pmol/l",'1',0,'C',false);
$pdf->Cell(40,7,"9 - 25",'1',0,'C',false);
$pdf->Ln(7);
}
if(!empty($specimen[2]) && $specimen[2]!="NA" && $specimen[2]!="0" && $specimen[2]!="na" && $specimen[2]!="-"){
$pdf->SetX(30);
$pdf->SetFont('Times','B',12);
$pdf->Cell(40,7,"TSH",'1',0,'C',false);
$pdf->Cell(40,7,$specimen[2],'1',0,'C',false);
$pdf->SetFont('Times','',12);
$pdf->Cell(30,7," uIU/ml",'1',0,'C',false);
$pdf->Cell(40,7,"0.25 - 5.0",'1',0,'C',false);
$pdf->Ln(7);
}
$pdf->Ln(10);
?>
