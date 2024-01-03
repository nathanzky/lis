<?php
$sql = "SELECT DISTINCT test.testid as testid,test.dateordered,test.note, test.medtech,test.pathologist, test.result,test.datereceived, test.daterelease,test.requestingphysician, test.labtestid, test.specimen, labtest.* from test,labtest where test.labtestid = labtest.labid and test.testid='$si'";
$rec = $links->query($sql) or die($links->error);

while($datas=$rec->fetch_assoc()){
    if(strtoupper($tot)=="PELVIMETRY"){
$specimen_array=explode(";", $datas[specimen]);
$ltest .=  "<tr><td colspan='4'>$datas[test]-$datas[typeoftest]</td>
				<td colspan='2'>Case Number: <input type='text' name='result[]' placeholder='optional' value='$specimen_array[0]' ></input></td>
				</tr>
                <tr><td colspan='6'>Evaluation <input type='text' size='100' name='result[]' placeholder='optional' value='$specimen_array[1]' ></input>
                </td> </tr>
                <tr><td>DIAMETER</td><td>ACTUAL</td><td>TOTAL</td><td>AVERAGE NORMAL</td><td>AVERAGE TOTAL</td><td>LOW NORMAL</td>
                <tr><td colspan='6'>  Actual Inlet</td></tr>
                <tr><td>Anteposterior</td><td><input type='text' name='result[]' placeholder='optional' value='$specimen_array[2]' ></input></td>
                <td rowspan='2'><input type='text' name='result[]' placeholder='optional' value='$specimen_array[3]' ></input></td>
                <td> 13.5 </td><td rowspan='2'> 25.5 </td><td rowspan='2'> 22.0 </td></tr>
                <tr><td>Traverse</td><td><input type='text' name='result[]' placeholder='optional' value='$specimen_array[4]' ></input></td>
                <td>12.5 </td></tr>

                <tr><td colspan='6'>Midpelvis</td></tr>
                <tr><td>Anteposterior</td><td><input type='text' name='result[]' placeholder='optional' value='$specimen_array[5]' ></input></td>
                <td rowspan='2'><input type='text' name='result[]' placeholder='optional' value='$specimen_array[6]' ></input></td>
                <td> 11.5 </td><td rowspan='2'> 22.0 </td><td rowspan='2'> 20.2 </td></tr>
                <tr><td>Transverse (bispinous)</td><td><input type='text' name='result[]' placeholder='optional' value='$specimen_array[7]' ></input></td>
                <td> 10.5 </td>
                </tr>

                <tr><td colspan='6'>Outlet</td></tr>
                <tr><td>Anteposterior</td><td><input type='text' name='result[]' placeholder='optional' value='$specimen_array[8]' ></input></td>
                <td rowspan='2'><input type='text' name='result[]' placeholder='optional' value='$specimen_array[9]' ></input></td>
                <td> 7.5 </td><td rowspan='2'> 18.0 </td><td rowspan='2'> 16.0 </td></tr>
                <tr><td>Transverse (bispinous)</td><td><input type='text' name='result[]' placeholder='optional' value='$specimen_array[10]' ></input></td>
                <td> 10.5 </td>
                </tr>
				<tr><td colspan='6'>FETAL HEAD MEASUREMENTS</td></tr>
                <tr><td>Anteposterior</td>
                <td>Longest Dia.</td><td><input type='text' name='result[]' placeholder='optional' value='$specimen_array[11]' ></input></td>
                <td>Shortest Dia.</td><td><input type='text' name='result[]' placeholder='optional' value='$specimen_array[12]' ></input></td><td></td>
                </tr>
                <tr><td>Transverse</td>
                <td>Longest Dia.</td><td><input type='text' name='result[]' placeholder='optional' value='$specimen_array[13]' ></input></td>
                <td>Shortest Dia.</td><td><input type='text' name='result[]' placeholder='optional' value='$specimen_array[14]' ></input></td><td></td>
                </tr>
                <tr><td colspan='2'>Average Fetal Head Dia.</td>
                <td colspan='4'><input type='text' name='result[]' placeholder='optional' value='$specimen_array[15]' ></input> cm</td>
                </tr>
                <tr><td colspan='2'>Position of fetal head</td>
                <td colspan='1'><input type='text' name='result[]' placeholder='optional' value='$specimen_array[16]' ></input> </td>
                <td colspan='2'>Shape of Pelvis</td>
                <td colspan='1'><input type='text' name='result[]' placeholder='optional' value='$specimen_array[17]' ></input> </td>
                </tr>
                <tr><td colspan='2'>Position of fetal spine</td>
                <td colspan='1'><input type='text' name='result[]' placeholder='optional' value='$specimen_array[18]' ></input> </td>
                <td colspan='2'>Separation of sumphysis pubis</td>
                <td colspan='1'><input type='text' name='result[]' placeholder='optional' value='$specimen_array[19]' ></input> </td>
                </tr>
                <tr><td colspan='2'>Moulding of fetal head</td>
                <td colspan='1'><input type='text' name='result[]' placeholder='optional' value='$specimen_array[20]' ></input> </td>
                <td colspan='2'>coccyx</td>
                <td colspan='1'><input type='text' name='result[]' placeholder='optional' value='$specimen_array[21]' ></input> </td>
                </tr>
                <tr><td colspan='6'><textarea id='result' name='note' rows='5' cols='80' placeholder='Additional Information' >$datas[note]</textarea>
                </td> </tr>
		<td colspan='6'><textarea rows='5' id='impression' cols='100' name='testresult[]' placeholder='Impression' required>$datas[result]</textarea>
		<input type='hidden' name='testid[]' value='$datas[testid]'>
		<input type='hidden' name='labtestid[]' value='$datas[labid]'>
		</td>
		</tr>";
    }else{
$specimen_array=explode(";", $datas[specimen]);
$ltest .=  "<tr><td>Examination Request: <input type='text' name='result[]' placeholder='optional' value='$specimen_array[0]' ></input> </td>
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
        }

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
        $sql = "SELECT * FROM resulttemps WHERE temptype='Roentgenological'";
        $rec = $links->query($sql);
        while($datas=$rec->fetch_assoc()){
            ?>
            <option value='<?=$datas[tempresult]?> ' data-name='<?=$datas[tempimpression]?>'><?=$datas[tempname]?></option>
        <?php
        }
        ?>
        </select>
        </p>

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
