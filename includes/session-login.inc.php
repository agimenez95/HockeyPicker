<div id="login">
<?php

///////////////////// conditional message /////////////////

?>
<form id="loginForm" name="loginForm" method="post" action="../logic/checklogin.php">
  <label for="username">Username</label>
  <input name="username" type="text" id="username">
  <label for="password">Password</label>
  <input name="password" type="password" id="password">
  <input type="submit" name="Submit" class="submit1" value="Login">
</form>
<form name="loginForm" action="../view/registration.php">
  <br>
  <input type="submit" id="needAccount" class="submit1" value="I don't have an account" />
</form>
<?php
// closing curly

?>
</div>
