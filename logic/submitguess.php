<?php
require '../logic/prereq.php';

//check to see if the user is logged in
//check to see if the user has alreadd

$match = new Match(getDB());
$week = $match->getLatestWeek();
echo $week;


?>
