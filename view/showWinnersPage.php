<?php
  include_once '../logic/prereq.php';

  $matchManager = new Match(getDB());
  $currentWeekId = $matchManager->getLatestWeek();
  $weekResults = $matchManager->getCurrentWeekResults($currentWeekId);
  echo $weekResults[4][homeGoals];

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
