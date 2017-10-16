<?php
require 'prereq.php';
//logout code
if(isset($_COOKIE[session_name()])){
// match PHPSESSID settings
setcookie('PHPSESSID', '', time()-10);
// clear the Session cookie
}
$_SESSION = array();
// empty the array
session_destroy();
//destroy the session
header("location: ../view/index.php");
//to redirect
exit();
?>
