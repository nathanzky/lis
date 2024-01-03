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
    
    if ($rows[subtype]=="Oral Glucose Tolerance Test (100g)")
    {
    $pdf->SetFont('Times','',12); 
	$pdf->Cell(50,5,'Specimen: ','0','0','L',true);
	$pdf->Cell(80,5,$specimen_array[4],'B','1','L',true);
	$pdf->SetFont('Times','',12); 
	$pdf->Cell(50,6,'Examination Desired: ','0',0,'L',true);
    $pdf->SetFont('Times','B',10); 
	$pdf->Cell(80,6,"Oral Glucose Tolerance Test (100 g)",B,0,'L',true); 
    $pdf->SetX(30);	
    $pdf->SetFont('Times','',11); 

    $pdf->Ln(6);
    $pdf->SetFont('Times','',12); 
    $pdf->Cell(55,5,"RESULT:",'0',1,'L',false);
	$pdf->Ln(3);
    $pdf->SetFont('Times','',11); 
    $pdf->SetX(30);	
    $pdf->Cell(55,12,"",1,0,'C',true);
    $pdf->SetFont('Times','B',10); 	
    $pdf->Cell(30,12,"Patient Result",1,0,'C',true);
    $pdf->Cell(20,12,"Units",1,0,'C',true);
    $pdf->SetFont('Times','I',10); 	
	$pdf->Multicell(40,4,"Target Value \nBased on Oral Glucose \nTolerance Drink",1,'C',true);

    $pdf->SetX(30);	
    $pdf->Cell(55,6,"Fasting (Prior to Glucose Load)",1,0,'L',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(30,6,$specimen_array[0],1,0,'C',true);
    $pdf->Cell(20,6,"mmol/L",1,0,'C',true);
    $pdf->Cell(40,6,"5.3",1,1,'C',true);

    $pdf->SetX(30);	
    $pdf->SetFont('Times','',11); 
    $pdf->Cell(55,6,"1 hr after glucose load",1,0,'L',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(30,6,$specimen_array[1],1,0,'C',true);
    $pdf->Cell(20,6,"mmol/L",1,0,'C',true);
    $pdf->Cell(40,6,"10.0",1,1,'C',true);

    $pdf->SetX(30);	
    $pdf->SetFont('Times','',11); 
    $pdf->Cell(55,6,"2 hrs after glucose load",1,0,'L',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(30,6,$specimen_array[2],1,0,'C',true);
    $pdf->Cell(20,6,"mmol/L",1,0,'C',true);
    $pdf->Cell(40,6,"8.6",1,1,'C',true);

    $pdf->SetX(30);	
    $pdf->SetFont('Times','',11); 
    $pdf->Cell(55,6,"3 hrs after glucose load",1,0,'L',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(30,6,$specimen_array[3],1,0,'C',true);
    $pdf->Cell(20,6,"mmol/L",1,0,'C',true);
    $pdf->Cell(40,6,"7.8",1,1,'C',true);
    
    }
    elseif($rows[subtype]=="Oral Glucose Tolerance Test (75g)"){
    $pdf->SetFont('Times','',12); 
	$pdf->Cell(50,5,'Specimen: ','0','0','L',true);
	$pdf->Cell(80,5,$specimen_array[3],'B','1','L',true);
	$pdf->SetFont('Times','',12); 
	$pdf->Cell(50,6,'Examination Desired: ','0',0,'L',true);
    $pdf->SetFont('Times','B',10); 
	$pdf->Cell(80,6,"Oral Glucose Tolerance Test (75 g)",'B',0,'L',true);     
    
    $pdf->SetFont('Times','',12); 
    $pdf->Ln(10);
    $pdf->Cell(55,5,"RESULT:",'0',1,'L',false);
	$pdf->Ln(3);
    $pdf->SetFont('Times','',11); 
    $pdf->SetX(30);	
    $pdf->Cell(55,12,"",1,0,'C',true);
    $pdf->SetFont('Times','B',10); 	
    $pdf->Cell(30,12,"Patient Result",1,0,'C',true);
    $pdf->Cell(20,12,"Units",1,0,'C',true);
    $pdf->SetFont('Times','I',10); 	
	$pdf->Multicell(40,4,"Target Value \nBased on Oral Glucose \nTolerance Drink",1,'C',true);
     $pdf->SetX(30);	
    $pdf->SetFont('Times','',11); 
    $pdf->Cell(55,6,"Fasting (Prior to Glucose Load)",1,0,'L',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(30,6,$specimen_array[0],1,0,'C',true);
    $pdf->Cell(20,6,"mmol/L",1,0,'C',true);
    $pdf->Cell(40,6,"5.1",1,1,'C',true);

    $pdf->SetX(30);	
    $pdf->SetFont('Times','',11); 
    $pdf->Cell(55,6,"1 hour after glucose load",1,0,'L',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(30,6,$specimen_array[1],1,0,'C',true);
    $pdf->Cell(20,6,"mmol/L",1,0,'C',true);
    $pdf->Cell(40,6,"10.0",1,1,'C',true);

    $pdf->SetX(30);	
    $pdf->SetFont('Times','',11); 
    $pdf->Cell(55,6,"2 hours after glucose load",1,0,'L',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(30,6,$specimen_array[2],1,0,'C',true);
     $pdf->Cell(20,6,"mmol/L",1,0,'C',true);
    $pdf->Cell(40,6,"8.5",1,1,'C',true);

    }
    else{
    $pdf->SetFont('Times','',12); 
	$pdf->Cell(50,5,'Specimen: ','0','0','L',true);
	$pdf->Cell(80,5,$specimen_array[1],'B','1','L',true);
	$pdf->SetFont('Times','',12); 
	$pdf->Cell(50,6,'Examination Desired: ','0',0,'L',true);
    $pdf->SetFont('Times','B',10); 
	$pdf->Cell(80,6,"Oral Glucose Challenge Test (50 g)",'B',0,'L',true);    

    	$pdf->Ln(10);

    $pdf->SetFont('Times','',11); 
    $pdf->SetX(30);	
    $pdf->Cell(55,12,"",1,0,'C',true);
    $pdf->SetFont('Times','B',10); 	
    $pdf->Cell(30,12,"Patient Result",1,0,'C',true);
    $pdf->Cell(20,12,"Units",1,0,'C',true);
    $pdf->SetFont('Times','I',10); 	
	$pdf->Multicell(40,4,"Target Value \nBased on Oral Glucose \nTolerance Drink",1,'C',true); 
    $pdf->SetX(30);	
    $pdf->SetFont('Times','',11); 
    $pdf->Cell(55,6,"Fasting (Prior to Glucose Load)",1,0,'L',true);
    $pdf->SetFont('Times','B',11); 	
	$pdf->Cell(30,6,$specimen_array[0],1,0,'C',true);
    $pdf->Cell(20,6,"mmol/L",1,0,'C',true);
    $pdf->Cell(40,6,"7.15-7.17",1,1,'C',true);
    }
    }
?>