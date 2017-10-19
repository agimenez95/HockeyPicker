<?php
include_once '../logic/prereq.php';

//check to see if the user is logged in
//check to see if the user has already guessed this week

$db = getDB();
$match = new Match($db);
$week = $match->getLatestWeek();
$games = $match->getMatchesForWeek();

$uid = $_SESSION['userId'];

// saving to the Guess table
$gman = new GuessManager($db);
$gman->save($uid, $week, $_POST['bonusPlayer']);
$guessid = $gman->id;

for ($i=0; $i < 6; $i++) {
  $homeid = $games[$i]["homeTeamID"];
  $scorehome = $_POST["home".$i];
  $awayid = $games[$i]["awayTeamID"];
  $scoreaway = $_POST["away".$i];
  // saving to the Matchup table
  $match->setGuessForTheWeek($homeid, $awayid, $scorehome, $scoreaway, $week);
  $matchid =  $match->id;
  // saving to the Prediction table
  $gman->references($matchid, $guessid);
}

header('Location: ../view/index.php');
?>
