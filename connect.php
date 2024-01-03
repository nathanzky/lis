<?php
error_reporting(E_ALL & ~E_NOTICE);


$dbhost="localhost";
$dbuser="protindc_lis";
$dbpass="2pmpU9aqEWVN";
$dbname="protindc_lis";
$links = new mysqli ($dbhost,$dbuser,$dbpass,$dbname) or die("Can't connect to database");

if($con=="true") {
$config = file_get_contents("config.php");
$config = explode("\n",$config);
}
/*
Note:
$config[0] - Laboratory name
$config[1] - Address of laboratory 
$config[2] - Phone Number 
$config[3] - Logo of the company 
$config[4] - License Number of the laboratory
$config[5] - Med Tech 
$config[6] - Pathology
*/

/*
Note:
$config[0] - Laboratory name
$config[1] - Address of laboratory 
$config[2] - Phone Number 
$config[3] - Logo of the company 
$config[4] - License Number of the laboratory
$config[5] - Med Tech 
$config[6] - Pathology
*/
//list ng mga files and their privileges
$privy['addtest']=" Admin";
$privy['adduser']=" Admin";
$privy['createpdf']=" Admin,Front Desk,Cashier";
$privy['deltest']=" Admin,Front Desk";
$privy['labresult']=" Admin,Med Tech,Pathologist,Sonologist,Radiologist";
$privy['listlabtest']=" Admin";
$privy['newpatient']=" Admin,Front Desk";
$privy['patienthistory']=" Admin,Front Desk,Med Tech,Pathologist,Sonologist,Radiologist,Cashier";
$privy['patientlist']=" Admin,Front Desk,Cashier";
$privy['pending']=" Admin,Front Desk, Med Tech,Pathologist,Sonologist,Radiologist";
$privy['previewrequest']=" Admin,Front Desk";
$privy['printoutresult']=" Admin,Front Desk,Med Tech,Pathologist,Sonologist,Radiologist";
$privy['printresult']=" Admin,Med Tech,Pathologist,Sonologist,Radiologist";
$privy['searchpatient']=" Admin,Front Desk";
$privy['settings']=" Admin";
$privy['testresultreport']=" Admin,Front Desk";
$privy['testselect']=" Admin,Front Desk";
$privy['updatepatient']=" Admin,Front Desk";
$privy['updaterequest']=" Admin,Front Desk";
$privy['viewtest']=" Admin,Front Desk";
$privy['viewupdaterequest']=" Admin,Front Desk";
$privy['index']=" Admin,Front Desk,Med Tech,Pathologist,Sonologist,Radiologist,Cashier";
$privy['billing']=" Admin,Front Desk,Cashier";
$privy['bill']=" Admin,Front Desk,Cashier";
$privy['printbilling']=" Admin,Front Desk,Cashier";
$privy['dailysales']=" Admin,Front Desk,Cashier";
$privy['printsales']=" Admin,Front Desk,Cashier";
$privy['edituser']=" Admin";
$privy['updateresult']=" Admin,Med Tech,Pathologist,Sonologist,Radiologist";
$privy['setdiscount']=" Admin, Cashier";
$privy['editdiscount']=" Admin, Cashier";
$privy['backupdb']=" Admin";
$privy['editrights']=" Admin";    
$privy['pay']=" Admin,Front Desk,Cashier";
$privy['payment']=" Admin,Front Desk,Cashier";      
$privy['previewresult']=" Front Desk,Admin,Med Tech,Pathologist,Sonologist,Radiologist";
$privy['settemplate']=" Admin";        
?>
