<?php
require 'prereq.php';

$trialArray = ['t1vt2'=> [1,1], 't3vt4'=>[2,1],'t4vt5'=>[3,2]];
$stringArray =  json_encode($trialArray);

//Print information to file and set up bet object
$file = "actualScores.txt";
$actualScore = fopen($file, "w");
fwrite($actualScore, $stringArray.PHP_EOL);
fclose($actualScore);

$betObject = new Guess('Julie',3,time(),'player4',['avb'=>[7,3],'cvz'=>[2,2]]);

$newCustomerJSON=json_encode($betObject);
addToFile($newCustomerJSON);

function addToFile($newCustomerJSON){
  $fileC = "customerScores.txt";
  $customerBet= fopen($fileC, "a");
  fwrite($customerBet, $newCustomerJSON.PHP_EOL);
  fclose($customerBet);
}

function readAllDataFromFile(){
  $encodedData = file_get_contents("customerscores.txt");
}
?>
