<?php
require '../logic/prereq.php';
// var_dump($_POST);
//
// if (isset($_SESSION["userId"])) {
//   # code...
//   echo $_SESSION["userId"];
// } else {
//   echo "You did not sign in!";
// }

echo "<br>";

$match = new Match(getDB());
$week = $match->getLatestWeek();
echo $week;
?>
