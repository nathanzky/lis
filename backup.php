<?php
//ini_set('display_errors', 'On');
date_default_timezone_set("Asia/Dubai");
include "connect.php";
$priv = $privy[backupdb];
include "log.php";

//set backup filename and parameters
//$mysqldump = "/Applications/MAMP/Library/bin/mysqldump";
// for windows $mysqldump = "C://xamppinstall/bin/mysqldump";
$mysqldump = "C:\\\\xampp\\\\mysql\\\\bin\\\\";
$savepath = "C:\\\\Users\\\\nsastrillo.GETGROUP\\\\Downloads\\\\";
$filename = "lis-" . date("d-m-Y") . ".sql";
//$mime = "application/x-gzip";
//$mime = "C:\Program Files\WinRAR\Rar";
header( "Content-Type: " . $mime );
header( 'Content-Disposition: attachment; filename="' . $filename . '"' );

// Perform Backup otherwise print error code
//exec("/Applications/MAMP/Library/bin/mysqldump --opt -h $dbhost -u $dbuser -p$dbpass $dbname | gzip --best");
//exec('/Applications/MAMP/Library/bin/mysqldump --user=$dbuser --password=$dbpass --host=$dbhost $dbname > /Applications/MAMP/htdocs/lis/db_bkp/dbbkp.sql');
//print_r($output);
//$cmd = "$mysqldump -u $dbuser --password=$dbpass $dbname | gzip --best";   
//$cmd = "$mysqldump -h $dbhost -u $dbuser -p $dbpass $dbname | gzip --best";
//$cmd = "mysqldump -unathan -p123456 >lis.sql";
//shell_exec('mysqldump --user=nathan --password=123456 --host=localhost japslis > $filename');
//exec("C:\xampp\mysql\bin\mysqldump");
//$cmd = 'C:\xampp\mysql\bin\mysqldump --opt --user=root --password=123456 --host=localhost lis >' . $filename;
$cmd = $mysqldump . 'mysqldump --opt --host=localhost --user=nathan --password=123456 japslis >'.$savepath .'\\\\' .$filename;
exec($cmd);
exit(0);
?>