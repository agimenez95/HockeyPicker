<?php
    require 'prereq.php';

    var_dump($_POST);

    //
    $matchManager = New Match(getDB());

    $matchFixtures = $matchManager->getMatchesForWeek();

    $matchManager->setScoresForWeek($_POST, $matchFixtures);

?>
