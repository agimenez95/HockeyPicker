<?php include_once '../logic/prereq.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Super Skate</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css"/>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
</head>
<body>
  <?php
    include('../logic/pickTeamColor.php');
    include_once('../includes/productHeader.inc.php');
    include_once('../includes/navBar.inc.php');
  ?>

  <div class="container contentBanner">
      <div class="">
        <h2 class="txt-ctr txt-underline marb-0"></h2>
        <div id="rulecontainer">
          <?php include('rulesofthegame.php');
                include('prizemoney.php')
          ?>
        </div>
      </div>
      <?php include_once('../includes/footer.inc.php'); ?>
    </div>
  </body>
  <script src="js/jquery-3.2.1.min.js"></script>
</html>
