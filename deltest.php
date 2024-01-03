<?php
include "connect.php";
$priv = $privy[deltest];
include "log.php";
$id = $_GET[id];
if($id=="") $id=$_POST[id];
if($_POST['submit']=="Yes, Delete It!") 
	{
	
	  //delete record...
	  $sql = "DELETE FROM labtest WHERE labid='$id'";
      $links->query($sql) or die($links->error);	
	 		header("Refresh:5 url=listlabtest.php");
			echo "<b><font color='red'>Record is successfully deleted.</b></font> <a href='listlabtest.php'> Back to <b>Laboratory Test List</b></a>";	 
		exit;
	} elseif($_POST['submit']=="No, Donot Delete")
	{
		header("Refresh:0 url=listlabtest.php");
		exit;
	}


	//Search the record 
	$sql = "SELECT * FROM labtest where labid='$id'";
	$rec = $links->query($sql) or die($links->error);
	$rows = $rec->fetch_assoc();
	include "header.php";
?>
<h2>Delete this record</h2>
Please double check the following record if you really want to delete it...  <br />
<form method="post" action="deltest.php" id="commentform" class="comment-form">
<p class="comment-form-email">
<b>Lab Test :</b>  <?=$rows[test]?> 
</p>
<p class="comment-form-email">
<b>Type of Test :</b>  <?=$rows[typeoftest]?></p>
<p class="comment-form-email">
<b>Sub Test : </b> <?=$rows[subtype]?></p>
<p class="comment-form-email">
<b>Normal Range :</b>  <?=$rows[normalmin]?> - <?=$rows[normalmax]?>
<input type='hidden' name='id' value='<?=$rows[labid]?>'>
</p>
<p class="comment-form-email"><b>Price :</b> <?=$rows[price]?>
</p>
<p class="comment-form-email">
Are you sure you want to delete this record now?<br />
<br />
<input type="submit" name='submit' value="Yes, Delete It!">
<input type="submit" name='submit' value="No, Donot Delete">
</p>
</form>
<?php
include "footer.php";
?>