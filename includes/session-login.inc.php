<div class="container" id="login">
<?php

///////////////////// conditional message /////////////////

?>
<div id="loginContainer">
<form id="loginForm" name="loginForm" method="post" action="../logic/checklogin.php">
<div class="loginBox">
  <label style="width:60px;" for="username">Username</label>
  <input name="username" type="text" id="username">
</div>
<div class="loginBox">
  <label style="width:60px;" for="password">Password</label>
  <input name="password" type="password" id="password">
</div>
  <div class="loginBox">
  <input style="float:left; font-size:10px;" type="submit" id="btnReg" name="Submit" class="btn" value="Login">
</form>
<form name="loginForm" action="../view/registration.php">
  <input style="float:right; font-size:10px;" type="submit" id="btnReg" class="btn" value="Register"/>
</div>
</form>
</div>
</div>
