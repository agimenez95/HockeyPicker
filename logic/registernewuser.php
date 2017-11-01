<?php
require 'prereq.php';
$username = $_POST['username'];
$pword = $_POST['pword'];
$pword2 = $_POST['pword2'];
$dob = $_POST['DOB'];
date_default_timezone_set('Europe/London');

//checking the dob
// https://stackoverflow.com/questions/976669/how-to-check-if-a-date-is-in-a-given-range
$start_date = '1917-01-01';
check_in_range($start_date, $dob, $username, $pword, $pword2, $_POST);
//check to see that age cannot be

//redirect to give error messages
if(isset($_SESSION['pword'])){
  header('Location: ../view/registration.php');
} else {
  header('Location: ../view/index.php');
}

function check_in_range($start_date, $dob, $username, $pword, $pword2, $post) {
  // Convert to timestamp
  $start_ts = strtotime($start_date);
  $end_ts = date('Y-m-d');
  $user_ts = date('Y-m-d', strtotime($dob));
  // Check that user date is between start & end
  if (($user_ts < $start_ts) || ($user_ts > $end_ts)){
    $_SESSION['dobProb'] = 1;
    populateSession($post);
  }
  passwordCheck($username, $pword, $pword2, $post);
}

function passwordCheck($username, $pword, $pword2, $post){
  $custmanager = new CustomerManager(getDB());
  $customer = $custmanager->byUsername($username);
  if ($customer){
    $_SESSION['userExists'] = 1;
    populateSession($post);
    if ($pword !== $pword2) {
      $_SESSION['pwordMatch'] = 1;
      populateSession($post);
    }
  } else {
    $customer = new Customer();
    $customer->fromArray($post);
    $customer->setPword(password_hash($pword, PASSWORD_DEFAULT));
    $custmanager->save($customer);
  }
}

function populateSession($post){
  $_SESSION['firstname'] = $post['firstname'];
  $_SESSION['surname'] = $post['surname'];
  $_SESSION['username'] = $post['username'];
  $_SESSION['pword'] = $post['pword'];
  $_SESSION['pword2'] = $post['pword2'];
  $_SESSION['DOB'] = $post['DOB'];
  $_SESSION['email'] = $post['email'];
  $_SESSION['teamSupport'] = $post['teamSupport'];
  header('Location: ../view/registration.php');
}

?>
