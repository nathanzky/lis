<?php
include "connect.php";
$priv = $privy[pending];
include "log.php";
$pid = $_GET[id];
$fn = $_GET[fn];
$id = $_POST[pid];
$tid = $_POST[testid];
$lastname=$_POST[lastname];
$firstname=$_POST[firstname];

if(($_COOKIE[prev]=="Sonologist") || ($_COOKIE[prev]=="Radiologist") ){
$condition2 = "AND test.labtestid IN (SELECT labid FROM labtest WHERE test LIKE 'Ultrasound' OR particular LIKE 'Roentgenological')";
}
elseif (($_COOKIE[prev]=="Med Tech") || ($_COOKIE[prev]=="Pathologist") ) {
$condition2 = "AND test.labtestid NOT IN (SELECT labid FROM labtest WHERE test LIKE 'Ultrasound' OR particular LIKE 'Roentgenological')";
}
else {
	$condition2 = "";
}

if($_POST[submit]=="Search")
{
	$errmessage="No Filters Set";
	//check for Test ID
	if(!empty($tid)){
		$condition1 = "AND test.salesid='$tid'";
		$errmessage="Searching Lab ID: ".$tid;
	}
	else if(!empty($id)) {
		//check for Patient ID
		$condition1 = "AND test.patientid='$id'";
		$errmessage="Searching Patient ID: ".$id;
	}
	else if(!empty($lastname)){
		$condition1 = "AND patient.lastname LIKE '%$lastname%' AND patient.firstname LIKE '%$firstname%'";
		$errmessage="Searching Patient Name: $lastname, $firstname";
	}
}else{
	goto a;
}

a:
$sql = "SELECT patient.patientid, patient.lastname,patient.firstname,patient.mi,test.testid,test.patientid,test.datereceived, test.salesid,sales.particular,sales.rem, sales.sdiscname, sales.sdiscpercent, sales.otherdiscount, sales.discount, sales.balance, sales.gross, sales.payment, sales.amount, labtest.labid, labtest.test, labtest.typeoftest, labtest.subtype
FROM patient,test, sales, labtest where test.patientid=patient.patientid AND test.result='' AND test.salesid=sales.id AND labtest.labid=test.labtestid $condition1 $condition2 ORDER BY test.salesid DESC LIMIT 100";

b:
$rec = $links->query($sql) or die($links->error);
$defcolor = "#fff";
while($datas=$rec->fetch_assoc())
	{
		$records .= "<tr>
		<td style='width: 8%;' bgcolor='$defcolor'>$datas[salesid]</td>
		<td style='width: 20%' bgcolor='$defcolor'>$datas[lastname], $datas[firstname] $datas[mi]</td>
		<td style='width: 10%' bgcolor='$defcolor'>$datas[test]</td>
		<td style='width: 25%' bgcolor='$defcolor'>$datas[typeoftest]-$datas[subtype]</td>
		<td style='width: 10%' bgcolor='$defcolor'>$datas[datereceived]</td>
		<td style='width: 10%'bgcolor='$defcolor'>$datas[rem]</td>
		<td style='width: 15%'bgcolor='$defcolor'>
						<a href='updaterequest.php?pi=$datas[patientid]&test=$datas[particular]&si=$datas[salesid]&pn=$datas[lastname], $datas[firstname] $datas[mi]&tp=$datas[amount]&pd=$datas[payment]&rem=$datas[rem]&dp=$datas[sdiscpercent]&disc=$datas[sdiscname]&od=$datas[otherdiscount]&d=$datas[discount]&bal=$datas[balance]&gross=$datas[gross]' title='Update or Delete this record'>Edit</a> | <a href='labresult.php?pi=$datas[patientid]&test=$datas[test]&tot=$datas[typeoftest]&li=$datas[salesid]&si=$datas[testid]&pn=$datas[lastname], $datas[firstname] $datas[mi]&rem=$datas[rem]' title='Enter Laboratory result for this patient...'>Add Results</a></td></tr>";

						if($defcolor == "#fff") {
							$defcolor = "#eee";
						}else
						{
						   $defcolor = "#fff";
						}
	}
include "header.php";
?>
<style>
table {border-collapse: collapse;padding:15px;border: 1px solid black;border-spacing: 10px}
th,td    {padding: 6px;border: 1px solid black;}
</style>
<p style="font-size:14px;color:red;">
<?=$errmessage?>
</p>
<h2>List of Pending Laboratory Test</h2>
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
<table>
<tr><th bgcolor="#eee">Lab ID.</th><th bgcolor="#eee">Patient Name</th><th bgcolor="#eee">Department</th><th bgcolor="#eee">Request Test</th><th bgcolor="#eee">Request Date</th><th>Payment Status</th><th bgcolor="#eee">Action</th></tr>
<?=$records?>

</table>
<?php
include "footer.php";
?>
