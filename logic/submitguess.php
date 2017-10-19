<?php
var_dump($_POST);

if (isset($_SESSION["userId"] )) {
  # code...
  echo $_SESSION["userId"];
} else {
  echo "You did not sign in!";
}


?>
