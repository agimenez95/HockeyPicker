<?php
    require 'prereq.php';

    $_SESSION['bonusPlayer'] = $_POST['bonusPlayer'];
    $matchManager = New Match(getDB());
    $matchFixtures = $matchManager->getMatchesForWeek();
    $matchManager->setScoresForWeek($_POST, $matchFixtures);
?>
<!DOCTYPE html>
<html>
  <head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css"/>
    <link rel="stylesheet" href="../css/scorepickerblock.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <meta charset="utf-8">
    <title>Admin Results Confirmation</title>
  </head>

    <body>
      <?php include_once('../includes/productHeader.inc.php'); ?>
    	<?php include_once('../includes/navBar.inc.php'); ?>

    	<div class="container contentBanner">
    			<div class="">

  <h1>You have successfully submitted this week's Super Six match results into the database.</h1>
</div>
<?php include_once('../includes/footer.inc.php'); ?>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src='../scripts/changescore.js' type="text/javascript"></script>
<script src="editingdatabaseteams.js"></script>
</html>
