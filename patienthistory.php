<?php
ini_set('display_errors', 'On');
include "connect.php";
$priv = $privy[patienthistory];
include "log.php";
$pid = $_GET[id];
$fn = $_GET[fn];
$id = $_POST[pid];
$tid = $_POST[testid];
$lastname=$_POST[lastname];
$firstname=$_POST[firstname];

if(($_COOKIE[prev]=="Sonologist") || ($_COOKIE[prev]=="Radiologist") ){
	$condition = "SELECT labid from labtest WHERE test LIKE 'Ultrasound' OR test LIKE 'Roentgenological'" ;
}
elseif (($_COOKIE[prev]=="Med Tech") || ($_COOKIE[prev]=="Pathologist") ) {
	$condition = "SELECT labid from labtest WHERE NOT test LIKE 'Ultrasound' AND NOT test LIKE 'Roentgenological'" ;
}
else{
	$condition = "SELECT labid from labtest";
}

$condition2 = "test.patientid='$pid' AND";
if($_POST[submit]=="Show All"){
//$sql = "SELECT DISTINCT id,patientid,patient,particular,cdate FROM sales WHERE id IN ($condition) ORDER BY id DESC limit 50";
//$rec = $links->query($sql) or die($links->error);
//$defcolor = "#fff";
$condition2 = "";
goto b;
}

if($_POST[submit]=="Search")
{
	if(!empty($tid)){
		$sql = "SELECT test.testid, test.salesid, test.labtestid, test.datereceived, test.daterelease, test.patientid, test.result, labtest.labid, labtest.test, labtest.typeoftest, labtest.subtype, sales.id, sales.patient FROM test, labtest, sales WHERE test.salesid=$tid AND sales.id=test.salesid AND test.labtestid=labtest.labid AND test.result <> '' AND test.labtestid IN ($condition) ORDER BY salesid DESC limit 100";
		$rec = $links->query($sql) or die($links->error);
		$errmessage = "Searching by Lab No: ".$tid;
		goto c;
	}
	else if(empty($id)) {
		 //$errmessage = "ID is empty. Checking name instead.";
		 if(empty($lastname)) {
			$errmessage = "Lab No., Patient ID or Last Name cannot be blank.";
			goto a;
		 }
		 else {
			//$errmessage = "ID is empty. Lastname is $lastname";
			$sq = "Select * from patient where lastname like '$_POST[lastname]%' and firstname like '$_POST[firstname]%' limit 50";
		 	$rec = $links->query($sq) or die($links->error);
			if($rec->num_rows > 0)
				{
				$fn = "$datas[lastname], $datas[firstname] $datas[mi]";
				$toshow.="<div id='dialog' title='Patient List'>Select from the list of patients below or <a href='newpatient.php'>click here</a> to add a new record.</br><br />";
				while($datas=$rec->fetch_assoc())
						{
							$toshow .= "<a href='patienthistory.php?id=$datas[patientid]&test=$_POST[test]&f=$datas[lastname], $datas[firstname] $datas[mi]'>$datas[patientid] - $datas[lastname], $datas[firstname], $datas[mi]</a><br />";
							//$toshow .= "<a href='?id=$datas[patientid]'>Patient ID: $datas[patientid] - $datas[lastname], $datas[firstname], $datas[mi]</a><br />";
						}
					$toshow.="</p></div>";
				}
			}
		}
	else {
		//$errmessage = "ID is not empty. ID = $id";
		//$sq = "SELECT * FROM patient where patientid='$_POST[pid]'";
		$pid = $_POST[pid];
		}
		//$rl = $links->query($sq) or die($links->error);
		//$datas = $rl->fetch_assoc();
		//$pid = $datas[patientid];
		//$fn = "$datas[lastname], $datas[firstname] $datas[mi]";
		$condition2	= "test.patientid='$id' AND";
	}

//$sql = "SELECT DISTINCT sales.id,sales.patientid,sales.patient,sales.particular,sales.cdate FROM sales WHERE sales.patientid='$pid' AND sales.id IN ($condition) ORDER BY id DESC";
b:

$sql = "SELECT test.testid, test.salesid, test.labtestid, test.datereceived, test.daterelease, test.patientid, test.result, labtest.labid, labtest.test, labtest.typeoftest, labtest.subtype, sales.id, sales.patient FROM test, labtest, sales WHERE $condition2 sales.id=test.salesid AND test.labtestid=labtest.labid AND test.result <> '' AND test.labtestid IN ($condition) ORDER BY salesid DESC limit 100";
$rec = $links->query($sql) or die($links->error);
$defcolor = "#fff";

c:
while($datas=$rec->fetch_assoc())
	{
		$patientid=$datas[patientid];
		if($_COOKIE[prev] != "Front Desk" || $_COOKIE[prev] != "Cashier") $action = " | <a href='updateresult.php?si=$datas[testid]&li=$datas[salesid]&pn=$datas[patient]&test=$datas[test]&tot=$datas[typeoftest]&pi=$patientid'>Update Result</a>";
		$records .= "<tr>
		<td   width='5%' bgcolor='$defcolor'>$datas[salesid]</td>
		<td   width='20%' bgcolor='$defcolor'>$datas[patient]</td>
		<td   width='10%' bgcolor='$defcolor'>$datas[test]</td>
		<td   width='20%' bgcolor='$defcolor'>$datas[typeoftest]-$datas[subtype]</td>
		<td   width='10%' bgcolor='$defcolor'>$datas[daterelease]</td>
		<td  width='15%' bgcolor='$defcolor'>
						<a href='previewresult.php?si=$datas[testid]&li=$datas[salesid]&pn=$datas[patient]&test=$datas[test]&tot=$datas[typeoftest]&pi=$patientid' title='Print Result'>View Result</a> $action</td></tr>";

						if($defcolor == "#fff") {
							$defcolor = "#eee";
						}else
						{
						   $defcolor = "#fff";
						}

}
a:
include "header.php";
?>

<style>
table {border-collapse: collapse;padding:15px;border: 1px solid black;border-spacing: 10px}
th,td    {padding: 6px;border: 1px solid black;text-align:left;}
</style>
<p style="font-size:14px;color:red;">
<?=$errmessage?>
</p>
<h2>Patient Laboratory Test History</h2>
<form method='post' action='#'>
<strong>Search by Test/Lab ID, Patient ID or Patient Name.</strong></p>
<table class='table'>
	<tr>
<td><input type='text' name='testid' size='10' placeholder ='Lab No.' ></td>
<td><input type='text' name='pid' size='10' placeholder ='Patient No.' >
	OR
<input type='text' name ='lastname' placeholder='Last Name'>
<input type='text' name ='firstname' placeholder='First Name'></td>
<td><input type='submit' name='submit' Value='Search'>
<input type='submit' name='submit' Value='Show All'></td>
</tr>
</form>
<div>
<?=$toshow?>
</div>
<p>
<!--
<br>
<b>Patient No. : <?=$pid?></b>
</p>
<p>
<br>
<b>Patient Name : <?=$fn?></b>
</p>
-->
</div>
<div>
<table>
<tr>
<th bgcolor="#eee">Lab No.</th>
<th bgcolor="#eee">Patient Name</th>
<th bgcolor="#eee">Department</th>
<th bgcolor="#eee">Request Test</th>
<th bgcolor="#eee">Release Date</th>
<th bgcolor="#eee">Action</th></tr>
<?=$records?>
</table>
</div>
<?php
include "footer.php";
?>
