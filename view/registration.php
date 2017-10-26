<?php
	include_once '../logic/prereq.php';
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
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="../css/homepage.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/menubar.css">
</head>
<body>
  <?php include 'pageheader.php' ?>
  <table>
    <form action='../logic/registernewuser.php' method='post'>
      <tr>
        <td>First Name: </td>
        <td><input type='text' name='firstname' required/></td>
      </tr>
      <tr>
        <td>Surame: </td>
        <td><input type='text' name='surname' required/></td>
      </tr>
      <tr>
        <td>Username: </td>
        <td><input type='text' name='username' required/></td>
      </tr>
      <tr>
        <td>Password: </td>
        <td><input type='password' name='pword' required/></td>
      </tr>
      <tr>
        <td>Re-enter password: </td>
        <td><input type='password' name='pword2' required/></td>
      </tr>
      <tr>
        <td>Date of birth: </td>
        <td><input type='date' name='DOB' required/></td>
      </tr>
      <tr>
        <td>Email address: </td>
        <td><input type='email' name='email' required/></td>
      </tr>
      <tr>
        <td>Favourite team: </td>
        <td>
					<?php echo "<select name='teamSupport'>";
					$tm = new TeamManager(getDB());
					$allTeams = $tm->showAllOptions();
					foreach ($allTeams as $value) {
						$punditsFaveTeam = $tm->byID($value);
						echo "<option value ='$punditsFaveTeam'>$value</option>";
					}
					echo "</select>";
					?>
					</td>
      </tr>
      <tr>
        <td><input type='submit' name='submit'/></td>
      </tr>
    </form>
  </table>
</body>
</html>
