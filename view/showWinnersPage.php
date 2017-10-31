<?php
  include_once '../logic/prereq.php';

  $topScorer = $_SESSION['bonusPlayer'];
  unset($_SESSION['bonusPlayer']);
  $someoneHasWon = FALSE;
  $guessedPlayerCorrectly = FALSE;
  $matchManager = new Match(getDB());
  $currentWeekId = $matchManager->getLatestWeek();
  $weekResults = $matchManager->getCurrentWeekResults($currentWeekId);
  $guessManager = new GuessManager(getDB());
  $guesses = $guessManager->getCustomerGuessDetails($currentWeekId);
  $customerManager = new CustomerManager(getDB());
  $customers =$customerManager->getAllUsers();
  $firstCustomers = array();
  $secondCustomers = array();
  $thirdCustomers = array();

  foreach ($guesses as $key => $guess) {
    $customersPredictions = $guessManager->getPredictionDetails($guess['id']);
    if ($guess['bonusPlayerID'] == $topScorer) {
      $guessedPlayerCorrectly = TRUE;
    }
    foreach ($customersPredictions as $key => $prediction) {
      $customerMatchPrediction = $matchManager->getCustomerPrediction($prediction['matchupID']);
      if (($customerMatchPrediction[0]['homeGoals'] == $weekResults[$key]['homeGoals']) &&
          ($customerMatchPrediction[0]['awayGoals'] == $weekResults[$key]['awayGoals']) ) {
        $correctScoreCounter++;
      }
    }
    if ($correctScoreCounter == 6 && $guessedPlayerCorrectly) {
      array_push($firstCustomers,$customers[$guess['customerID']]['username']);
    }
    else if ($correctScoreCounter == 6) {
      array_push($secondCustomers,$customers[$guess['customerID']]['username']);
    }
    else if ($correctScoreCounter == 5 && $guessedPlayerCorrectly) {
      array_push($thirdCustomers,$customers[$guess['customerID']]['username']);
    }
    $correctScoreCounter = 0;
    $guessedPlayerCorrectly = FALSE;
  }

?>

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
    <h1>Super Skate Winners</h1>
    <?php
      if (empty($firstCustomers) && empty($secondCustomers) && empty($thirdCustomers)) {
        echo "<h2>Nobody has won the jackpot this week, better luck next time!</h2>";
      }
      else {
        echo "<h2>This week's Super Skate winners</h2>";
        if (!empty($thirdCustomers)) {
          echo "<h3>Third Jackpot:</h3>";
          foreach ($thirdCustomers as $thirdCustomer) {
            echo "<h4>$thirdCustomer</h4>";
          }
        }
        if (!empty($secondCustomers)) {
          echo "<h3>Second Jackpot:</h3>";
          foreach ($secondCustomers as $secondCustomer) {
            echo "<h4>$secondCustomer</h4>";
          }
        }
        if (!empty($firstCustomers)) {
          echo "<h3>First Jackpot:</h3>";
          foreach ($firstCustomers as $firstCustomer) {
            echo "<h4>$firstCustomer</h4>";
          }
        }
        echo "<h2>Congratulations!</h2>";
      }
    ?>

  </div>
    <?php include_once('../includes/footer.inc.php'); ?>
  </body>
</html>
