<?php
error_reporting(E_ALL & ~E_NOTICE);
//$links = new mysqli ("localhost","root","","lis") or die("Can't connect to database");
include "connect.php";
//i reset ang coockies.. muna
setcookie("username", '', 0, "/"); 
setcookie("password", '',0, "/"); 
setcookie("prev", '', 0, "/"); 

if($_POST[submit]=="Login") 
	{
		//check if password is correct...
		$pass=md5($_POST[password]);
		$sql = "select * from users where username='$_POST[username]' and password='$pass'";
		$rec = $links->query($sql) or die($links->error);
		$datas = $rec->fetch_assoc();

		if($rec->num_rows > 0)
			{
		
				setcookie("username", $datas[username], time() + (86400 * 2), "/"); 
				setcookie("password", $datas[password],time() + (86400 * 2), "/"); 
				setcookie("prev", $datas[prev], time() + (86400 * 2), "/");
				setcookie("fullname", $datas[fullname], time() + (86400 * 2), "/");
				$lastlog = date("Y-d-m H:i:s");
				
				$links->query("UPDATE users SET lastlogin = '$lastlog' where username='$_POST[username]'") or die ($links->error);
				
				header("Location:index.php");
 exit;
			}else
				{
					$message = "<font size='4' color='red'>Invalid Username or Password...</font>";
				}
	}
 
echo $_COOKIE[username];
include "header.php";
?>
<div style="
     position:relative;
    top: 50%;
    left: 50%;
    width:20em;
    height:15em;
    margin-top: 100px; /*set to a negative number 1/2 of your height*/
	margin-bottom:90px;
    margin-left: -15em; /*set to a negative number 1/2 of your width*/
    border: 1px solid #ccc;
    background-color: #f3f3f3;
	padding-left:50px;
	padding-top:20px;"	>
	<?=$message?>
	<form method='post' action='#'>
	<h2>Login Page</h2>
	<p>
	<input type='text' name='username' required placeholder='Username'>
	</p>
	<p>
	<input type='password' name='password' required placeholder='Password'>
	</p>
		<p style='margin-left:30px;'>
	<input type='submit' name='submit' value='Login'>
	</p>
	</form>
</div>
<?php
include "footer.php";
?>