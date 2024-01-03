<?php
ini_set('display_errors', 'On');
include "connect.php";
$priv = $privy[settemplate];
include "log.php";
$enabled=$_GET[enabled];
$tid=$_GET[tid];
if($_POST[submit]=="Delete") 
	{
		//delete the discount...
		$links->query("Delete from resulttemps where tempid='$tid'") or die($links->error);
		$message = "<font size='6' color='red'>Template is successfully deleted...</font>";
		header("Refresh:2 url=settemplate.php");
	}

if($_POST[submit]=="Update!") 
	{
		$id = $_POST[id];
		$links->query("UPDATE resulttemps SET temptype='$_POST[temptype]', tempname='$_POST[tempname]', tempresult='$_POST[tempresult]', tempimpression='$_POST[tempimpression]'  where tempid='$tid'") or die($links->error);
   $message = "Template is successfully updated... <a href='settemplate.php'>Click to go back to templatelist</a>";	
   header("Refresh:0 url=settemplate.php");
	}
	
$active="checked";

$sql = "SELECT * FROM resulttemps where tempid='$tid'";
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
<h2>Edit Template Form</h2>

<p>
<form method='post' action='#'>
<input type='hidden' name='tid' value="<?=$datas[tempid]?>">
<p>
<input type='text' name='temptype' placeholder='Template Type' value = "<?=$datas[temptype]?>" required> * 
</p>
<p>
<input type='text' name='tempname'  value = "<?=$datas[tempname]?>" placeholder='Template Name' required> * 
</p>
<p>
<textarea name='tempresult'  placeholder='Result Template' required> <?=$datas[tempresult]?></textarea>* 
</p>
<p>
<textarea name='tempimpression'  placeholder='Impression Template' required> <?=$datas[tempimpression]?></textarea>* 
</p>
<p>
<input type='submit' name='submit' value='Update!'>
<input type='submit' name='submit' value='Delete'>
</p>
</form>


<?php
include "footer.php";
?>