<?php
  include_once '../logic/prereq.php';

  $matchManager = new Match(getDB());
  $currentWeekId = $matchManager->getLatestWeek();
  $weekResults = $matchManager->getCurrentWeekResults($currentWeekId);
  $guessManager = new GuessManager(getDB());
  $guesses = $guessManager->getCustomerGuessDetails($currentWeekId);
  $predictionInfo = $guessManager->getPredictionDetails($guesses[0]['id']);

  foreach ($guesses as $key => $guess) {
    $customersPredictions = $guessManager->getPredictionDetails($guess['id']);
    foreach ($customersPredictions as $key => $prediction) {
      $customerMatchPrediction = $matchManager->getCustomerPrediction($prediction['matchupID']);
      if ($customerMatchPrediction['homeGoals'] == $weekResults[$key]['homeGoals']
          && $customerMatchPrediction['awayGoals'] == $weekResults[$key]['awayGoals']
          ) {
        $correctPredictionCounter++;
        echo $correctPredictionCounter;
        echo PHP_EOL;
      }
    }
  }


  function comparePredictionsAgainstResult() {
    // itterate through each prediction in the database and compare to result array,
    // if prediction has 6/6 raise winner flag else you lost (5/6, bonusPlayer)
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
