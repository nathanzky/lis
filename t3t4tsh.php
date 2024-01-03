<?php
$specimen = explode(';',$specimen_data);
$pdf->Cell(120,7,"Serum:    ".$specimen[3],'0',0,'L',true);
$y = $pdf->GetY() + 6;
$pdf->Line(25,$y,100,$y);
$pdf->Ln();
if(!empty($specimen[0]) && $specimen[0]!="NA" && $specimen[0]!="0" && $specimen[0]!="na" && $specimen[0]!="-"){
	$t3="T3, ";
}
if(!empty($specimen[1]) && $specimen[1]!="NA" && $specimen[1]!="0" && $specimen[1]!="na" && $specimen[1]!="-"){
	$t4="T4, ";
}
if(!empty($specimen[2]) && $specimen[2]!="NA" && $specimen[2]!="0" && $specimen[2]!="na" && $specimen[2]!="-"){
	$tsh="TSH ";
}
$pdf->Cell(120,7,"Examination Desired : ".$t3.$t4.$tsh,'0',0,'L',true);
$y = $pdf->GetY() + 6;
$pdf->Line(50,$y,120,$y);
$pdf->Ln(8);
$pdf->SetX(50);
$pdf->SetFont('Times','B',12);
$pdf->Cell(40,7,"RESULT",'0',0,'C',true);
$pdf->Cell(30,7,"UNITS",'0',0,'C',true);
$pdf->SetFont('Times','BI',12);
$pdf->Cell(40,7,"Reference Range",'0',0,'C',true);
$pdf->Ln(8);
if(!empty($specimen[0]) && $specimen[0]!="NA" && $specimen[0]!="0" && $specimen[0]!="na" && $specimen[0]!="-"){
$pdf->SetX(10);
$pdf->SetFont('Times','B',12);
$pdf->Cell(40,7,"T3:",'0',0,'R',true);
$pdf->Cell(40,7,$specimen[0],'0',0,'C',true);
$pdf->Cell(30,7," nmol/L",'0',0,'C',true);
$y = $pdf->GetY() + 6;
$pdf->Line(60,$y,80,$y);
$pdf->SetFont('Times','',12);
$pdf->Cell(40,7,"0.92 - 2.33",'0',0,'C',true);
$pdf->Ln(7);
}
if(!empty($specimen[1]) && $specimen[1]!="NA" && $specimen[1]!="0" && $specimen[1]!="na" && $specimen[1]!="-"){
$pdf->SetX(10);
$pdf->SetFont('Times','B',12);
$pdf->Cell(40,7,"T4:",'0',0,'R',true);
$pdf->Cell(40,7,$specimen[1],'0',0,'C',true);
$pdf->Cell(30,7," nmol/L",'0',0,'C',true);
$y = $pdf->GetY() + 6;
$pdf->Line(60,$y,80,$y);
$pdf->SetFont('Times','',12);
$pdf->Cell(40,7,"60 - 120",'0',0,'C',true);
$pdf->Ln(7);
}
if(!empty($specimen[2]) && $specimen[2]!="NA" && $specimen[2]!="0" && $specimen[2]!="na" && $specimen[2]!="-"){
$pdf->SetX(10);
$pdf->SetFont('Times','B',12);
$pdf->Cell(40,7,"TSH:",'0',0,'R',true);
$pdf->Cell(40,7,$specimen[2],'0',0,'C',true);
$pdf->Cell(30,7," ulU/ml",'0',0,'C',true);
$y = $pdf->GetY() + 6;
$pdf->Line(60,$y,80,$y);
$pdf->SetFont('Times','',12);
$pdf->Cell(40,7,"0.5 - 5.0",'0',0,'C',true);
}
$pdf->Ln(10);
?>
