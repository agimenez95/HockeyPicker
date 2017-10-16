<?php
// check login and create SESSION and count attempts
require 'prereq.php';

$custman = new CustomerManager(getDB());
$customer = $custman->byUsername($_POST['username']);

if ($customer && $customer->passwordValid($_POST['password'])){
  $_SESSION["userId"] = $customer->getID();
  $_SESSION['login'] = 1;
  header('Location: '.$_SERVER['HTTP_REFERER']);
} else {
  //redirectWithMsg("Invalid username or password");
  echo "Invalid username or password";
}

?>
