<?php
error_reporting(E_ALL & ~E_NOTICE);
include "connect.php";
$priv = $privy[index];
include "log.php";

if($_POST[submit]=="Update Login Details!")
	{
		$pass=md5($_POST[password]);
		$links->query("Update users SET username='$_POST[username]', password='$pass', fullname='$_POST[fullname]' where username='$_COOKIE[username]'") or die($links->error);
		header("Location:login.php");
	}

$sql = "SELECT * FROM users where username='$_COOKIE[username]'";
$rec = $links->query($sql) or die($links->error);
$datas = $rec->fetch_assoc();

if($_COOKIE[prev]=="Admin")
	{
	 $content = <<<con
	 </div>
<div class="welcome" style="display: inline-block; width: 60%"> 
<h2>Welcome back Admin</h2>
<br />
Your last login was $datas[lastlogin]
<br />
<p>
<img src='indeximage.jpg'>
</div>

<div class="welcome" style="display: inline-block; width: 35%"> 
<h3>Quick Links</h3>
<a href='addtest.php'>Add Test</a> <br />
<a href='adduser.php'>Add / Update User</a> <br />
<a href='newpatient.php'>Add Patient</a> <br />
<a href='patientlist.php'>List of patients (Edit, Delete, history)</a> <br />
<a href='pending.php'>Pending Test (update, add result , delete)</a> <br />
<a href='searchpatient.php'>Search Patient (New Patient Request)</a> <br />
<a href='settings.php'>Settings</a> <br />
<a href='testresultreport.php'>Print Test Result</a> <br />
<a href='adduser.php'>Add / Update User</a> <br />
<a href='backupdatabase.php'>Backup Database</a> <br />
</div>
con;
	}elseif($_COOKIE[prev]=="Front Desk") 
		{
		$content = <<<con
		</div>		
<div class="welcome" style="display: inline-block; width: 60%"> 
<h2>Welcome back $datas[username]</h2>
<br />
Your last login was $datas[lastlogin]
<br />
<p>
<img src='indeximage.jpg'></img>
</div>
<div class="quicklinksarea" style="display: inline-block; width: 35%; float: right;"> 
<h3>Quick Links</h3>
<form method="post" action="#">
<a href='newpatient.php'>Add Patient</a> <br />
<a href='patientlist.php'>List of patients (Edit, Delete, history)</a> <br />
<a href='pending.php'>Pending Test (update, add result , delete)</a> <br />
<a href='searchpatient.php'>Search Patient (New Patient Request)</a> <br />
<a href='billing.php'>Billing</a> <br />
<a href='patientlist.php'>Patient List</a> <br />
<a href='dailysales.php'>Daily Sales</a> <br />
</div>
con;
			
}
elseif($_COOKIE[prev]=="Cashier") 
		{
		$content = <<<con
		</div>		
		<div class="quicklinksarea" style="display: inline-block; width: 35%"> 
<h2>Welcome back $datas[username]</h2>
<br />
Your last login was $datas[lastlogin]
<br />
<p>
<img src='indeximage.jpg'>
<!--
<h3>Account Details</h3>
<form method="post" action="#">
<input type="text" name="username" value="$datas[username]" required placeholder="Username"><br />
<input type="password" name="password" value="" required placeholder="Password"><br />
<input type="text" name="fullname" value="$datas[fullname]" required placeholder="Full Name"><br /><br />
<input type="submit" value="Update Login Details!" name="submit">
</form>
-->
</div>
<div class="quicklinksarea" style="display: inline-block; width: 35%; float: right;"> 
<h3>Quick Links</h3>
<form method="post" action="#">
<a href='billing.php'>Billing</a> <br />
<a href='patientlist.php'>Patient List</a> <br />
<a href='dailysales.php'>Daily Sales</a> <br />
</div>
con;
			
}else
		{
$content = <<<con
<div class="welcome" style="display: inline-block;"> 
<h2>Welcome back $datas[username]</h2>
<br />
Your last login was $datas[lastlogin]
<br />
<p>
<img src='indeximage.jpg'>
</div>
<!--
<h3>Account Details</h3>
<form method="post" action="#">
<input type="text" name="username" value="$datas[username]" required placeholder="Username"><br />
<input type="password" name="password" value="" required placeholder="Password"><br />
<input type="text" name="fullname" value="$datas[fullname]" required placeholder="Full Name"><br /><br />
<input type="submit" value="Update Login Details!" name="submit">
</form>
-->
<div class="quicklinksarea" style="display: inline-block; float:right;"> 
<h3>Quick Links</h3>
<a href='pending.php'>Pending Test (update, add result , delete)</a> <br />
<a href='patienthistory.php'>Update Results(update, add result , delete)</a> <br />
</div>
con;
}
include "header.php";
echo $content;
include "footer.php";
?>
