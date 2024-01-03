<?php
ini_set('display_errors', 'On');
include "connect.php";


$id = $_GET[id];
if($id=="") $id=$_POST[id];
if($_POST['submit']=="Update!") 
	{
	
	  //save record...
	  $test = $_POST['labtest'];
	  $tot = $_POST['typeoftest'];
	  $sub = $_POST['subtype'];
	  $normalmin =  $_POST['normalmin'];
	  $normalmax =  $_POST['normalmax'];
	  $flag = $_POST['flag'];
	  $price = $_POST['price'];
	 
	 $sql = "UPDATE labtest SET test='$test', typeoftest='$tot', subtype='$sub',normalmin='$normalmin',normalmax='$normalmax',flag='$flag',price='$price' WHERE labid='$id'";
    // $links->query("UPDATE labtest SET 'test'='$test','typeoftest'='$tot','subtype'='$sub','normalmin'='$normalmin','normalmax'='$normalmax','flag'='$flag','price'='$price' where labid='$id'") or die($links->error);	
	$links->query($sql) or die($links->error);	
     echo "<b><font color='red'>Record is successfully updated..</b></font>";
	}

	//get list of test
	$sql = "SELECT test from labtest group by test";
	$rec = $links->query($sql) or die ($links->error);
	while($datas = $rec->fetch_assoc())
	{
	   $options .="<option>$datas[test]</option>";
	}
 
	//Search the record 
	$sql = "SELECT * FROM labtest where labid='$id'";
	$rec = $links->query($sql) or die($links->error);
	$rows = $rec->fetch_assoc();
include "header.php";	
?>
<div>
<h2>Update Record</h2>
Use this form to update record you previously entered for this facility's laboratory services. 
</br>All fields with * are required. If no price just enter 0 and NA for field that value is not required. <br /></br>
<span style="display:inline-block;">
<form method="post" action="#">
<p><input type="text" name="labtest" list="labtest" value='<?=$rows[test]?>' placeholder = "Lab Test" required size="30" maxlength="100"> 
<datalist id="labtest">
 <?=$options?>
</datalist>*
</br>
</br>
<input type='hidden' name='id' value='<?=$rows[id]?>'>
<input type="text" name="typeoftest"  value='<?=$rows[typeoftest]?>' placeholder = "Type Laboratory Test"  required size="30" maxlength="100" > * </br></br>
<input type="text" name="subtype"  value='<?=$rows[subtype]?>' placeholder = "Sub type"  required size="30" maxlength="100" > * </br></br>
Normal Range: Min>
<input type="text" name="normalmin"  value='<?=$rows[normalmin]?>' placeholder = "Normal Min" size="20"  > 
Max>
<input type="text" name="normalmax"  value='<?=$rows[normalmax]?>' placeholder = "Normal Max" size="20"  ></br></br>
<!-- <input type="text" name="flag"  value='<?=$rows[flag]?>' placeholder = "Flag" size="10" > -->
<!-- Flag? <input type="checkbox" name="flag" value="YES" <?php if($rows[flag]=="YES") echo "checked" ?>>  </br></br> -->
<input type="text" name="price"   value='<?=$rows[price]?>' placeholder = "Price" required size="30"  > * </br></br>
<input type="submit" name='submit' value="Update!">
</form>
</span>
<span style="display:inline-block;margin-right:10px;">
<form method="get" action="listlabtest.php">
    <button type="submit">Back</button>
	</br>
</form>
</span>
</div>
<!--
<div style="display:block">
<span style="display:inline-block;margin-right:10px;">
<form>
<input type="submit" name='submit' value="Previous"> 
</form>
</span>
<span style="display:inline-block;margin-right:10px;">
<form>
<input type="submit" name='submit' value="Next">
</form>
</span>
</br>
</div> -->
<?php
include "footer.php";
?>