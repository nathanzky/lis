<?php
ini_set('display_errors', 'On');
include "connect.php";
$priv = $privy[updatepatient];
include "log.php";
$patientid=$_REQUEST[id];

//delete the patient record when Delete button is clicked...
if($_GET[o]=='yes') 
	{
		$links->query("Delete from patient where patientid = '$_GET[id]'") or die($links->error);
		$message = "<font size='6' color='red'>Record is successfully deleted...</font>";
		header("Refresh:3 url=paitentlist.php");
	}
if($_POST[submit]=="Update Patient Info!")
	{
	  //Update record
	  $links->query("UPDATE patient SET lastname='$_POST[lname]',firstname='$_POST[fname]', mi='$_POST[mname]',address='$_POST[address]', mobile='$_POST[mobile]',bday='$_POST[bday]',sex='$_POST[sex]', civil_status='$_POST[cs]' where patientid='$_POST[id]'");
	  $message="Record is successfully updated....";
	  
	  $bcode = $patientid ."-". $_POST[lname] ."-" . $_POST[fname] ."-" . $_POST[mname];
      echo "<img width='1' height = '1' src='barcode.php?text=$bcode&size=40&nname=$bcode' />";
	}			


$sql = "SELECT * from patient where patientid='$patientid'";
$rec = $links->query($sql) or die($links->error);
$datas = $rec->fetch_assoc();



include "header.php";
?>
<style>
.label{
	display: inline-block;
	width: 120px;
	}
</style>
<script>
 function deletes(id) {
var ask = window.confirm("Are you sure you want to delete this record now?");
    if (ask) {
		document.location.href = "updatepatient.php?id=" + id +"&o=yes";
        }
	else {
			document.location.href = "updatepatient.php?id=" + id;
        }
 }	
 </script>
<font size='4' color='red'><?=$message?></font>
<h2>Update Patient Data</h2>
Fields with * are required.
<div>
<p align="center">
<form method="post" action="#">
<input type='hidden' name='id' value='<?=$patientid?>'>
<p class="comment-form-email">
<span class="label">First Name:</span>
<input type="text" name="fname" size="30" maxlength="100" value='<?=$datas[firstname]?>' placeholder="First Name" required> *</p>
<p><span class="label">Middle Initial:</span><input type="text" name="mname" size="30" value='<?=$datas[mi]?>'  maxlength="3" placeholder="Middle Initial" > *</p>
<p><span class="label">Last Name:</span><input type="text" name="lname" size="30" maxlength="100" value='<?=$datas[lastname]?>'  placeholder="Last Name" required> *</p>

<p><span class="label">Sex:</span><select name="sex" required>
<option <?php if($datas[sex]=="Male") echo "selected";?>>Male</option>
<option <?php if($datas[sex]=="Female") echo "selected";?>>Female</option>
</select> *
</p>

<p><span class="label">Civil Status:</span><select name="cs" required>
<option <?php if($datas[civil_status]=="Single") echo "selected";?>>Single</option>
<option <?php if($datas[civil_status]=="Married") echo "selected";?>>Married</option>
<option <?php if($datas[civil_status]=="Widow") echo "selected";?>>Widow</option>
<option <?php if($datas[civil_status]=="Child") echo "selected";?>>Child</option>
<option <?php if($datas[civil_status]=="Infant") echo "selected";?>>Infant</option>
<option <?php if($datas[civil_status]=="New Born") echo "selected";?>>New Born</option>
</select> *
</p>
<p><span class="label">Address:</span><input type="text" name="address"  value='<?=$datas[address]?>'  size="50" maxlength="100" placeholder="Address" required> *</p>
<p><span class="label">Mobile No.:</span><input type="text" name="mobile" size="30" maxlength="100"  value='<?=$datas[mobile]?>' placeholder="Mobile Number" required> *</p>
<p><span class="label">Date of Birth:</span><input type="date" name="bday" min="1900-01-12" size="30" maxlength="100" value='<?=$datas[bday]?>'  placeholder="Birth Day" required> *</p>
<p><input type="submit" name="submit" value="Update Patient Info!"></p>

</form>
</div>
<div >
<span style="display:inline-block;margin-right:10px;">
<input type='button' OnClick ="deletes(<?=$datas[patientid]?>)" value='Delete'>
</span>
<span style="display:inline-block;margin-right:10px;">
<form method="get" action="patientlist.php">
    <button type="submit">Back</button>
</form>
</span>
</div>
<?php
include "footer.php";
?>