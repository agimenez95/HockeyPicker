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
    <meta charset="utf-8">
    <title>Show Winners Page</title>
  </head>
  <body>
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
  </body>
</html>
