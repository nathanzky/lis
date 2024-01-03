<?php
ini_set('display_errors', 'On');
$con="true";
include "connect.php";
$priv = $privy[pay];
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
		<td>$maintest-$testlist</td><td>$datas[price]</td></tr>	 
		<input type='hidden' name='testid[]' value ='$datas[test]-$datas[typeoftest]-$datas[subtype]-$datas[price]'>";
         
		$total += $datas[price];
	}
	$od = $_GET[od];
	//$topay = $_GET[amt];
	$paid = $_GET[paid];
	include "header.php";
	?>
	
<script>
	function updatebalance() {
    var topay2 = document.getElementById("topay2").value;
    var paid = document.getElementById("paid2").value
    document.getElementById("topay").value = topay2;
    document.getElementById("paid").value = paid;
    var bal = topay2 - paid;
    document.getElementById("bal").value = bal;
	}

function totalIt() {
  var input = document.getElementsByName("testid[]");
  var total = 0;
  for (var i = 0; i < input.length; i++) {
    //if (input[i].checked) {
	  var str = input[i].value;
      var res = str.split("-");
      total += parseFloat(res[2]);
	  //document.getElementById("gross").value = total;
    //}
  }
  
 // var thedis =  document.getElementById("dis").value * total.toFixed(2)  + parseFloat(document.getElementById("od").value);
//	var gross = document.getElementById("gross");
//	document.getElementById("disa").value = thedis.toFixed(2);
//	netamount = gross - thedis;
    
//	var paid = document.getElementById("paid").value;
   // var balance =  netamount- paid;
  //  document.getElementById("bal").value = balance.toFixed(2);
  gross = document.getElementById("gross").value;
  thedis =  document.getElementById("dis").value * gross  + parseFloat(document.getElementById("od").value);
  document.getElementById("disa").value=thedis.toFixed(2); 
	document.getElementById("topay").value = gross - thedis;
	document.getElementById("bal").value =  document.getElementById("topay").value - parseFloat(document.getElementById("paid").value);

    
}

    function setPreview() {
    $('#form1').attr('target','_blank');
    $('#form1').attr('action','claimstub.php');
    $('#form1').submit();
}

function setSubmit() {
    $('#form1').attr('target','_blank');
    $('#form1').attr('action','printbilling.php');
    $('#form1').submit();
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
	</br>
    
	<b>Total Amount</b> <br />
	<input type='text' name='gross' id='gross' value='<?=$gross?>' readonly>
	<!-- Add Discount dropdown -->
	<p>
	<b>Discount</b> <br />
	<input type='hidden' name='discpercent' id='discpercent' value='<?=$dp?>' readonly>
	<input type='hidden' name='discountname' id='discountname' value='<?=$dname?>' readonly>
	<?php  
	//List enabled discounts
	$sqd = "select * from discount where enabled='YES'";
	$rec = $links->query($sqd) or die($links->error);
	?>
	<select name='discname' id='dis' onChange="totalIt();" required>
	<?php 
   //  echo "<select name='prev'". " id='usr'" . ">";
	while ($datas=$rec->fetch_assoc()) { 
		?>
		<option value=" <?php echo ($datas[discpercent]*.01) ?> " data-name="<?=$datas[discname]?>"
		<?php if($dname==$datas[discname]) echo "selected"; ?> >
		<?=$datas[discname]?></option>
		<?php }
		?>
	</select>
	<!-- This part is to save the Discount type to database -->
	<p>
		<p>
	<b>Other Discount</b><br />
	<input type='text' name='od' id='od' value='<?=$od?>'   onChange="totalIt();">
	<p>
	<p>
	<b>Total Discount</b><br />
	<input type='text' name='discount' id='disa' value='<?=$di?>' readonly="readonly" onChange = "totalIt();">
	</p>
	<p>
    
	<b>To Pay</b><br />
    <span id='seniorpay'></span>
    <input type='text' name='topay' id='topay' value='<?=number_format($_GET[amt],2)?>' readonly="readonly" onChange = "totalIt();">
	<br />
	</p>
	<?php
	?>
	<p>
	<b>Amount Paid</b> <br />
    <span id='seniorpay2'></span>
	<input type='text' name='paid' id='paid' value='<?=$paid?>' onChange = "totalIt();">
	<br />
	</p>
	
		<p>
	<b>Balance</b> <br />
	<input type='text' name='balance' id='bal' value='<?=number_format($_GET[bal],2)?>'  readonly="readonly">
	<br />
	</p>
<input type='button' onclick="setSubmit()" value="Save and Print"> </input>
<input type='button' onclick="setPreview()" value="Print Claim Stub" /></input>
	</form>	
	 <br>
    <script>
$('#dis').change(function () {
var value=$(this).find('option:selected').attr('value');
var someOtherValue=$(this).find('option:selected').attr('data-name');
if (someOtherValue=="Senior Citizen"){
    document.getElementById("topay").type = "hidden";
    document.getElementById("paid").type = "hidden";
    document.getElementById("seniorpay").innerHTML = "<input type='text' name='topay2' id='topay2' placeholder='Enter Amount' onChange='updatebalance();'></input> ";
    document.getElementById("seniorpay2").innerHTML = "<input type='text' name='paid2' id='paid2' placeholder='Enter Payment' onChange='updatebalance();'></input> ";
}else {
    document.getElementById("seniorpay").innerHTML = "";
    document.getElementById("seniorpay2").innerHTML = "";
    document.getElementById("topay").type = "text";
    document.getElementById("paid").type = "text";
}
$('#discountname').val(someOtherValue);
$('#discpercent').val(value);
});
</script>

	<p>
<form action="billing.php">
<input type='submit' name='submit' value='Back'>
</form>
</p>
	
	<?php

	include "footer.php";
?>