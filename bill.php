<?php
ini_set('display_errors', 'On');
$con="true";
include "connect.php";
$priv = $privy[bill];
include "log.php";
	
	
$patientid = $_REQUEST[pid];
$test = $_REQUEST[test];
$pn = $_REQUEST[pn];
$si=$_REQUEST[si];
$di=$_REQUEST[d];
$dname=$_REQUEST[disc];
$dp=$_REQUEST[dp];
$gross=$_REQUEST[gross];

$sq = "SELECT * FROM test FORCE INDEX(salesid) where salesid='$si'";
$re = $links->query($sq) or die($links->error);
$i=0;
while($row=$re->fetch_assoc()) 
	{
		$query .=  "'$row[labtestid]',";
		if($i==0) 
			{
				$rt = $row[requestingphysician];
				$mt = $row[medtech];
				$pt = $row[pathologist];
				$dr = $row[datereceived];
				$dod = $row[dateordered];
			}
		 $i++;
	}

$query = rtrim($query,",");
$sql = "select * from labtest where labid IN ($query)";
$rec = $links->query($sql) or die($link->error);


while ($datas=$rec->fetch_assoc())
	{
		$sub=trim(strip_tags($datas[subtype]));
		$testlist = $datas[typeoftest];
		$maintest = $datas[test];
		 if($sub != "N/A" && $sub != "NA" && $sub != "") $testlist  .= "<br> - $datas[subtype]";
		 
		$listoftest .= "<tr>
		<td>$datas[test]-$testlist</td><td>$datas[price]</td></tr>	 
		<input type='hidden' name='testid[]' value ='$datas[test]-$datas[typeoftest]-$datas[subtype]-$datas[price]'>";
         
		$topay = $datas[price];
	}
	$od = $_GET[od];
	$topay = $_GET[amt];
	$paid = $_GET[paid];
	include "header.php";
	?>
	
<script>
function totalIt() {
  var input = document.getElementsByName("testid[]");
  var total = 0;
  for (var i = 0; i < input.length; i++) {
    //if (input[i].checked) {
	  var str = input[i].value;
      var res = str.split("-");
      total += parseFloat(res[2]);
    //}
  }
  
  var thedis =  document.getElementById("dis").value * total.toFixed(2)  + parseFloat(document.getElementById("od").value);
  document.getElementById("disa").value=thedis.toFixed(2);

//document.getElementById("total").value =  total.toFixed(2) - (parseFloat(document.getElementById("dis").value) * total.toFixed(2));
document.getElementById("topay").value =  total.toFixed(2);
var netamount = document.getElementById("topay").value - thedis;
var balance =  netamount- parseFloat(document.getElementById("paid").value);
 document.getElementById("bal").value = balance.toFixed(2);
}
    function setSubmit() {
    $('#form1').attr('target','_blank')
    $('#form1').attr('action','previewbilling.php')
	location.reload(true);
    $('#form1').submit()
}
    function setPreview() {
    $('#form1').attr('target','_blank')
    $('#form1').attr('action','claimstub.php')
	location.reload(true)
    $('#form1').submit()
}



</script>


	<h2>Billing Summary</h2>

	
	<style>
table {border-collapse: collapse;padding:15px;border: 1px solid black;border-spacing: 10px}
th,td    {padding: 6px;border: 1px solid black;}
</style>

	<br />
	<form id='form1' method='post' action='printbilling.php' target='new'>
	<b>Patient ID :</b> <?=$patientid?><br />
	<b>Patient Name :</b> <?=$pn?><br />
	<b>Test ID : </b> <?=$si?>	<br />
    <b>Test For : </b> <?=$test?>	<br />
	<br /> 
	 <table>
<tr>
<th>Test Request</th>
<th>Price</th>
</tr>
<?=$listoftest?>
</table>

	<input type='hidden' name='patientid' value='<?=$patientid?>'>
	<input type='hidden' name='test' value='<?=$test?>'>
	<input type ='hidden' name='si' value='<?=$si?>'>
	<input type='hidden' name='pn' value='<?=$pn?>'>
	<input type='hidden' name='d' value='<?=$di?>'>
	<input type='hidden' name='rp' value='<?=$rt?>'>
	
 
	<b>Request Date</b>
	<br />
	<p><input type="date" name="dor" min="2016-01-12" value = '<?=$dod?>' placeholder="Date Requested" required readonly="readonly"> </p>
	<b>Date Received</b>
	<br />
	<p><input type="date" name="dr" min="2016-01-12" value=<?=$dr?> placeholder="Date Received" required readonly="readonly"><p>
	<b>Total Amount</b> <br />
	<input type='text' name='gross' id='gross' value='<?=$gross?>' readonly>
	<!-- Add Discount dropdown -->
	<p>
	<b>Discount</b> <br />
	<input type='hidden' name='discpercent' id='discpercent' value='<?=$dp?>' readonly>
	<input type='text' name='discountname' id='discountname' value='<?=$dname?>' readonly onchange='change_attrib()'>
		<p>
	<b>Other Discount</b><br />
	<input type='text' name='od' id='od' value='<?=$od?>'  readonly onChange="totalIt();">
	<p>
	<p>
	<b>Total Discount</b><br />
	<input type='text' name='discount' id='disa' value='<?=$di?>' readonly="readonly" onChange = "totalIt();">
	</p>
	
	<p>
	<b>To Pay</b><br />
	<input type='text' name='topay' id='topay' value='<?=$_GET[amt]?>'>
	<br />
	</p>
	<p>
	<b>Amount Paid</b> <br />
	<input type='text' name='paid' id='paid' value='<?=$paid?>' onChange = "totalIt();" readonly>
	<br />
	</p>
	
		<p>
	<b>Balance</b> <br />
	<input type='text' name='balance' id='bal' value='<?=$_GET[bal]?>'  readonly="readonly">
	<br />
	</p>
	
	 
	<br><br>
	<input type="button" onclick="setSubmit()" value='Print Bill'> </input>
	<input type="button" onclick="setPreview()" value="Print Claim Stub" /></input>
	</form>
	
	<p>
<form action="billing.php">
<input type='submit' name='submit' value='Back'>
</form>
</p>
	
	<?php

	include "footer.php";
?>