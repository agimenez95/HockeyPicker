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


function check_in_range($start_date, $dob, $username, $pword, $pword2, $post) {
  // Convert to timestamp
  $start_ts = strtotime($start_date);
  $end_ts = date('Y-m-d');
  $user_ts = date('Y-m-d', strtotime($dob));
  // Check that user date is between start & end
  if (($user_ts < $start_ts) || ($user_ts > $end_ts)){
    echo "problem";
    $_SESSION['dobProb'] = 1;
  }
  passwordCheck($username, $pword, $pword2, $post);
}

function passwordCheck($username, $pword, $pword2, $post){
  $custmanager = new CustomerManager(getDB());
  $customer = $custmanager->byUsername($username);
  if ($customer){
    $_SESSION['userExists'] = 1;
  } else if($pword == "") {
    $_SESSION['pwordEmpty'] = 1;
  } else if ($pword !== $pword2) {
    $_SESSION['pwordMatch'] = 1;
  } else {
    $customer = new Customer();
    echo $post['teamSupport'];
    $customer->fromArray($post);
    $customer->setPword(password_hash($pword, PASSWORD_DEFAULT));
    $custmanager->save($customer);
    echo "yes";
    //header('Location: ../view/index.php');
  }
}







?>
