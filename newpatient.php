<?php
ini_set('display_errors', 'On');
include "connect.php";
$priv = $privy[newpatient];
include "log.php";
if($_POST[submit]=="Save Patient")
	{
	  //check if the patient is already exist...
		$sql = "SELECT patientid,lastname,firstname,mi from patient where lastname='$_POST[lname]' and firstname='$_POST[fname]' and mi='$_POST[mname]'";
		$rec = $links->query($sql) or die($links->error);
		$datas = $rec->fetch_assoc();
		$patientid = $datas[patientid];
		if($patientid=="") 
			{
				//save record to patient db
				$links->query("INSERT INTO patient VALUES ('','$_POST[lname]','$_POST[fname]','$_POST[mname]','$_POST[address]','$_POST[mobile]','$_POST[bday]','$_POST[sex]','$_POST[cs]')");
				$patientid=$links->insert_id;
			}
				//redirect to testselect.php for the selection of test to be conducted for this patient....
$name=utf8_decode($_POST[lname]).", ".utf8_decode($_POST[fname])." ".utf8_decode($_POST[mname]);			
header("Refresh:3 url=testselect.php?id=$patientid&f=$name");
$bcode = $patientid ."-". $_POST[lname] ."-" . $_POST[fname] ."-" . $_POST[mname];
echo "<img width='1' height = '1' src='barcode.php?text=$bcode&size=40&nname=$bcode' />";
echo "Please wait... while saving...";
exit;
	}

	include "header.php";
?>
<style>
.label{
	display: inline-block;
	width: 120px;
	}
</style>
<div style="display:inline-block;">
<h2>New Patient Form</h2>
This form is for new patient entry. Fields marked * are required.
<p align="center">
<form method="post" action="#">

<p class="comment-form-email"><span class="label">First Name:</span><input type="text" name="fname" size="30" maxlength="100" placeholder="First Name" required> *</p>
<p><span class="label">Middle Initial:</span><input type="text" name="mname" size="30" maxlength="3" placeholder="Middle Initial"></p>
<p><span class="label">Last Name:</span><input type="text" name="lname" size="30" maxlength="100" placeholder="Last Name" required> *</p>
<p><span class="label">Sex:</span><select name="sex" required>

<option value="Male">Male</option>
<option value="Female">Female</option>
</select> *
</p>
<p><span class="label">Civil Status:</span>
<select name="cs" placeholder = "Civil Status">
<option value="Single">Single</option>
<option value="Married">Married</option>
<option value="Widow">Widow</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="New Born">New Born</option>
</select> *
</p>
<p><span class="label">Address:</span><input type="text" name="address" size="50" maxlength="100" placeholder="Address" required> *</p>
<p><span class="label">Mobile No. :</span><input type="text" name="mobile" size="30" maxlength="100" placeholder="Mobile Number" required> *</p>
<p><span class="label">Date of Birth:</span><input type="date" name="bday" size="30" maxlength="100" placeholder="Birth Day" required>  *</p>
<p><input type="submit" name="submit" value="Save Patient"></p>

</form>
</div>
<div style="display:inline-block;margin-right:10px;">
	<form method='post' action="index.php">
	<input type='submit' name='submit' value='Cancel'>
	</form>
</div>
</p>

<?php
include "footer.php";
?>