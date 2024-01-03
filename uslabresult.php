<?php
$sql = "SELECT DISTINCT test.testid as testid,test.dateordered,test.note, test.medtech,test.pathologist, test.result,test.datereceived, test.daterelease, test.requestingphysician, test.labtestid, test.specimen, labtest.* from test,labtest where test.labtestid = labtest.labid and test.testid='$si'";
$rec = $links->query($sql) or die($links->error);

if(strtoupper($tot) != "FETAL AGING" && strtoupper($tot) != "FETAL AGING (TWINS)" && strtoupper($tot) != "FETAL AGING WITH BIOPHYSICAL PROFILE (BPP)" && strtoupper($tot) != "FETAL AGING WITH BIOPHYSICAL PROFILE (BPP) (TWINS)"){
while($datas=$rec->fetch_assoc()){
$specimen_array=explode(";", $datas[specimen]);
	$ltest .=  "<tr><td>Examination Request: <input type='text' name='result[]' placeholder='optional' value='$specimen_array[0]' ></input></td>
				<td>Case Number: <input type='text' name='result[]' placeholder='optional' value='$specimen_array[1]' ></input></td>
				</tr>
				<tr><td colspan='2'>Evaluation <input type='text' size='100' name='result[]' placeholder='optional' value='$specimen_array[2]' ></input>
                </td> </tr>
				<tr><td colspan='2'><textarea id='result' name='note' rows='5' cols='80' placeholder='Result' >$datas[note]</textarea>
                </td> </tr>
				<tr>

		<td colspan='2'><textarea rows='5' id='impression' cols='100' name='testresult[]' placeholder='Impression' required>$datas[result]</textarea>
		<input type='hidden' name='testid[]' value='$datas[testid]'>
		<input type='hidden' name='labtestid[]' value='$datas[labid]'>
		</td>
		</tr>";

		$typeoftest = $datas[subtype];
		$normalmin = $datas[normalmin];
		$normalmax = $datas[normalmax];
		$flag= $datas[flag];
		$rp = $datas[requestingphysician];
		$do = $datas[dateordered];
		$dr = $datas[datereceived];
		$drel = $datas[daterelease];
		$medtech = $datas[medtech];
		$pathologist = $datas[pathologist];
		//$specimen_array=explode(";", $datas[specimen]);
		$specimen = $datas[specimen];
		$note=$datas[note];
        }
        ?>

        <p>
        Select Template:
        <select name='mySelect' id='mySelect' onchange='myFunction();'>
        <option>Blank</option>
        <?php
        $sql = "SELECT * FROM resulttemps WHERE temptype='Ultrasound'";
        $rec = $links->query($sql);
        while($datas=$rec->fetch_assoc()){
            ?>
            <option value='<?=$datas[tempresult]?> ' data-name='<?=$datas[tempimpression]?>'><?=$datas[tempname]?></option>
        <?php
        }
        ?>
        </select>
        </p>
<?php } elseif(strtoupper($tot) == "FETAL AGING") {
    while($datas=$rec->fetch_assoc()){
    $specimen_array=explode(";", $datas[specimen]);
   $ltest .=  "<tr><td>$datas[test]-$datas[typeoftest]-$datas[subtype] </td>
				<td>Case Number: <input type='text' name='result[]' placeholder='' value='$specimen_array[0]' ></input></td>
				</tr>
				<tr><td colspan='2'>Evaluation <input type='text' size='100' name='result[]' placeholder='optional' value='$specimen_array[1]' ></input>
                </td> </tr>
				<tr><td colspan='2'>Trimester: <input type='text' name='result[]' placeholder='' value='$specimen_array[2]' size='50'></input></br></td>
                <tr><td colspan='2'>I.	FETAL SURVEILLANCE</td></tr><tr><td>
<span class='label'>Presentation </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[3]' ></input> </br>
<span class='label'>No. of Fetus </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[4]' ></input> </br>
<span class='label'>Fetal Heart Rate</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[5]' ></input> bpm </br>
<span class='label'>Amniotic Fluid </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[6]' ></input></br>
<span class='label'>Total</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[7]' ></input>
</td><td>
<span class='label'>Gender</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[8]' ></input></br>
<span class='label' >Placental Grade </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[9]' ></input> </br>
<span class='label' >Placental Position</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[10]' ></input></br>
</td></tr>
<tr>
<td colspan='2'>
II.	FETAL BIOMETRY</br></td><tr><td colspan='2'>
BPD 	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[11]' ></input> cm 	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[12]' ></input>	w  <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[13]' ></input>	d </br>
FL	 - <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[14]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[15]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[16]' ></input> d </br>
HC	 -	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[17]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[18]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[19]' ></input> d </br>
AC	 -	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[20]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[21]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[22]' ></input> d </br>
</br>
</td></tr>
<td colspan='2'>
Average Ultrasound Age	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[23]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[24]' ></input> d </br>
Estimated Fetal Weight	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[25]' ></input>	grams</br>
Estimated Date of Delivery - <input type='date' name='result[]' placeholder='' value='$specimen_array[26]' ></input></br></br>
                    <p>
                    Additional Information:</br>
                    <textarea name='note' rows='5' cols='80' placeholder='Result'>$datas[note]</textarea></p>
                </td> </tr>
				<tr>
		<td colspan='2'>Impression:</br><textarea rows='5' id='impression' cols='100' name='testresult[]' placeholder='Impression' required>$datas[result]</textarea>
		<input type='hidden' name='testid[]' value='$datas[testid]'>
		<input type='hidden' name='labtestid[]' value='$datas[labid]'>
		</td>
		</tr>";


        $typeoftest = $datas[subtype];
		$normalmin = $datas[normalmin];
		$normalmax = $datas[normalmax];
		$flag= $datas[flag];
		$rp = $datas[requestingphysician];
		$do = $datas[dateordered];
		$dr = $datas[datereceived];
		$drel = $datas[daterelease];
		$medtech = $datas[medtech];
		$pathologist = $datas[pathologist];
		//$specimen_array=explode(";", $datas[specimen]);
		$specimen = $datas[specimen];
		$note=$datas[note];
        } //end of while
        }//end of FETAL AGING
    elseif(strtoupper($tot) == "FETAL AGING WITH BIOPHYSICAL PROFILE (BPP)") {
    while($datas=$rec->fetch_assoc()){
    $specimen_array=explode(";", $datas[specimen]);
   $ltest .=  "<tr><td>$datas[test]-$datas[typeoftest]-$datas[subtype] </td>
				<td>Case Number: <input type='text' name='result[]' placeholder='' value='$specimen_array[0]' ></input></td>
				</tr>
				<tr><td colspan='2'>Evaluation <input type='text' size='100' name='result[]' placeholder='optional' value='$specimen_array[1]' ></input>
                </td> </tr>
				<tr><td colspan='2'>Trimester: <input type='text' name='result[]' placeholder='' value='$specimen_array[2]' size='50'></input></br></td>
                <tr><td colspan='2'>I.	FETAL SURVEILLANCE</td></tr><tr><td>
<span class='label'>Presentation </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[3]' ></input> </br>
<span class='label'>No. of Fetus </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[4]' ></input> </br>
<span class='label'>Fetal Heart Rate</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[5]' ></input> bpm </br>
<span class='label'>Amniotic Fluid </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[6]' ></input></br>
<span class='label'>Total</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[7]' ></input>
</td><td>
<span class='label'>Gender</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[8]' ></input></br>
<span class='label' >Placental Grade </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[9]' ></input> </br>
<span class='label' >Placental Position</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[10]' ></input></br>
</td></tr>
<tr>
<td colspan='2'>
II.	FETAL BIOMETRY</br></td><tr><td colspan='2'>
BPD 	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[11]' ></input> cm 	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[12]' ></input>	w  <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[13]' ></input>	d </br>
FL	 - <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[14]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[15]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[16]' ></input> d </br>
HC	 -	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[17]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[18]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[19]' ></input> d </br>
AC	 -	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[20]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[21]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[22]' ></input> d </br>
</br>
</td></tr>
<td colspan='2'>
Average Ultrasound Age	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[23]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[24]' ></input> d </br>
Estimated Fetal Weight	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[25]' ></input>	grams</br>
Estimated Date of Delivery - <input type='date' name='result[]' placeholder='' value='$specimen_array[26]' ></input></br></br>
</td></tr><tr><td colspan='2'>III.	BIOPHYSICAL PROFILE</td></tr><tr><td colspan='2'>
	<span class='label'>Fetal breathing </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[27]' ></input></br>
	<span class='label'>Fetal tone		</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[28]' ></input></br>
	<span class='label'>Fetal movement	</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[29]' ></input></br>
	<span class='label'>Amniotic Fluid	</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[30]' ></input></br>
	<span class='label'>Total </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[31]' ></input>
    </td></tr><tr><td colspan='2'>
                    <p>
                    Additional Information:</br>
                    <textarea name='note' rows='5' cols='80' placeholder='Result'>$datas[note]</textarea></p>
                </td> </tr>
				<tr>
		<td colspan='2'>Impression:</br><textarea rows='5' id='impression' cols='100' name='testresult[]' placeholder='Impression' required>$datas[result]</textarea>
		<input type='hidden' name='testid[]' value='$datas[testid]'>
		<input type='hidden' name='labtestid[]' value='$datas[labid]'>
		</td>
		</tr>";
        $typeoftest = $datas[subtype];
		$normalmin = $datas[normalmin];
		$normalmax = $datas[normalmax];
		$flag= $datas[flag];
		$rp = $datas[requestingphysician];
		$do = $datas[dateordered];
		$dr = $datas[datereceived];
		$drel = $datas[daterelease];
		$medtech = $datas[medtech];
		$pathologist = $datas[pathologist];
		//$specimen_array=explode(";", $datas[specimen]);
		$specimen = $datas[specimen];
		$note=$datas[note];
        } //end of while
        }//end of FETAL AGING with BPP
        elseif(strtoupper($tot) == "FETAL AGING (TWINS)"){
    while($datas=$rec->fetch_assoc()){
    $specimen_array=explode(";", $datas[specimen]);
    $ltest .=  "<tr><td>$datas[test]-$datas[typeoftest]-$datas[subtype] </td>
				<td>Case Number: <input type='text' name='result[]' placeholder='' value='$specimen_array[0]' ></input></td>
				</tr>
				<tr><td colspan='2'>Evaluation <input type='text' size='100' name='result[]' placeholder='optional' value='$specimen_array[1]' ></input>
                </td> </tr>
				<tr><td colspan='2'>Trimester: <input type='text' name='result[]' placeholder='' value='$specimen_array[2]' size='50'></input></br></td>
                <tr><td colspan='1'>I.	FETAL SURVEILLANCE</td><td colspan='2'>I.	FETAL SURVEILLANCE</td></tr><tr><td>
<span class='label'>Presentation </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[3]' ></input> </br>
<span class='label'>Fetal Heart Rate</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[4]' ></input> bpm </br>
<span class='label'>Gender</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[5]' ></input></br>
</td><td>
<span class='label'>Presentation </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[6]' ></input> </br>
<span class='label'>Fetal Heart Rate</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[7]' ></input> bpm </br>
<span class='label'>Gender</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[8]' ></input></br>
</td></tr>
<tr>
<td colspan='1'>
II.	FETAL BIOMETRY</br></td><td colspan='1'> II. FETAL BIOMETRY</br></td><tr><td colspan='1'>
BPD 	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[9]' ></input> cm 	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[10]' ></input>	w  <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[11]' ></input>	d </br>
FL	 - <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[12]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[13]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[14]' ></input> d </br>
HC	 -	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[15]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[16]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[17]' ></input> d </br>
AC	 -	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[18]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[19]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[20]' ></input> d </br>
</td><td colspan='1'>
BPD 	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[21]' ></input> cm 	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[22]' ></input>	w  <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[23]' ></input>	d </br>
FL	 - <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[24]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[25]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[26]' ></input> d </br>
HC	 -	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[27]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[28]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[29]' ></input> d </br>
AC	 -	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[30]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[31]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[32]' ></input> d </br>
</td>
</tr>
<td colspan='1'>
Average Ultrasound Age	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[33]' ></input> w
<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[34]' ></input> d </br>
Estimated Fetal Weight	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[35]' ></input>	grams</br>
Estimated Date of Delivery - <input type='date' name='result[]' placeholder='' value='$specimen_array[36]' ></input></br></br>
                </td>
<td colspan='1'>
Average Ultrasound Age	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[37]' ></input> w
<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[38]' ></input> d </br>
Estimated Fetal Weight	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[39]' ></input>	grams</br>
Estimated Date of Delivery - <input type='date' name='result[]' placeholder='' value='$specimen_array[40]' ></input></br></br>
</td>
</tr>
<tr><td colspan='2'>
<span class='label' >Placental Grade </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[41]' ></input> </br>
<span class='label' >Placental Position</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[42]' ></input></br>
<span class='label'>Amniotic Fluid </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[43]' ></input></br>
<span class='label'>Amniotic Fluid Index</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[44]' ></input></br></br>
Additional Information:</br><textarea name='note' rows='5' cols='80' placeholder='Result'>$datas[note]</textarea></p>
                </td>
                </tr>
				<tr>
		<td colspan='2'>Impression:</br><textarea rows='5' id='impression' cols='100' name='testresult[]' placeholder='Impression' required>$datas[result]</textarea>
		<input type='hidden' name='testid[]' value='$datas[testid]'>
		<input type='hidden' name='labtestid[]' value='$datas[labid]'>
		</td>
		</tr>";


        $typeoftest = $datas[subtype];
		$normalmin = $datas[normalmin];
		$normalmax = $datas[normalmax];
		$flag= $datas[flag];
		$rp = $datas[requestingphysician];
		$do = $datas[dateordered];
		$dr = $datas[datereceived];
		$drel = $datas[daterelease];
		$medtech = $datas[medtech];
		$pathologist = $datas[pathologist];
		//$specimen_array=explode(";", $datas[specimen]);
		$specimen = $datas[specimen];
		$note=$datas[note];
        }//end of while
        }//end of FETAL AGING TWINS
        elseif(strtoupper($tot) == "FETAL AGING WITH BIOPHYSICAL PROFILE (BPP) (TWINS)"){
    while($datas=$rec->fetch_assoc()){
    $specimen_array=explode(";", $datas[specimen]);
    $ltest .=  "<tr><td>$datas[test]-$datas[typeoftest]-$datas[subtype] </td>
				<td>Case Number: <input type='text' name='result[]' placeholder='' value='$specimen_array[0]' ></input></td>
				</tr>
				<tr><td colspan='2'>Evaluation <input type='text' size='100' name='result[]' placeholder='optional' value='$specimen_array[1]' ></input>
                </td> </tr>
				<tr><td colspan='2'>Trimester: <input type='text' name='result[]' placeholder='' value='$specimen_array[2]' size='50'></input></br></td>
                <tr><td colspan='1'>I.	FETAL SURVEILLANCE</td><td colspan='2'>I.	FETAL SURVEILLANCE</td></tr><tr><td>
<span class='label'>Presentation </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[3]' ></input> </br>
<span class='label'>Fetal Heart Rate</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[4]' ></input> bpm </br>
<span class='label'>Gender</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[5]' ></input></br>
</td><td>
<span class='label'>Presentation </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[6]' ></input> </br>
<span class='label'>Fetal Heart Rate</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[7]' ></input> bpm </br>
<span class='label'>Gender</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[8]' ></input></br>
</td></tr>
<tr>
<td colspan='1'>
II.	FETAL BIOMETRY</br></td><td colspan='1'> II. FETAL BIOMETRY</br></td><tr><td colspan='1'>
BPD 	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[9]' ></input> cm 	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[10]' ></input>	w  <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[11]' ></input>	d </br>
FL	 - <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[12]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[13]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[14]' ></input> d </br>
HC	 -	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[15]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[16]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[17]' ></input> d </br>
AC	 -	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[18]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[19]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[20]' ></input> d </br>
</td><td colspan='1'>
BPD 	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[21]' ></input> cm 	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[22]' ></input>	w  <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[23]' ></input>	d </br>
FL	 - <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[24]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[25]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[26]' ></input> d </br>
HC	 -	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[27]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[28]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[29]' ></input> d </br>
AC	 -	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[30]' ></input> cm	-	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[31]' ></input> w	<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[32]' ></input> d </br>
</td>
</tr>
<td colspan='1'>
Average Ultrasound Age	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[33]' ></input> w
<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[34]' ></input> d </br>
Estimated Fetal Weight	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[35]' ></input>	grams</br>
Estimated Date of Delivery - <input type='date' name='result[]' placeholder='' value='$specimen_array[36]' ></input></br></br>
                </td>
<td colspan='1'>
Average Ultrasound Age	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[37]' ></input> w
<input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[38]' ></input> d </br>
Estimated Fetal Weight	- <input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[39]' ></input>	grams</br>
Estimated Date of Delivery - <input type='date' name='result[]' placeholder='' value='$specimen_array[40]' ></input></br></br>
</td>
</tr>
<tr><td colspan='2'>III.	BIOPHYSICAL PROFILE</td></tr><tr><td >
	<span class='label'>Fetal breathing </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[41]' ></input></br>
	<span class='label'>Fetal tone		</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[42]' ></input></br>
	<span class='label'>Fetal movement	</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[43]' ></input></br>
	<span class='label'>Amniotic Fluid	</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[44]' ></input></br>
	<span class='label'>Total </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[45]' ></input>
    </td>
    <td >
	<span class='label'>Fetal breathing </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[46]' ></input></br>
	<span class='label'>Fetal tone		</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[47]' ></input></br>
	<span class='label'>Fetal movement	</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[48]' ></input></br>
	<span class='label'>Amniotic Fluid	</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[49]' ></input></br>
	<span class='label'>Total </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[50]' ></input>
    </td>
    </tr>
<tr><td colspan='2'>
<span class='label' >Placental Grade </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[51]' ></input> </br>
<span class='label' >Placental Position</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[52]' ></input></br>
<span class='label'>Amniotic Fluid </span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[53]' ></input></br>
<span class='label'>Amniotic Fluid Index</span><input type='text' class='inshort' name='result[]' placeholder='' value='$specimen_array[54]' ></input></br></br>
Additional Information:</br><textarea name='note' rows='5' cols='80' placeholder='Result'>$datas[note]</textarea></p>
                </td>
                </tr>
				<tr>
		<td colspan='2'>Impression:</br><textarea rows='5' id='impression' cols='100' name='testresult[]' placeholder='Impression' required>$datas[result]</textarea>
		<input type='hidden' name='testid[]' value='$datas[testid]'>
		<input type='hidden' name='labtestid[]' value='$datas[labid]'>
		</td>
		</tr>";


        $typeoftest = $datas[subtype];
		$normalmin = $datas[normalmin];
		$normalmax = $datas[normalmax];
		$flag= $datas[flag];
		$rp = $datas[requestingphysician];
		$do = $datas[dateordered];
		$dr = $datas[datereceived];
		$drel = $datas[daterelease];
		$medtech = $datas[medtech];
		$pathologist = $datas[pathologist];
		//$specimen_array=explode(";", $datas[specimen]);
		$specimen = $datas[specimen];
		$note=$datas[note];
        }//end of while
        }//end of FETAL AGING TWINS
        ?>
<table>
<?=$ltest?>
</table>
<script>
$('#mySelect').change(function () {
var value=$(this).find('option:selected').attr('value');
var someOtherValue=$(this).find('option:selected').attr('data-name');
$('#impression').val(someOtherValue);
$('#result').val(value);
});
</script>
