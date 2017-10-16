<?php
    require 'prereq.php';

    foreach ($_POST['matches'] as $match) {
      echo $match['home'].PHP_EOL;
      echo $match['away'].PHP_EOL;
    }

    $matchTrial = New Match(getDB());

    $matchTrial->setMatchesForWeek($_POST['matches']);
    $matchTrial->getMatchesForWeek();

?>
