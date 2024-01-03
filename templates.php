<?php
$ltest .=  "<tr><td>$datas[test]-$datas[typeoftest]-$datas[subtype] </td>
				<td>Case Number: <input type='text' name='result[]' placeholder='optional' value='$datas[specimen]' ></input></td>
				</tr>
				<tr>
				<td colspan='2'>Use Template: 
				<select>
				<option value='1'>Blank Sheet</option><option value='2'>BPP</option></select></td>
				</tr>
				<tr><td colspan='2'><textarea name='note' rows='5' cols='80' placeholder='Result' >$datas[note]</textarea></td> </tr>
				<tr>
		<td colspan='2'><textarea rows='5' cols='100' name='testresult[]' placeholder='Impression' required>$datas[result]</textarea>
		<input type='hidden' name='testid[]' value='$datas[testid]'>
		<input type='hidden' name='labtestid[]' value='$datas[labid]'>
		</td>
		</tr>";


        ?>