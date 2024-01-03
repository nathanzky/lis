<?php
include "connect.php";
$priv = $privy[edituser];
include "log.php";
$id=$_GET[id];
//update user info
if($_POST[submit]=="Update!") 
	{
		$id = $_POST[id];
		if(!empty($_POST[password])) $pass=md5($_POST[password]);
		if(empty($_POST[password])) $pass = $_POST[oldpass];
		$links->query("Update users SET username='$_POST[username]', password='$pass', prev='$_POST[prev]', fullname='$_POST[fullname]', title='$_POST[title]' where id='$id'") or die($links->error);
   $message = "Account is successfully updated... <a href='adduser.php'>Back to user list</a>";	
	}

//delete the patient record when Delete button is clicked...
if($_POST[submit]=="Delete") 
	{
		$links->query("Delete from users where id = '$_POST[id]'") or die($links->error);
		$message = "<font size='6' color='red'>User is successfully deleted...</font>";
	}

$sql = "SELECT * FROM users where id='$id'";
$rec = $links->query($sql) or die($links->error);
$datas = $rec->fetch_assoc();

/*
if($datas[prev]=="Admin") $a="selected";
if($datas[prev]=="Front Desk") $a="selected";
if($datas[prev]=="Med Tech") $a="selected";
*/

include "header.php";
?>
<!--
<script>
	function deletes(id) {
	var ask = window.confirm("Are you sure you want to delete this record now?");
    if (ask) {
		document.location.href = "edituser.php?id=" + id +"&o=yes";
        }else {
			document.location.href = "edituser.php";
        }
 }	
 </script>
 -->
<?=$message?>
<h2>Add Users Form</h2>

<p>
<form method='post'>
<input type='hidden' name='id' value="<?=$datas[id]?>">
<p>
<input type='text' name='username' placeholder='User Name' value = "<?=$datas[username]?>" required> * 
</p>
<p>
<input type='password' name='password' placeholder='Password' value = ""> * 
<input type='hidden' name='oldpass' value = "<?=$datas[password]?>">
</p>
<p>
<input type='text' name='fullname'  value = "<?=$datas[fullname]?>" placeholder='Full Name' required> * 
</p>
<p>
<input type='text' name='title'  value = "<?=$datas[title]?>" placeholder='Job title' required> * 
</p>
<p>
<p>
<input type='hidden' name='permission'  value = "<?=$datas[prev]?>" placeholder='Permission' required>
</p>
<!--
<select name='prev'>
<option <?=$a?>>Admin</option>
<option <?=$f?>>Front Desk</option>
<option <?=$m?>>Med Tech</option>
</select>
-->

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
		<option value="<?=$datas[group_perm]?>" <?php if($prev==$datas[group_perm]) echo "selected"; ?>
		> <?=$datas[group_perm]?></option>
		<?php }
?>
	</select>
	

<?php  
/*	$prev=$datas[prev];
	$sqd = "select * from usergroup";
	$rec = $links->query($sqd) or die($links->error);
    echo "<select name='prev'". " id='usr'" . ">";
	while ($datas=$rec->fetch_assoc()) {
			echo "<option value='" . $datas[group_perm] . "'" . "selected='selected'" . ">" . $datas[group_perm] ."</option>";
		}
	echo "</select>"; 
	*/
?>


</p>
<p>
<input type='submit' name='submit' value='Update!'>
<input type='submit' name='submit' value='Delete'>
</p>
</form>
</p>
<form method='post' action="adduser.php">
<input type='submit' name='submit' value='Back'>
</form>
<?php
include "footer.php";
?>