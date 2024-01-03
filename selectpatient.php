<?php	
		if(isset($_POST[lastname]))
			{
		 $sql = "Select * from patient where lastname like '$_POST[lastname]%'";
		 $rl = $links->query($sql) or die($links->error);
 
		 if($rl->num_rows > 0)
			{
				$datas=$rec->fetch_assoc();
				//I list ang mga available records for the user to select
				$toshow="<h2>Patients that match your query</h2><br/>Select from the list of patient below or click New Patient to add a new record.<p><br />";
				
				while($datas=$rec->fetch_assoc()) 
					{
						$toshow .= "<a href='patienthistory2.php?id=$datas[patientid]&test=$_POST[test]&f=$datas[lastname], $datas[firstname] $datas[mi]'>$datas[patientid] - $datas[lastname], $datas[firstname], $datas[mi]</a><br/>";
					}
				
				$toshow.="</p>";
				$errmessage = "";
			}
			else{
			  $errmessage = "The name $_POST[lastname] does not exist in our database. Click New Patient to add.";	
			}
			
?>