<?php
ini_set('display_errors', 'On');
include "connect.php";
$priv = $privy[settemplate];
include "log.php";
if($_POST[submit]=="Add Template") 
	{
		//save discount if not exist, update if already exist
		$links->query("INSERT IGNORE INTO resulttemps VALUES ('','$_POST[temptype]','$_POST[tempname]','$_POST[tempresult]','$_POST[tempimpression]')") or die($links->error);
		$message = "<font color='red'>Record is saved...</font>";
	}

	$sql = "SELECT * FROM resulttemps";
	$rec = $links->query($sql) or die($links->error);

	while ($datas = $rec->fetch_assoc()) 
		{
			$list .=  "<tr><td>$datas[temptype]</td><td>$datas[tempname]</td>
			$datas[enabled]</td><td><a href='edittemplate.php?tid=$datas[tempid]'>Edit/Delete</a></td></tr>";
		}
include "header.php";
?>
<?=$message?>
<h2>Add Template</h2>
<div style="display:inline-block;">
<p>
<form method='post' action='#'>
<p>
<input type='text' name='temptype' placeholder='Category' required></input> * 
</p>
<p>
<input type='text' name='tempname' placeholder='Template Name' required> </input> * 
</p>
<p>
<textarea name='tempresult' placeholder='Result Template' required></textarea> *
</p>
<p>
<textarea name='tempimpression' placeholder='Impression Template' required></textarea> * 
</p>
<p>
<input type='submit' name='submit' value='Add Template'>
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
<tr><th>Template Type</th><th>Template Name</th><th>Action</th>
</tr>
<?=$list?>
</table>

<?php	
}
include "footer.php";
?>