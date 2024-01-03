<?php
include "connect.php";
$priv = $privy[addtest];
include "log.php";
include "header.php";
if($_POST['submit']=="Cancel") 
{
	header (index.php);
}
if($_POST['submit']=="Save!") 
	{
	//save the record to server... but double check first if the same record is already exist
	$sql = "SELECT * from labtest where  test='' And typeoftest='' and subtype =''";
	$rec = $links->query($sql) or die($links->error);
	
	if($rec->num_rows > 0) 
	{
	  echo "This record is already exist in the database....";	
	}else
	{
	  //save record...
	  $test = $_POST['labtest'];
	  $tot = $_POST['typeoftest'];
	  $sub = $_POST['subtype'];
	  $normalmin =  $_POST['normalmin'];
	  $normalmax =  $_POST['normalmax'];
	  $flag = $_POST['flag'];
	  $price = $_POST['price'];
     $links->query("Insert into labtest values ('','$test','$tot','$sub','$normalmin','$normalmax','$flag','$price')") or die($links->error);	
     echo "<b><font color='red'>New Lab Test Record Added....</b></font>";	 
	 
	}
	
	}

	//get list of test
	
	$sql = "SELECT test from labtest group by test";
	$rec = $links->query($sql) or die ($links->error);
	while($datas = $rec->fetch_assoc())
	{
	   $options .="<option>$datas[test]</option>";
	}
?>
<h2>Type of Test Entry Form</h2>
<p>
Use this form to enter all type of laboratory testing in this laboratory facility. </br>All fields with * are required. If no price just enter 0 and NA for field that value is not required. <br />
</p>
<div style="display:inline-block;">
<form method="post" action="addtest.php" id="commentform" class="comment-form">
<p><input type="text" name="labtest" list="labtest" placeholder = "Lab Test" required size="30" maxlength="100" > 
<datalist id="labtest">
 <?=$options?>
</datalist>
*
</p>

<p><input type="text" name="typeoftest" placeholder = "Type Laboratory Test"  required size="30" maxlength="100" > * </p>
<p><input type="text" name="subtype" placeholder = "Sub type"  required size="30" maxlength="100" > * </p>
<p><input type="text" name="normalmin"  placeholder = "Normal Min" size="20" > 
<input type="text" name="normalmax"  placeholder = "Normal Max" size="20"  > 
<!-- Flag? <input type="checkbox" name="flag" value="YES"> </p> -->
<p><input type="text" name="price"  placeholder = "Price" required size="30" maxlength="100" > * </p>
<input type="submit" name='submit' value="Save!">
</form>
</div>
<div style="display:inline-block;margin-right:10px;">
	<form method='post' action="index.php">
	<input type='submit' name='submit' value='Back'>
	</form>
</div>
<?php

?>