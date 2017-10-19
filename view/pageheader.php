<div class="flex-item" id="header">
<img id="logo" src="../logo.png"></img>
<!-- <h1 id ="nameHockey"></h1> -->
<?php
if (isset($_SESSION['login'])) {
  include('../includes/session-logout.inc.php');
} else {
  include('../includes/session-login.inc.php');
}
?>
<!-- <a id="loginLink" href="../logic/loginheader.php">Login/Register</a> -->

  <!-- <a id="login" href="registernewuser.php">Register New User</a> -->
</div>
