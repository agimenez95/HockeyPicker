<div class="container" id="login">
<?php

///////////////////// conditional message /////////////////

?>
<div id="loginContainer">
<form id="loginForm" name="loginForm" method="post" action="../logic/checklogin.php">
  <label for="username">Username</label>
  <input name="username" type="text" id="username">
  <label for="password">Password</label>
  <input name="password" type="password" id="password">
  <div id="buttonsSubmit">
  <input type="submit" name="Submit" class="submit1" value="Login">
</form>
<form name="loginForm" action="../view/registration.php">
  <input type="submit" id="needAccount" class="submit1" value="Register"/>
</div>
</form>
</div>
</div>
