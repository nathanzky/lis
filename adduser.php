<?php
include "connect.php";
$priv = $privy[adduser];
include "log.php";
if($_POST[submit]=="Add User!") 
	{
		//save user if not exist, update if already exist
		$pass = md5($_POST[password]);
		$links->query("INSERT IGNORE INTO users VALUES ('','$_POST[username]','$pass','$_POST[prev]','','$_POST[fullname]','$_POST[title]')") or die($links->error);
		$message = "<font color='red'>Record have been save...</font>";
	}

	$sql = "SELECT * FROM users";
	$rec = $links->query($sql) or die($links->error);

	while ($datas = $rec->fetch_assoc()) 
		{
			$list .=  "<tr><td>$datas[username]</td><td>$datas[title]</td><td>$datas[fullname]</td><td><a href='editrights.php?prv=$datas[prev]'> $datas[prev]</a></td><td><a href='edituser.php?id=$datas[id]'>Update/Delete</a></td></tr>";
		}
include "header.php";
?>
<?=$message?>
<h2>Add Users Form</h2>

<p>
<form method='post' action='#'>
<p>
<input type='text' name='username' placeholder='User Name' required> * 
</p>
<p>
<input type='text' name='password' placeholder='Password' required> * 
</p>
<p>
<input type='text' name='fullname' placeholder='Full Name' required> * 
</p>
<p>
<input type='text' name='title' placeholder='Job title' required> * 
</p>
<p>
<?php  
	$prev=$datas[prev];
	$sqd = "select * from usergroup";
	$rec = $links->query($sqd) or die($links->error);
	?>
	<select name='prev' id='usr'>
	<?php 
   //  echo "<select name='prev'". " id='usr'" . ">";
	while ($datas=$rec->fetch_assoc()) { 
		?>
		<option value="<?=$datas[group_perm]?>"> <?=$datas[group_perm]?></option>
		<?php }
?>
	</select>
</p>
<p>
<input type='submit' name='submit' value='Add User!'>
</p>
</form>
<form method='post' action="index.php">
<input type='submit' name='submit' value='Back'>
</form>
</p>
</div>

	

<?php
if($list!="") {
	?>
<style>
table {border-collapse: collapse;padding:15px;border: 1px solid black;border-spacing: 10px}
th   {padding: 6px;border: 1px solid black;text-align:center; background:#eee;}
td    {padding: 6px;border: 1px solid black;text-align:center;}
</style>
<h2>List of users</h2>
<table>
<tr><th>User Name</th><th>Job Title</th><th>Full Name Name</th><th>Privilege</th><th>Action</th>
</tr>
<?=$list?>
</table>
<?php	
}
?>
