<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>RNJJ Solution</title>
		
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
 <!-- <link rel='stylesheet' id='panoramic-header-standard-css'  href='http://lis.lexorsoft.com/wp-content/themes/panoramic/library/css/header-standard.css?ver=1.0.19' type='text/css' media='all' /> -->
<link rel='stylesheet'  href='font-awesome.css' type='text/css' media='all' />
<link rel='stylesheet'   href='style.css' type='text/css' media='all' />
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-1.12.4.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#dialog" ).dialog();
  } );
  </script>
</head>

<body class="single single-post postid-1 single-format-standard">
<header id="masthead" class="site-header panoramic-header-layout-standard" role="banner">

<div class="site-container">
    <div class="branding" align="center">
                    <a href="index.php"><img src="logo.png" width="750px" align="center"></a>
                    <!--<a href="index.php" title="Patient Information System" align="right" class="title"></a>-->
            <div class="description"></div>
			
            </div><!-- .site-branding -->
   
   <!-- <div class="site-header-right">
        
                   <div class="info-text">
            	<strong><em>CALL US:</em></strong> 555-PANORAMIC            </div>
			<ul class="social-links">
<li><i class="fa fa-search search-btn"></i></li></ul>                
    </div>  -->
    <div class="clearboth"></div>
    
		<div class="search-block">
		<form role="search" method="get" class="search-form" action="http://localhost/lis">
	<label>
		<input type="search" class="search-field" placeholder="Search..." value="" name="s" title="Search for:" />
	</label>
	<input type="submit" class="search-submit" value="&nbsp;" />
</form>	</div>
<?php
if($_COOKIE[username]!='')
{
?>
 <div style='width:100%;text-align:right;'>Logged in as: <b style='color:red;'><?=$_COOKIE[fullname]?></b></span></div> 	 
<?php
}
?> 
</div>

        
<nav id="site-navigation" class="main-navigation border-bottom " role="navigation">
	<span class="header-menu-button"><i class="fa fa-bars"></i></span>
	<div id="main-menu" class="main-menu-container panoramic-mobile-menu-standard-color-scheme">
		<div class="main-menu-close"><i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></div>
		<div class="main-navigation-inner"><ul id="menu-main" class="menu"><li id="menu-item-23" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-23"><a href="">Settings</a>
<ul class="sub-menu">
	<li id="menu-item-21" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-21"><a href="addtest.php">Add Lab Test</a></li>
	<li id="menu-item-22" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-22"><a href="listlabtest.php">View Lab Test</a></li>
	<li id="menu-item-22" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-22"><a href="settings.php">Settings</a></li>
	<li id="menu-item-22" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-22"><a href="adduser.php">Users</a></li>
	<li id="menu-item-22" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-22"><a href="settemplate.php">Result Templates</a></li>
	<li id="menu-item-22" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-22"><a href="backupdatabase.php">Backup</a></li>
</ul>
</li>

<li id="menu-item-23" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-23"><a href="">Patients</a>
<ul class="sub-menu">
	<li id="menu-item-24" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-24"><a href="searchpatient.php">Search Patient</a></li>
	<li id="menu-item-24" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-24"><a href="newpatient.php">New Patient</a></li>
	<li id="menu-item-24" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-24"><a href="patientlist.php">Patient List</a></li>
	</ul>
</li>


<li id="menu-item-23" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-23"><a href="">Laboratory Test</a>
<ul class="sub-menu">
	
    <li id="menu-item-28" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-28"><a href="pending.php" title="Enter New Lab Test Result, Edit, or Delete">Pending Lab Test</a></li>
	    <li id="menu-item-28" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-28"><a href="patienthistory.php">Update Result</a></li>
	</ul>
</li>
<li id="menu-item-29" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-29"><a href="">Billing</a>
<ul class="sub-menu">
<li id="menu-item-24" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-24"><a href="billing.php">Billing Summary</a></li>
<li id="menu-item-24" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-24"><a href="discount.php">Add Discount</a></li>
</ul>
<li id="menu-item-29" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-29"><a href="">Report</a>
<ul class="sub-menu">
	<li id="menu-item-28" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-28"><a href="testreport.php" title="Enter New Lab Test Result, Edit, or Delete">Laboratory Test Report</a></li>
	<li id="menu-item-31" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-31"><a href="patienthistory.php">Laboratory Test Result</a></li>
	<li id="menu-item-32" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-32"><a href="patientlist.php?c=r">Patient Lab Test History</a></li>
	<li id="menu-item-30" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-30"><a href="dailysales.php">Sales Report</a></li>
</ul>
</li>

<li id="menu-item-29" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-29"><a href="logout.php">Logout</a></li>
</ul></div>	</div>
</nav><!-- #site-navigation -->
        
        
</header><!-- #masthead -->

<script>
    var panoramicSliderTransitionSpeed = parseInt(450);
</script>


<div id="content" class="site-content site-container">
    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		
			
<article id="post-1" class="post-1 post type-post status-publish format-standard hentry category-admin">