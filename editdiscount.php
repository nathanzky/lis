<?php
ini_set('display_errors', 'On');
include "connect.php";
$priv = $privy[editdiscount];
include "log.php";
$enabled=$_GET[enabled];
$id=$_GET[id];
if($_POST[submit]=="Delete") 
	{
		//delete the discount...
		$links->query("Delete from discount where discid='$id'") or die($links->error);
		$message = "<font size='6' color='red'>Discount is successfully deleted...</font>";
		header("Refresh:2 url=discount.php");
	}

if($_POST[submit]=="Update!") 
	{
		$id = $_POST[id];
		$links->query("UPDATE discount SET discname='$_POST[discname]', discpercent='$_POST[discpercent]', enabled='$_POST[enabled]' where discid='$id'") or die($links->error);
   $message = "Discount is successfully updated... <a href='discount.php'>Click to go back to discount list</a>";	
   header("Refresh:0 url=discount.php");
	}
	
$active="checked";

$sql = "SELECT * FROM discount where discid='$id'";
$rec = $links->query($sql) or die($links->error);

$datas = $rec->fetch_assoc();
/* if($datas[prev]=="Admin") $a="selected";
if($datas[prev]=="Front Desk") $f="selected";
if($datas[prev]=="Med Tech") $m="selected"; */
include "header.php";
?>

<style>
table {border-collapse: collapse;padding:15px;border: 1px solid black;border-spacing: 10px}
th,td    {padding: 6px;border: 1px solid black;}
</style>


<?=$message?>
<h2>Edit Discount Form</h2>

<p>
<form method='post' action='#'>
<input type='hidden' name='id' value="<?=$datas[discid]?>">
<p>
<input type='text' name='discname' placeholder='Discount Name' value = "<?=$datas[discname]?>" required> * 
</p>
<p>
<input type='text' name='discpercent'  value = "<?=$datas[discpercent]?>" placeholder='Disc Percentage' required> * 
</p>
<p>
<input type="checkbox" name="enabled" value="YES" <?php if ($datas[enabled] == 'YES') echo "checked='checked'"; ?>> Enabled? 
</p>
<p>
<input type='submit' name='submit' value='Update!'>
<input type='submit' name='submit' value='Delete'>
</p>
</form>


<?php
include "footer.php";
?>