<?php
$con="true";
include "connect.php";
$priv = $privy[dailysales];
include "log.php";
date_default_timezone_set("Asia/Manila");
$nowdate = date('Y-m-d');
$cdate=$_POST[cdate];
$tdate = $_POST[tdate];
$testtype = $_POST[testtype];
if($cdate == "") $cdate=date("Y-m-d");


if(!empty($tdate))
	{
		$sql = "SELECT * FROM sales where sales.cdate BETWEEN '$cdate' AND '$tdate' AND particular LIKE '$testtype%' ";
		$range = "From $cdate to $tdate";
	}else{
		$sql = "SELECT * FROM test where daterelease BETWEEN '$cdate' AND '$nowdate' AND particular LIKE '$testtype%' ";
		$range = $cdate;
	}		

$rec = $links->query($sql) or die($links->error);

while($datas=$rec->fetch_assoc()) 
	{  $paid = $datas[payment];
	   //$particular = explode(',',$datas[particular]);
	   $listing .= "<tr><td>$datas[cdate]</td><td>$datas[patientid]</td><td width='15%'>$datas[patient]</td><td>$datas[particular]</td><td>$datas[amount]</td><td>$paid</td><td>$datas[balance]</td></tr>";
	   $totalsales += $datas[amount];
	   $totalpaid += $paid;
	   $payables += $datas[balance];
	}
include "header.php";	
?>

	<style>
table {border-collapse: collapse;padding:15px;border: 1px solid black;border-spacing: 10px}
th,td    {padding: 6px;border: 1px solid black;}
</style>
</div>
<div>
<h2>Sales report</h2>
<p>
<br />
<b>Select Date Range</b> <br />
<form method='post' action='#'>
<p>
From:
<input type="date" name="cdate" min="2016-01-12" required>
To:
<input type="date" name="tdate" min="2016-01-12" required>  
Filter By:
<select name='testtype'>
<option value=''>All</option>
<?php
$sql = "SELECT DISTINCT test FROM labtest";
$rec = $links->query($sql) or die($links->error);
while($datas=$rec->fetch_assoc()) {
echo "<option value=".$datas[test].">".$datas[test]."</option>";
}
?>
</select>

<input type='submit' name='submit' value='Filter'>
</form>
</p>
<?php
 if(strlen($listing) > 10) echo "<h3>$range Sales Report</h3>";
	 ?>
	 <table>
	 <tr>
	 <th style="width:8%">Date Created</th>
	 <th style="width:7%">Patient ID</th>
	 <th style="width:20%">Patient </th>
	 <th style="width:20%">Particular</th>
	 <th style="width:10%">Price</th>
	 <th style="width:10%">Paid</th>
	 <th style="width:10%">Balance</th>
	 </tr>
	 <?=$listing?>
	 <tr><td colspan='4'></td><td></td> <td></td><td></td></tr>
	  <tr><td colspan='4'>Total</td><td><?=number_format($totalsales,2)?></td> <td><?=number_format($totalpaid,2)?></td><td><?=number_format($payables,2)?></td></tr>
	 </table>
	 <p align="center">
 
	 <form method='post' action='printsales.php' target="_blank">
	 <input type='hidden' name='cdate' value='<?=$cdate?>'>
	 <input type="hidden" name="tdate" value='<?=$tdate?>'>  
	 <input type="hidden" name="testtype" value='<?=$testtype?>'>  
	 <input type='submit' name='submit' value='Print Report'>
	 </form>
	 </div>
<?php
include "footer.php";
?>
	 