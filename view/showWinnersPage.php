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
  $winningCustomers = array();

  echo $topScorer;
  echo PHP_EOL;

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
      array_push($winningCustomers,$customers[$guess['customerID']]['username']);
      $someoneHasWon = TRUE;
    }
    else if ($correctScoreCounter == 6) {
      echo 'you got second prize';
    }
    else if ($correctScoreCounter == 5 && $guessedPlayerCorrectly) {
      echo 'you got third prize';
    }
    $correctScoreCounter = 0;
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
      if ($someoneHasWon) {
        echo "<h2>This week's Super Skate winners are:</h2>";
        foreach ($winningCustomers as $winningCustomer) {
          echo "<h3>$winningCustomer</h3>";
        }
        echo "<h2>Congratulations!</h2>";
      }
      else {
        echo "<h2>Nobody has won the jackpot this week, better luck next time!</h2>";
      }
    ?>
  </body>
</html>
