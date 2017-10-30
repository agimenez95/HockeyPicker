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
    <meta charset="utf-8">
    <title></title>
  </head>
  <h1>You have successfully submitted this week's Super Six match results into the database.</h1>
  <body>

  </body>
</html>
