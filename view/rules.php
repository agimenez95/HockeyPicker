<?php
	require '../logic/prereq.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Super Skate</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="../css/homepage.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/menubar.css">

</head>

<body>

<?php include 'pageheader.php' ?>
</body>
</html>

<?php
 require '../logic/prereq.php';
?>
<!--<!doctype html>
<html lang="en">
<head>

 <title> Super Skate </title>
 <meta charset="utf-8">

 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">

 <link rel="stylesheet" type="text/css" href="../css/homepage.css"/>

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>
<body>


<?php

if (isset($_SESSION['login'])) {

 include_once('../logic/pickTeamColor.php');
}
?>

<div class="container">

 <div id="bannerR" class="row">
	 <div id="banner" class ="col-md-12">
		 <!-- this is where the header banner will sit -->
		 <?php include_once('../includes/productHeader.inc.php'); ?>
	 </div>
 </div>



 <div id="navBarR" class="row">
	 <div id="navBar" class="col-md-8">
		 <?php include_once('../includes/navBar.inc.php'); ?>
	 </div>
	 <div id="loginBar" class="col-md-4">
		 <!-- this is where the login header will go -->
		 <?php
		 if (isset($_SESSION['login'])) {
			 include('../includes/session-logout.inc.php');
		 } else {
			 include('../includes/session-login.inc.php');
		 }
		 ?>
	 </div>
 </div>

 <div id="mainContentR" class="row">
	 <div id="mainContent" class="col-md-8">
		 <!-- this is where the main content will go -->
	 </div>
	 <div id="prizemoney" class="col-md-4">
		 <?php include 'prizemoney.php'; ?>
	 </div>
 </div>

 <div id="footerR" class="row">
	 <div id="footer" class="col-md-12">
		 <!-- this is where the footer goes  -->
	 </div>
 </div>

</div>
</body>
</html> -->
