<?php
  include_once '../logic/prereq.php';

  $matchManager = new Match(getDB());
  $currentWeekId = $matchManager->getLatestWeek();
  $weekResults = $matchManager->getCurrentWeekResults($currentWeekId);
  $guessManager = new GuessManager(getDB());
  $guesses = $guessManager->getCustomerGuessDetails($currentWeekId);

  foreach ($guesses as $key => $guess) {
    $customersPredictions = $guessManager->getPredictionDetails($guess['id']);
    foreach ($customersPredictions as $key => $prediction) {
      $customerMatchPrediction = $matchManager->getCustomerPrediction($prediction['matchupID']);
      if (($customerMatchPrediction[0]['homeGoals'] == $weekResults[$key]['homeGoals']) &&
          ($customerMatchPrediction[0]['awayGoals'] == $weekResults[$key]['awayGoals']) ) {
        $correctScoreCounter++;
        echo $correctScoreCounter;
        echo " correct guess on matchid: ";
        echo $prediction['matchupID'];
        echo PHP_EOL;
        if ($correctScoreCounter == 6) {
          echo 'Customer ';
          echo $guess['customerID'];
          echo ' You guessed all 6 correctly!';
          echo PHP_EOL;
        }
      }
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
    <h1>Show Super Skate Winners</h1>



  </body>
</html>
