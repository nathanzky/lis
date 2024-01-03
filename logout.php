<?php
setcookie("username", '', 0, "/"); 
setcookie("password", '',0, "/"); 
setcookie("prev", '', 0, "/"); 

header("Refresh:1; url=login.php");
?>