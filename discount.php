<?php
ini_set('display_errors', 'On');
include "connect.php";
$priv = $privy[settemplate];
include "log.php";
if($_POST[submit]=="Add Discount!") 
	{
		//save discount if not exist, update if already exist
		$links->query("INSERT IGNORE INTO discount VALUES ('','$_POST[discname]','$_POST[discpercent]','$_POST[enabled]')") or die($links->error);
		$message = "<font color='red'>Record is saved...</font>";
	}

	$sql = "SELECT * FROM discount";
	$rec = $links->query($sql) or die($links->error);

	while ($datas = $rec->fetch_assoc()) 
		{
			$list .=  "<tr><td>$datas[discname]</td><td>$datas[discpercent]</td><td>
			$datas[enabled]</td><td><a href='editdiscount.php?id=$datas[discid]'>Update/Delete</a></td></tr>";
		}
include "header.php";
?>
<?=$message?>
<h2>Add Discount</h2>
<div style="display:inline-block;">
<p>
<form method='post' action='#'>
<p>
<input type='text' name='discname' placeholder='Discount Name' required> * 
</p>
<p>
<input type='text' name='discpercent' placeholder='Discount Percentage' required> * 
</p>
<p>
<input type="checkbox" name="enabled" value="YES" > Enabled? 
</p>
<p>
<input type='submit' name='submit' value='Add Discount!'>
</p>
</form>
</p>
</div>
<div style="display:inline-block;margin-right:10px;">
	<form method='post' action="index.php">
	<input type='submit' name='submit' value='Cancel'>
	</form>
</div>
<?php
if($list!="") {
	?>
<style>
table {border-collapse: collapse;padding:15px;border: 1px solid black;border-spacing: 10px}
th   {padding: 6px;border: 1px solid black;text-align:center; background:#eee;}
td    {padding: 6px;border: 1px solid black;text-align:center;}
</style>
<h2>List of Discount</h2>
<table>
<tr><th>Discount Name</th><th>Discount Percentage</th><th>Enabled</th><th>Action</th>
</tr>
<?=$list?>
</table>

<?php	
}
include "footer.php";
?>