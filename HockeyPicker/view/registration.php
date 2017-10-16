<?php
	include('../includes/sessions.inc.php');
	if(isset($_SESSION['login'])){
		header("location: ../view/index.php");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Super Six Hockey</title>
</head>
<body>
  <h1>Hockey Picker</h1>
  <h2>Registration</h2>
  <table>
    <form action='../logic/registernewuser.php' method='post'>
      <tr>
        <td>First Name: </td>
        <td><input type='text' name='firstname' /></td>
      </tr>
      <tr>
        <td>Surame: </td>
        <td><input type='text' name='surname' /></td>
      </tr>
      <tr>
        <td>Username: </td>
        <td><input type='text' name='username' /></td>
      </tr>
      <tr>
        <td>Password: </td>
        <td><input type='password' name='pword' /></td>
      </tr>
      <tr>
        <td>Re-enter password: </td>
        <td><input type='password' name='pword2' /></td>
      </tr>
      <tr>
        <td>Date of birth: </td>
        <td><input type='date' name='DOB' /></td>
      </tr>
      <tr>
        <td>Email address: </td>
        <td><input type='text' name='email' /></td>
      </tr>
      <tr>
        <td>Favourite team: </td>
        <td><input type='text' name='teamSupport' /></td>
      </tr>
      <tr>
        <td><input type='submit' name='submit'/></td>
      </tr>
    </form>
  </table>
</body>
</html>
