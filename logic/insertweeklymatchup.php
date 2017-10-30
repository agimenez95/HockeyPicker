<?php
    require 'prereq.php';
    $_SESSION['bonusPlayer'] = $_POST['bonusPlayer'];
    $topScorerOfTheWeek = $_POST['bonusPlayer'];
    $matchTrial = New Match(getDB());
    $matchTrial->setMatchesForWeek($_POST['matches']);
    $matchTrial->getMatchesForWeek();
    $matchTrial->setTopScorer($topScorerOfTheWeek);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Fixture Confirmation</title>
  </head>
  <h1>You have successfully submitted this week's Super Six fixtures into the database.</h1>
  <body>

  </body>
</html>
