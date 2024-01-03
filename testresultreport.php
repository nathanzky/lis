<?php
include "connect.php";
$priv = $privy[testresultreport];
include "log.php";
if($_POST[submit]=="Search Patient!")
	{
		if(isset($_POST[patientid]))
		{
		 $sql = "Select * from patient where patientid='$_POST[patientid]'";
		 $rec = $links->query($sql) or die($links->error);
		 if($rec->num_rows > 0)
			{
				$datas=$rec->fetch_assoc();
				header("Location: patienthistory.php?id=$datas[patientid]&fn=$datas[lastname], $datas[firstname] $datas[mi]");
				exit;
			}else
			{
			  $message = "This Patient ID is not exist from our database....";	
			}
		}
		
		if(isset($_POST[lastname]))
			{
		 $sql = "Select * from patient where lastname='$_POST[lastname]' and firstname='$_POST[firstname]'";
		 $rec = $links->query($sql) or die($links->error);
 
		 if($rec->num_rows == 1)
			{
				$datas=$rec->fetch_assoc();
				header("Location: patienthistory.php?id=$datas[patientid]&fn=$datas[lastname], $datas[firstname] $datas[mi]");
				exit;
			}elseif ($rec->num_rows > 1)
			{
				//I list ang mga available records for the user to select
				$toshow="<h2>Patients that match your query</h2><br />Select from the list of patient below...<p><br />";
				
				while($datas=$rec->fetch_assoc()) 
					{
						$toshow .= "<a href='patienthistory.php?id=$datas[patientid]&&fn=$datas[lastname], $datas[firstname] $datas[mi]'>$datas[patientid] - $datas[lastname], $datas[firstname], $datas[mi]</a><br />";
					}
				
				$toshow.="</p>";
				$errmessage = "";
			}
			else{
			  $errmessage = "$_POST[lastname], $_POST[firstname] is not exist from our database....";	
			}
			}
		
	}

	
include "header.php";
?>
<p style="font-size:14px;color:red;">
<?=$errmessage?>
</p>
<h2>Search Patient</h2>
<p>
To search patient, you need to enter his/patient id then click search button or if you do not know the
patient id use the Last name and First name field.</p>
<form method='post' action='#'>

<p>
<input type='text' name='patientid' placeholder='Enter Patient ID'> OR <br /><br />
<input type='text' name='lastname' placeholder="Enter Last Name"> And 
<input type='text' name='firstname' placeholder = "Enter First Name">
</p>



<p align='center'>
<br />
<input type="submit" name="submit" value = "Search Patient!">
</p>
</form>

<?=$toshow?>
<?php
include "footer.php";
?>