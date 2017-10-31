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
	    <title>Super Skate</title>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">
	    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="../css/homepage.css"/>
	    <link rel="icon" href="img/logo.png" type="image/x-icon">
</head>
<body>
	<?php include_once('../includes/productHeader.inc.php'); ?>
	<?php include_once('../includes/navBar.inc.php'); ?>

	<div class="container contentBanner" >
	    <div class="">
  <table id="regTable">
    <form  action='../logic/registernewuser.php' method='post'>
      <tr>
        <td>First Name: </td>
				<?php
				if (isset($_SESSION['firstname'])) {
					echo "<td><input type='text' name='firstname' value='".$_SESSION['firstname']."' required/></td>";
				} else {
					echo "<td><input type='text' name='firstname' required/></td>";
				}
				?>
        <!-- <td><input type='text' name='firstname' required/></td> -->
      </tr>
      <tr>
        <td>Surame: </td>
				<?php
				if (isset($_SESSION['surname'])) {
					echo "<td><input type='text' name='surname' value='".$_SESSION['surname']."' required/></td>";
				} else {
					echo "<td><input type='text' name='surname' required/></td>";
				}
				?>
        <!-- <td><input type='text' name='surname' required/></td> -->
      </tr>
      <tr>
        <td>Username: </td>
				<?php
				if (isset($_SESSION['username'])) {
					echo "<td><input type='text' name='username' value='".$_SESSION['username']."' required/></td>";
				} else {
					echo "<td><input type='text' name='username' required/></td>";
				}
				?>
				<!-- <td><input type='text' name='username' required/></td> -->
				<?php
				if (isset($_SESSION['userExists'])) {
					echo "<td>This username already exists!</td>";
				}
				?>
      </tr>
      <tr>
        <td>Password: </td>
				<?php
				if (isset($_SESSION['pword'])) {
					echo "<td><input type='password' name='pword' value='".$_SESSION['pword']."' required/></td>";
				} else {
					echo "<td><input type='password' name='pword' required/></td>";
				}
				?>
        <!-- <td><input type='password' name='pword' required/></td> -->
				<?php
				if (isset($_SESSION['pwordMatch'])) {
					echo "<td>These passwords do not match!</td>";
				}
				?>
      </tr>
      <tr>
        <td>Re-enter password: </td>
				<?php
				if (isset($_SESSION['pword2'])) {
					echo "<td><input type='password' name='pword2' value='".$_SESSION['pword2']."' required/></td>";
				} else {
					echo "<td><input type='password' name='pword2' required/></td>";
				}
				?>
				<!-- <td><input type='password' name='pword2' required/></td> -->
      </tr>
      <tr>
        <td>Date of birth: </td>
				<?php
				if (isset($_SESSION['DOB'])) {
					echo "<td><input type='date' name='DOB' value='".$_SESSION['DOB']."' required/></td>";
				} else {
					echo "<td><input type='date' name='DOB' required/></td>";
				}
				?>
				<!-- <td><input type='date' name='DOB' required/></td> -->
      </tr>
      <tr>
        <td>Email address: </td>
				<?php
				if (isset($_SESSION['email'])) {
					echo "<td><input type='email' name='email' value='".$_SESSION['email']."' required/></td>";
				} else {
					echo "<td><input type='email' name='email' required/></td>";
				}
				?>
        <!-- <td><input type='email' name='email' required/></td> -->
      </tr>
      <tr>
        <td>Favourite team: </td>
        <td>
					<?php
					echo "<select name='teamSupport'>";
					$tm = new TeamManager(getDB());
					$allTeams = $tm->showAllOptions();
					foreach ($allTeams as $key => $value) {
						//$punditsFaveTeam = $tm->byID($value);
						echo "<option value ='$key'>$value</option>";
					}
					echo "</select>";
					?>
					</td>
      </tr>
      <tr >
        <td><input id="differentBtn" type='submit' class="btn" name='submit'/></td>
      </tr>
    </form>
  </table>
	<?php
	if (isset($_SESSION['pwordMatch'])) {
		unset($_SESSION['pwordMatch']);
	}
	if (isset($_SESSION['userExists'])) {
		unset($_SESSION['userExists']);
	}
	if (isset($_SESSION['pword'])) {
		unset($_SESSION['firstname']);
	  unset($_SESSION['surname']);
	  unset($_SESSION['username']);
	  unset($_SESSION['pword']);
	  unset($_SESSION['pword2']);
	  unset($_SESSION['DOB']);
	  unset($_SESSION['email']);
	  unset($_SESSION['teamSupport']);
	}
	?>
</div>
</div>
<?php include_once('../includes/footer.inc.php'); ?>
</body>
</html>
