<?php
require 'prereq.php';
$username = $_POST['username'];
$pword = $_POST['pword'];
$pword2 = $_POST['pword2'];

$custmanager = new CustomerManager(getDB());
$customer = $custmanager->byUsername($username);

if ($customer){
  echo "Username already exists";
} else if($pword == "") {
  echo "Empty password";
} else if ($pword !== $pword2) {
  echo "Passwords do not match";
} else {
  $customer = new Customer();
  $customer->fromArray($_POST);
  $customer->setPword(password_hash($pword, PASSWORD_DEFAULT));

  $custmanager->save($customer);
  header('Location: ../view/index.php');
}
?>
