<?php

require '../logic/prereq.php';



$scorePerMatchup = ['44,h'=>2,
                    '44,a'=>3];


//while there is still items in the array
  while ($matchScore = current($scorePerMatchup)) {
    //if key ends with h then save goals in home scores
    $homeGoalsKey = key($scorePerMatchup);
    //echo $homeGoalsKey;
    $splitKey = (explode(',',$homeGoalsKey));
    $matchID =  $splitKey[0];
  $homeAndAway = $splitKey[1];

    if (key($scorePerMatchup)==$matchID.",h") {

        $homeGoals = $scorePerMatchup[$homeGoalsKey];
        echo $homeGoals." Home<br />";
    }
    else{
      //else save goals in away scores
        $awayGoalsKey = key($scorePerMatchup);
        $awayGoals = $scorePerMatchup[$awayGoalsKey];
        echo $awayGoals." Away<br />";

    }
    next($scorePerMatchup);
}





//var_dump($scorePerMatchup);


echo $punditsBonusPlayer= $_POST['punditsBonusPlayer'];

//var_dump($_SESSION);



 ?>
