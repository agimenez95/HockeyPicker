<?php

require 'prereq.php';

$db = getDB();

$bpm = new BonusPlayerManager($db);

$jessTrialPlayer = new BonusPlayer("Jessica Lettall", 10);
$bpm->save($jessTrialPlayer);

$matchup = $bpm->byPlayerID(9);
  foreach ($matchup as $bonusPlayer) {
    echo $bonusPlayer->name . " Their team ID is : " . $bonusPlayer->teamID.PHP_EOL;
  }


?>
