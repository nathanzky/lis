<?php
include "connect.php";
$priv=$privy[patientlist];
include "log.php";
date_default_timezone_set("Asia/Dubai");

//delete the patient record when Delete button is clicked...
if($_GET[o]=='yes') 
	{
		$links->query("Delete from patient where patientid = '$_GET[id]'") or die($links->error);
		$message = "<font size='6' color='red'>Record is successfully deleted...</font>";
	}

//search if the user click the search button
if($_POST[submit]=="Filter") 
	{
	$sql = "Select * FROM patient where lastname like '$_POST[lastname]%' and firstname like '$_POST[firstname]%' ORDER BY lastname";
	$rec = $links->query($sql) or die($links->error);
	} 
	else
		{
		$sql = "SELECT * FROM patient ORDER BY patientid DESC LIMIT 50";
		$rec = $links->query($sql) or die($links->error);
		}
//Validate current date to get the age
function validateDate($date)
{
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
}

	function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
	
	if(validateDate("$date_1")==1){
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
	
   // echo $date_1 . "at". $date_2 ."<br>"; 
	//if(strlen($datetime1) < 5)   $datetime1 = date_create(date());
	//if(strlen($datetime1) < 5)   $datetime2 = date_create(date());
    $interval = date_diff($datetime1, $datetime2);
    
    return $interval->format($differenceFormat);
}
}

// List the patient list or result from search
while($datas=$rec->fetch_assoc())
	{
		if($_GET[c]!='r') $action =  "<td><a href='updatepatient.php?id=$datas[patientid]'>Update</a></td>
	 <td><input type='button' OnClick = \"deletes($datas[patientid]);\" value='Delete'></td>";	
		$df=dateDifference($datas[bday],date("Y-m-d"),'%y.%m');
		$tbl .= "<tr><td>$datas[patientid]</td><td>$datas[lastname], $datas[firstname] $datas[mi]</td>
		<td>$datas[sex]</td><td>$datas[bday]</td><td>$df</td>
		$action
		<td><a href='patienthistory.php?id=$datas[patientid]&fn=$datas[lastname], $datas[firstname] $datas[mi]'>History</a></td>
		</tr>";	
	}
	
	include "header.php";
	?>
	
	<style>
table {border-collapse: collapse;padding:15px;border: 1px solid black;border-spacing: 10px}
th,td    {padding: 6px;border: 1px solid black;}
</style>


   <script>
	function deletes(id) {
	var ask = window.confirm("Are you sure you want to delete this record now?");
    if (ask) {
		document.location.href = "patientlist.php?id=" + id +"&o=yes";
        }else {
			document.location.href = "patientlist.php";
        }
 }	
 </script>

 <?=$message?>
	<h2>List of Patients</h2>
	<div class="filterresult" >
	<span style="display:inline-block;">
	<br />
	<form method='post' action='#'>
	<b>Search : </b><input type='text' name='lastname' placeholder='Last Name (required)' required>  
	<input type='text' name='firstname' placeholder='Firstname (optional)'> 
	<input type='submit' name='submit' value='Filter'>
	</form>
	</span>
	<span style="display:inline-block;margin-right:10px;">
	<form method='post' action="#">
	<input type='submit' name='submit' value='Reset'>
	</form>
	</span>
	</div>
	<br />
		<br />
	<table>
	<tr>
	<th>Patient No.</th>
	<th>Patient Name</th>
	<th>Sex</th>
	<th>Bday</th>
	<th>Age</th>
	<th colspan='3'>Action</th>
	</tr>
	<?=$tbl?>
	</table>
	
	<?php
	include "footer.php";
	?>