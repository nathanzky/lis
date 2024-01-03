<?php
if(empty($_COOKIE[username]) && empty($_COOKIE[password]) && empty($_COOKIE[prev]))
	{
		header("Refresh:5; url=login.php");
		echo "This page requires login, you will be redirected to login page in 5 seconds...";
		exit;
	} else 
		{

			//check for the privilege
		
			if (strpos($priv,$_COOKIE[prev]) < 1) 
				{
					header("Refresh:5; url=index.php");
					echo "<div class=".'"noaccess"' .">" . "You do not have enough privilege to work on this part. Click here if you are not redirected automatically." . "</div>";
					exit;
				}

		}

?>