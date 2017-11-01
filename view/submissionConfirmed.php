<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css"/>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <title>Show Winners Page</title>
  </head>
  <body>
    <?php
    include('../logic/pickTeamColor.php');
    include_once('../includes/productHeader.inc.php');
    include_once('../includes/navBar.inc.php');
    ?>

      <div class="container contentBanner">
          <div class="">

    <h1>THANK YOU FOR YOUR PREDICTION. WE WILL BE IN TOUCH IF YOU WIN.</h1>
    <a href="index.php">Home</a>
  </div>
    <?php include_once('../includes/footer.inc.php'); ?>
  </body>
</html>
