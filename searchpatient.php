<?php
ini_set('display_errors', 'On');
include "connect.php";
$priv = $privy[searchpatient];
include "log.php";
$pid=$_POST[patientid];
$lastname=$_POST[lastname];

if($_POST[submit]=="Search")
{
	if(empty($pid)) {
    //$errmessage = "ID is empty. Checking name instead.";
		if(empty($lastname)) {
			$errmessage = "Patient ID or Last Name cannot be blank.";
		}
		else {

			$sql = "Select * from patient where lastname like '$_POST[lastname]%' and firstname like '$_POST[firstname]%' limit 50";
		 	$rec = $links->query($sql) or die($links->error);
			if($rec->num_rows > 0)
			{
			//$errmessage = "ID is empty. Lastname is $lastname";
			$toshow="<div id='dialog' title='Patient List'>Select from the list of patients below or <a href='newpatient.php'>click here</a> to add a new record.</br><br /><table class='table'><tr><th>ID</th><th>Name</th><th>Date of Birth</th></tr>";
			while($datas=$rec->fetch_assoc())
					{
						$bday = $datas[bday];
						$toshow .= "<tr><td>$datas[patientid]<td><a href='testselect.php?id=$datas[patientid]&test=$_POST[test]&f=$datas[lastname], $datas[firstname] $datas[mi]'> $datas[lastname], $datas[firstname], $datas[mi]</a></td><td>$bday</td></tr>";
					}
				$toshow.="</table></div>";
			}
			else {
				$errmessage = "$lastname is not in our records. <a href='newpatient.php'>Click here </a>to add new patient.";
			}
		}
	}
	else {
		//$errmessage = "ID is not empty. ID = $pid";
		$sql = "Select * from patient where patientid='$pid'";
		$rec = $links->query($sql) or die($links->error);
		$datas=$rec->fetch_assoc();
			if($rec->num_rows >0) {
			header("Location: testselect.php?id=$pid&test=$_POST[test]&f=$datas[lastname], $datas[firstname] $datas[mi]");
			exit;
			}
			else
			$errmessage = "This ID is not in our records. Please enter last name to check.";
		}
	}

include "header.php"
?>
<p style="font-size:14px;color:red;">
<?=$errmessage?>
</p>
<div class style='display:inline-block;'>
<h2>Search Patient</h2>
To search for patient records, you can enter the patient id or fill in the patient's name and click Search.</p>
<form method='post' action='#'>
<input type='text' name='patientid' placeholder='Enter Patient ID'> OR
<input type='text' name='lastname' placeholder="Enter Last Name">
<input type='text' name='firstname' placeholder="Enter First Name">
</p>
<input type="submit" name="submit" value = "Search">
</div>
<div class='patientlist' style='display:inline-block;'>
<?=$toshow?>
</form>
</div>
</p>
<?php
include "footer.php";
?>
