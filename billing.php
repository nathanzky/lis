<?php
ini_set('display_errors', 'On');
include "connect.php";
$priv = $privy[billing];
include "log.php";
$pid = $_GET[id];
$id = $_POST[pid];
$lastname=$_POST[lastname];
$firstname=$_POST[firstname];

//$errmessage = "Initial";
$sql = "SELECT DISTINCT patient.patientid as patientid, patient.lastname,patient.firstname,patient.mi , 
test.patientid,test.salesid,sales.balance,sales.amount, sales.sdiscpercent, sales.sdiscname, sales.particular,sales.rem, sales.discount,sales.otherdiscount, sales.id, sales.gross, sales.payment
    FROM patient,test, sales where test.patientid=patient.patientid and test.salesid=sales.id  order by sales.id desc limit 100";


if($_POST[submit]=="Search")
{
	if(empty($id)) {
		// $errmessage = "ID is empty. Checking name instead.";
		 if(empty($lastname)) {
			$errmessage = "Patient ID or Last Name cannot be blank.";
			goto a;
		 }
		 else {
		//	$errmessage = "ID is empty. Lastname is $lastname";
             $sql = "SELECT DISTINCT patient.patientid as patientid, patient.lastname,patient.firstname,patient.mi , 
test.patientid,test.salesid,sales.balance,sales.amount, sales.sdiscpercent, sales.sdiscname, sales.particular,sales.rem, sales.discount,sales.otherdiscount, sales.gross, sales.payment
    FROM patient,test,sales WHERE patient.lastname like '$_POST[lastname]%' and patient.firstname like '$_POST[firstname]%'  and test.patientid=patient.patientid and test.salesid=sales.id  order by sales.id desc";
				}
			}
		
	else {
		// $errmessage = "ID is not empty. ID = $id";
        $sql = "SELECT DISTINCT patient.patientid as patientid, patient.lastname,patient.firstname,patient.mi , 
test.patientid,test.salesid,sales.balance,sales.amount,sales.particular,sales.rem, sales.discount,sales.otherdiscount, sales.id, sales.sdiscpercent, sales.sdiscname, sales.gross, sales.payment
    FROM patient,test, sales where patient.patientid=$id and test.patientid=patient.patientid and test.salesid=sales.id  order by sales.id desc";
	}
}

a:
$rec = $links->query($sql) or die($links->error);
$defcolor = "#fff";

while($datas=$rec->fetch_assoc())
	{
		if(($_COOKIE[prev] == "Cashier") || ($_COOKIE[prev] == "Admin") || ($_COOKIE[prev] == "Front Desk")) {
			$action= "<a href='payment.php?pid=$datas[patientid]&gross=$datas[gross]&dp=$datas[sdiscpercent]&disc=$datas[sdiscname]&od=$datas[otherdiscount]&d=$datas[discount]&amt=$datas[amount]&paid=$datas[payment]&bal=$datas[balance]&si=$datas[salesid]&test=$datas[particular]&pn=$datas[lastname], $datas[firstname] $datas[mi]'><u><b>Pay</b></u></a>";
			}
		$records .= "<tr><td bgcolor='$defcolor'>$datas[patientid]</td> 
        <td  bgcolor='$defcolor'>$datas[lastname], $datas[firstname] $datas[mi]</td> 
		<td   bgcolor='$defcolor'>$datas[salesid]</td>
		<td   bgcolor='$defcolor'>$datas[particular]</td>
		<td   bgcolor='$defcolor'>$datas[amount]</td>
		<td   bgcolor='$defcolor'>$datas[payment]</td>
		<td   bgcolor='$defcolor'>$datas[balance]</td>
		<td   bgcolor='$defcolor'>$datas[rem]</td>
		<td  bgcolor='$defcolor'>
		$action | <a href='bill.php?pid=$datas[patientid]&gross=$datas[gross]&dp=$datas[sdiscpercent]&disc=$datas[sdiscname]&od=$datas[otherdiscount]&d=$datas[discount]&amt=$datas[amount]&paid=$datas[payment]&bal=$datas[balance]&si=$datas[salesid]&test=$datas[particular]&pn=$datas[lastname], $datas[firstname] $datas[mi]'><u><b>Bill</b></u></a>
						</td></tr>";
						
						if($defcolor == "#fff") {
							$defcolor = "#eee";
						}else
						{
						   $defcolor = "#fff";	
						}
	}


	
include "header.php";
?>
<?=$errmessage?>
<style>
table {border-collapse: collapse;padding:15px;border: 1px solid black;border-spacing: 10px}
th,td    {padding: 6px;border: 1px solid black;}
</style>
<h2>List of Laboratory Tests</h2>
<form method='post' action='#'>
To search for patient records, you can enter the patient id or fill in the patient's name and click Search.</p>
<input type='text' name='pid' size='10' placeholder ='Patient No.'> Or
<input type='text' name ='lastname' placeholder='Last Name'>
<input type='text' name ='firstname' placeholder='First Name'>
<input type='submit' name='submit' value='Search'>
<input type='submit' name='submit' value='Show All'>
</div>
<p>
<table>
<tr><th bgcolor="#eee">Patient No</th>
<th bgcolor="#eee">Patient Name</th>
<th bgcolor="#eee">Test ID</th>
<th bgcolor="#eee">Request Test</th>
<th bgcolor="#eee">Total Amount</th>
<th bgcolor="#eee">Amount Paid</th>
<th bgcolor="#eee">Balance</th>
<th bgcolor="#fff">Status</th>
<th bgcolor="#eee">Action</th></tr>
<?=$records?>
</table>
</form>
<?php
include "footer.php";
?>