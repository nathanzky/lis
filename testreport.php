<?php
$con="true";
include "connect.php";
$priv = $privy[dailysales];
include "log.php";
date_default_timezone_set("Asia/Manila");
$nowdate = date('Y-m-d');
$cdate=$_POST[cdate];
$tdate = $_POST[tdate];

if($cdate == "") $cdate=date("Y-m-d");

if(!empty($_POST[condition1])){
$testtype="AND labtest.test='$_POST[condition1]' ";    
}else{
$testtype="";    
}
//echo $testtype;

if(!empty($_POST[condition2])){
$tot="AND labtest.typeoftest='$_POST[condition2]' ";    
}else{
$tot="";    
}
//echo $tot;

if(!empty($_POST[condition3])){
$subtype="AND test.labtestid="."'$_POST[condition3]' ";    
}else{
$subtype="";    
}
//echo $subtype;

if(!empty($_POST[viewbydate])){
$viewbydate=$_POST[viewbydate];
}else{
$viewbydate="datereceived";
}
//echo $viewbydate;

if(!empty($tdate))
	{
		$sql = "SELECT DISTINCT test.testid,test.patientid, test.labtestid, test.daterelease, test.datereceived, test.salesid,patient.patientid, patient.lastname, patient.firstname, patient.mi, labtest.labid, labtest.test, labtest.typeoftest, labtest.subtype FROM patient,test,labtest WHERE patient.patientid=test.patientid AND labtest.labid=test.labtestid $testtype $tot $subtype AND test.$viewbydate BETWEEN '$cdate' AND '$tdate' ORDER BY test.$viewbydate DESC";
	$range = date('M d, Y',strtotime($cdate))." to ".date('M d, Y',strtotime($tdate));
    }else{
		$sql = "SELECT DISTINCT test.testid,test.patientid, test.labtestid, test.daterelease, test.datereceived, test.salesid,patient.patientid, patient.lastname, patient.firstname, patient.mi, labtest.labid,labtest.test, labtest.typeoftest, labtest.subtype  FROM patient,test,labtest WHERE patient.patientid=test.patientid AND labtest.labid=test.labtestid $testtype $tot $subtype AND test.datereceived='$nowdate' ORDER BY test.datereceived DESC";
	$range = "today ".date('M d, Y',strtotime($nowdate));	
	}		
    
$rec = $links->query($sql) or die($links->error);
$num_rows = mysqli_num_rows($rec);
$cr = 0;


while($datas=$rec->fetch_assoc()) 
	{  
        
        if(!empty($datas[daterelease]))
        {
        $cr++;
		$datereleased=$datas[daterelease];
        }
		else{
			$datereleased="<span class='pending'>PENDING</span>";
		}

	   $listing .= "<tr><td>$datas[datereceived]</td><td>$datas[salesid]</td><td width='15%'>$datas[lastname],$datas[firstname] $datas[mi].</td><td>$datas[test]-$datas[typeoftest]-$datas[subtype]</td><td>$datereleased</td></tr>";
	}
    
include "header.php";	
?>

	<style>
table {border-collapse: collapse;padding:15px;border: 1px solid black;border-spacing: 10px}
th,td    {padding: 6px;border: 1px solid black;}
.pending {
	color: #f00;
}
</style>

<p>
<form method='post' action='#'>
<p>
<b>Filter By:</b></br>
<input type='checkbox' name='viewbytest' value='1'> Test</input>
<select id='select1' name='condition1'>
<option value=''>None</option>    
<?php
$sql = "SELECT DISTINCT test FROM labtest ORDER BY test";
$rec = $links->query($sql) or die($links->error);
$defcolor = "#fff";
while($datas=$rec->fetch_assoc())
	{
echo "<option value='"."$datas[test]'".">".$datas[test]."</option>";
}
?>
</select>
</br>
<!-- end of viewbytest -->
<input type='checkbox' name='viewbytot' value='2'> Type of Test</input>
<select id='select2' name='condition2'>
<option value=''>None</option>    
<?php
$sql = "SELECT DISTINCT test,typeoftest FROM labtest ORDER BY test, typeoftest";
$rec = $links->query($sql) or die($links->error);
$defcolor = "#fff";
while($datas=$rec->fetch_assoc())
	{
        if(strtoupper($datas[test])!="LABORATORY"){
echo "<option value='"."$datas[typeoftest]'".">".$datas[test]."-".$datas[typeoftest]."</option>";
        }else{
echo "<option value='"."$datas[typeoftest]'".">".$datas[typeoftest]."</option>";    
        }
}
?>
</select>
</br>
<!-- end of viewbytot -->
    <input type='checkbox' name='viewbysubtype' value='3'> Subtype</input>
<select id='select3' name='condition3'>
<option value=''>None</option>    
<?php
$sql = "SELECT DISTINCT test,typeoftest,subtype,labid FROM labtest ORDER BY test,typeoftest,subtype,labid";
$rec = $links->query($sql) or die($links->error);
$defcolor = "#fff";
while($datas=$rec->fetch_assoc())
	{
        if(strtoupper($datas[test])!="LABORATORY"){
echo "<option value='"."$datas[labid]'".">".$datas[test]."-".$datas[typeoftest]."</option>";
        }else{
echo "<option value='"."$datas[labid]'".">".$datas[typeoftest]."-".$datas[subtype]."</option>";    
        }
}
?>
</select>
</br>
<!-- end of viewbysubtype -->
<input type='radio' name='viewbydate' value='datereceived'> Date Received</input></br>
<input type='radio' name='viewbydate' value='daterelease'> Date Released</input></br>
</p>
<p>
<b>Select Date Range</b> <br />
From:
<input type="date" name="cdate" min="2016-01-12" >
To:
<input type="date" name="tdate" min="2016-01-12" > 

<input type='submit' name='submit' value='Filter'>
</form>
</p>

<div>
<h2>Laboratory Test Report</h2>
<?php
 if(strlen($listing) > 10) {echo "<h4>$range</h4>";}
	 ?>
	 <table>
          <tr><td colspan='4'><b>Total Number of Tests Conducted</b></td><td colspan='1'><b><?=$num_rows?></b></td></tr>
          <tr><td colspan='4'><b>Number of Results Released</b></td><td colspan='1'><b><?=$cr?></b></td></tr>
	 <tr>
	 <th style="width:10%">Date Received</th>
	 <th style="width:10%">Test ID</th>
	 <th style="width:20%">Patient </th>
	 <th style="width:25%">Type of Test</th>
	 <th style="width:10%">Date Released</th>
	 </tr>
	 <?=$listing?>
     
	 <tr><td colspan='5'></td></tr>
	 </table>
	 
	 <p align="center">
 <form method='post' action='printtestreport.php' target="_blank">
	 <input type='hidden' name='numrows' value='<?=$num_rows?>'>
	 <input type='hidden' name='cr' value='<?=$cr?>'>
	 <input type='hidden' name='cdate' value='<?=$cdate?>'>
	 <input type="hidden" name='tdate' value='<?=$tdate?>'>  
	 <input type="hidden" name='nowdate' value='<?=$nowdate?>'>  
	 <input type="hidden" name='testtype' value='<?=$testtype?>'>  
	 <input type="hidden" name='condition1' value='<?=$_POST[condition1]?>'>  
	 <input type="hidden" name='tot' value='<?=$tot?>'>  
	 <input type="hidden" name='condition2' value='<?=$_POST[condition2]?>'>  
	 <input type="hidden" name='subtype' value='<?=$subtype?>'>  
	 <input type="hidden" name='condition3' value='<?=$_POST[condition3]?>'>  
	 <input type="hidden" name='viewbydate' value='<?=$viewbydate?>'>  
	  <input type="hidden" name='range' value='<?=$range?>'>  
	 <input type='submit' name='submit' value='Print Report'>
 </form>	
    
     </div>
     </div>

<script>
$('[name="viewbysubtype"]').on('change', function() {
    $('#select3').toggle(this.checked);
}
).change();
$('[name="viewbytest"]').on('change', function() {
  $('#select1').toggle(this.checked);
}
).change();
$('[name="viewbytot"]').on('change', function() {
  $('#select2').toggle(this.checked);
}
).change();
</script>
<?php
include "footer.php";
?>
	 