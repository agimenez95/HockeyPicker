<?php
require 'prereq.php';

foreach ($_POST as $cookieName => $action) {
  if (!isset($_SESSION[$cookieName]) && strcmp($action, '+') == 0) {
    $_SESSION[$cookieName] = 1;
  } elseif (!isset($_SESSION[$cookieName]) && strcmp($action, '-') == 0) {
    $_SESSION[$cookieName] = 0;
  } else {
    if (strcmp($action, '+') == 0) {
      if ($_SESSION[$cookieName] < 10){
        $_SESSION[$cookieName]++;
      }
    } elseif (strcmp($action, '-') == 0){
      if ($_SESSION[$cookieName] != 0){
        $_SESSION[$cookieName]--;
      }
    }
  }
}

header('Location: '.$_SERVER['HTTP_REFERER']);
?>
