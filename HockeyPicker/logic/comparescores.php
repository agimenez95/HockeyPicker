<?php
$predictedScores = ["avb"=>[0,1], "cvd"=>[2,1], "evf"=>[3,2], "gvh"=>[5,2], "ivj"=>[3,2], "kvl"=>[0,1], "mvn"=>[3,0]];
$resultScores = ["avb"=>[0,1], "cvd"=>[2,2], "evf"=>[2,2], "gvh"=>[5,2], "ivj"=>[3,2], "kvl"=>[0,1], "mvn"=>[3,0]];

$playerIsCorrect = true;

function compareScores($predicted,$result) {
  foreach ($result as $key => $value) {
    if (($value[0] == $predicted[$key][0]) && ($value[1] == $predicted[$key][1])) {
      $correctPredictionsCounter++;
      echo "You guessed the score correctly for game ".$key;
      echo PHP_EOL;
    }
  }
  echo "You predicted ".$correctPredictionsCounter." game scores correctly";
  echo PHP_EOL;
  return $correctPredictionsCounter;
}

function determineJackpot($counter,$player) {
  if (($counter == 7) && $player) {
    $jackpot = 300;
  }
  elseif ($counter == 7) {
    $jackpot = 250;
  }
  elseif (($counter == 6) && $player) {
    $jackpot = 200;
  }
  else {
    $jackpot = 0;
  }
}

$numOfGamesPredicted = compareScores($predictedScores,$resultScores);
determineJackpot($numOfGamesPredicted,$playerIsCorrect);
?>
