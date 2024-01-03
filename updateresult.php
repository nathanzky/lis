<?php
$con="true";
ini_set('display_errors', 'On');
include "connect.php";
$priv = $privy[updateresult];
include "log.php";
$patientid = $_GET[pi];
$test = $_REQUEST[test];
$tot = $_REQUEST[tot];
$pn = $_REQUEST[pn];
$si=$_REQUEST[si];
$li=$_REQUEST[li];

setcookie("pi", "", time() + (10), "/");
setcookie("ct", "", time() + (10), "/");
include "header.php";
?>
<style>
input {margin-top: 3px;}
.inshort {margin-top: 3px; width: 100px;}
table {border-collapse: collapse;padding:15px;border: 1px solid black;border-spacing: 10px}
th,td    {padding: 6px;border: 1px solid #aaa;}
.label { display: inline-block; width: 160px; }
.label2 { display: inline-block; width: 100px; }
.label3 { display: inline-block; width: 200px; }
</style>

 </div>
<div class="lab-results-container">
<form method="post" action="printoutresult.php" target='new'>
<h2>Laboratory Test Result Entry Form</h2>
<p>
<b>Patient Name : </b> <?=$pn?>
</br>
<b>Lab ID: </b> <?=$li?>
</br>
<b>Lab Test For : </b> <?=$test?> - <?=$tot?>
<!-- end of global header -->

<?php if(strtoupper($test)=="LABORATORY"){
?>

<!-- end of Laboratory headers -->
<?php
if(($tot=="Blood Chemistry") || ($tot=="Hematology")|| ($tot=="Fecalysis") || ($tot=="Urinalysis") || ($tot=="T3, T4 and TSH")  || ($tot=="FT3 and FT4")){
$sql = "SELECT DISTINCT test.testid as testid,test.dateordered,test.note, test.medtech,test.pathologist,test.result,test.datereceived, test.requestingphysician, test.labtestid, test.specimen, labtest.* from test,labtest where test.labtestid = labtest.labid and test.salesid='$li' and labtest.typeoftest='$tot'";
$rec = $links->query($sql) or die($links->error);
}
else{
$sql = "SELECT DISTINCT test.testid as testid,test.dateordered,test.note, test.medtech,test.pathologist, test.result,test.datereceived, test.requestingphysician, test.labtestid, test.specimen, labtest.* from test,labtest where test.labtestid = labtest.labid and test.testid='$si'";
$rec = $links->query($sql) or die($links->error);
}

while($datas=$rec->fetch_assoc())
{
	if((strtoupper($tot)=="SEMEN ANALYSIS") ){
		$specimen_array=explode(";", $datas[specimen]);
		$ltest .=  "<tr><td>$datas[test]-$datas[typeoftest]-$datas[subtype]</td>
		<td>$datas[normalmin]-$datas[normalmax]</td>
		<td><input type='hidden' id='flag' name='flag[]' value='$datas[flag]'>
		Sperm Count: <input type='text' id='testresult' name='testresult[]' value='$datas[result]' required> /mL
		<input type='hidden' name='testid[]' value='$datas[testid]'>
		<input type='hidden' name='labtestid[]' value='$datas[labid]'>
		</td>
		</tr>";

			}elseif((strtoupper($tot)=="SPECIAL TESTS") ){
		$specimen_array=explode(";", $datas[specimen]);
		$ltest .=  "<tr><td>$datas[test]-$datas[typeoftest]-$datas[subtype]</td>
		<td>$datas[normalmin] $datas[normalmax]</td>
		<td><input type='hidden' id='flag' name='flag[]' value='$datas[flag]'>
		Result: <input type='text' id='testresult' name='testresult[]' value='$datas[result]' required>
		<input type='text' id='result' name='result[]' value='$specimen_array[0]' placeholder='Units: Leave Blank if not required'>
		<input type='hidden' name='testid[]' value='$datas[testid]'>
		<input type='hidden' name='labtestid[]' value='$datas[labid]'>
		</td>
		</tr>
		<tr>
		<td colspan='3'>
		Specimen: <input type='text' name='result[]' placeholder='Optional' value='$specimen_array[1]'></input>
		</td>
		</tr>
		";
			}
			else{
		$specimen_array=explode(";", $datas[specimen]);
		$ltest .=  "<tr><td>$datas[test]-$datas[typeoftest]-$datas[subtype]</td>
		<td>$datas[normalmin] $datas[normalmax]</td>
		<td><input type='hidden' id='flag' name='flag[]' value='$datas[flag]'>
		<input type='text' id='testresult' name='testresult[]' value='$datas[result]' required>
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
		$medtech = $datas[medtech];
		$pathologist = $datas[pathologist];
		//$specimen_array=explode(";", $datas[specimen]);
		$specimen = $datas[specimen];
		$note=$datas[note];

	}
	$medtec = explode("~",$config[5]);
	foreach($medtec as $n)
		{
			//$mtech = str_replace(' ', '', $medtech);
			//$m = str_replace(' ', '', $n);
			//echo $m;
		  if ($medtech==$n) {
				$mtec .= "<option selected='selected' value='$n'>$n</option>";
			}else {
				$mtec .= "<option value='$n'>$n</option>";
			}
		}
		//echo $mtech;
	$pathoc = 	explode("~",$config[6]);
	foreach($pathoc as $n)
		{
		  if ($pathologist==$n) {
				$pthoc .= "<option selected='selected' value='$n'>$n</option>";
			}else {
				$pthoc .= "<option value='$n'>$n</option>";
			}
		}
	?>

<p> <select name='mt' placeholder='Medical Technician' required>
<?=$mtec?></select>  * Medtech (No need to select if not applicable)</p>
</p>
<p><select name='pt' placeholder='Pathologist' required>
<?=$pthoc?></select> * Pathologist  (No need to change if not applicable)</p>

<table>
<?php
echo "<tr>";
?>
<th>Type of test</th><th>Normal Range</th><th>Result</th>
</tr>
<?php
echo $ltest;
?>
</table>
<?php
include 'labtestcustom.php';
?>

<div class="results-remarks" style="display: block; clear: both">
<p>
<textarea  name="note" rows="10" cols="50" placeholder="Remarks"><?=$note?></textarea><br />
</p>

<?php
} //end of Laboratory
elseif(strtoupper($test)=="ULTRASOUND"){
include "uslabresult.php";
$sonol = 	explode("~",$config[8]);
	foreach($sonol as $n)
		{
		  if ($pathologist==$n) {
				$sono .= "<option selected='selected' value='$n'>$n</option>";
			}else {
				$sono .= "<option value='$n'>$n</option>";
			}
		}
		?>

	<p> * Sonologist <select name='pt' placeholder='Sonologist' required>
<datalist><?=$sono?></datalist></select> </p><p>


<?php
} //end of Ultrasound


elseif(strtoupper($test)=="ROENTGENOLOGICAL"){
	include "xrayresult.php";
	$radiol= explode("~",$config[7]);
	foreach($radiol as $n)
		{
		  if ($pathologist==$n) {
				$radio .= "<option selected='selected' value='$n'>$n</option>";
			}else {
				$radio .= "<option value='$n'>$n</option>";
			}
		}
		?>
<p><select name='pt' placeholder='Radiologist' required>
<datalist><?=$radio?></datalist></select> * Radiologist  </p>

<?php
}//end of Roentgenological


else{
	$sql = "SELECT DISTINCT test.testid as testid,test.dateordered,test.note, test.medtech,test.pathologist, test.result,test.datereceived, test.requestingphysician, test.labtestid, test.specimen, labtest.* from test,labtest where test.labtestid = labtest.labid and test.testid='$si'";
$rec = $links->query($sql) or die($links->error);


while($datas=$rec->fetch_assoc())
{
$specimen_array=explode(";", $datas[specimen]);
	$ltest .=  "<tr><td>$datas[test]-$datas[typeoftest]-$datas[subtype] </td>
				<td>Case Number: <input type='text' name='result[]' placeholder='optional' value='$specimen_array[0]' ></input></td>
				</tr>
				<tr><td colspan='2'><textarea id='result' name='testresult[]' rows='5' cols='80' placeholder='Result' >Please refer to Machine Output</textarea>
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
		$medtech = $datas[medtech];
		$pathologist = $datas[pathologist];
		//$specimen_array=explode(";", $datas[specimen]);
		$specimen = $datas[specimen];
		$note=$datas[note];

}
?>
<table>
<?php
echo "<tr>";
?>
<th>Type of test</th><th>Result</th>
</tr>
<?php
echo $ltest;
?>
</table>
<?php
}
?></p>
</div>
<input type='hidden' name='do' value='<?=$do?>'>
<input type='hidden' name='dr' value='<?=$dr?>'>
<input type='hidden' name='drel' value=''>
<input type='hidden' name='rp' value='<?=$rp?>'>
<input type='hidden' name='patientid' value='<?=$patientid?>'>
<input type='hidden' name='test' value='<?=$test?>'>
<input type='hidden' name='tot' value='<?=$tot?>'>
<input type='hidden' name='si' value = '<?=$si?>'>
<input type='hidden' name='li' value = '<?=$li?>'>
<input type='hidden' name='pn' value = '<?=$pn?>'>
<input type='submit' name='submit' value='Save And View!'><br />
</form>
<p>
<form action="patienthistory.php">
<input type='submit' name='submit' value='Back'>
</form>
</p>
</div>

<?php
include "footer.php";
?>
