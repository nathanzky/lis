<?php
include "connect.php";
$priv = $privy[editrights];
include "log.php";
$prv=$_GET[prv];
if($_POST[submit]=="Add Group") 
	{
		//save user if not exist, update if already exist
		//$pass = md5($_POST[password]);
		$links->query("INSERT IGNORE INTO usergroup VALUES ('','$_POST[groupname]','$_POST[groupperm]')") or die($links->error);
		//$links->query("UPDATE * INTO groupperm VALUES ('','','','')") or die($links->error);
		$links->query("INSERT IGNORE INTO groupperm VALUES ('', '$_POST[index]', '', '$_POST[groupperm]')") or die($links->error);;
		$message = "<font color='red'>Record have been save...</font>";
	}

	$sql = 'SELECT * FROM usergroup WHERE group_perm LIKE "$prv" ';
	$rec = $links->query($sql) or die($links->error);
/*
	$sql = "SELECT * FROM users";
	$rec = $links->query($sql) or die($links->error);

	while ($datas = $rec->fetch_assoc()) 
		{
			$list .=  "<tr><td>$datas[username]</td><td>$datas[title]</td><td>$datas[fullname]</td><td>$datas[prev]</td><td><a href='edituser.php?id=$datas[id]'>Update/Delete</a></td></tr>";
		}
*/
include "header.php";
?>
<?=$message?><?=$prv?>
<h2>Edit User Group</h2>
<?=$_POST[prv]?>
<p>
<form method='post' action='#'>
<p>
<input type='text' name='groupname' placeholder='Enter Group Name' value = "<?=$datas[groupname]?>" required> * 
<p>
<input type='text' name='groupperm' placeholder='Enter Permission Name' value = "<?=$datas[group_perm]?>" required> * 
</p>
</p>

<style>
table {border-collapse: collapse;padding:15px;border: 1px solid black;border-spacing: 10px}
th   {padding: 6px;border: 1px solid black;text-align:center; background:#eee;}
td    {padding: 6px;border: 1px solid black;text-align:center;}
</style>
<p>
<input type='submit' name='submit' value='Add Group'>
</p>

<h2>Set Privileges</h2>
<table>
<tr><th>Permission ID</th><th>Permission Code</th><th>Page</th><th>Select</th>
</tr>
<?=$list?> 
<!--
<tr><td>1</td><td>index</td><td>Homepage 	 </td><td><input name="index" type=checkbox value="index"></td></tr>
<tr><td>2</td><td>adduser</td><td>Add User   </td><td><input name="adduser" type=checkbox value="adduser"></td></tr>
<tr><td>3</td><td>addtest</td><td>Add Labtest</td><td><input name="addlabtest" type=checkbox value="addtest"></td></tr>
-->
</table>

</form>
<form method='post' action="index.php">
<input type='submit' name='submit' value='Back'>
</form>
</p>
</div>