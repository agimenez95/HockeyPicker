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
	    <link rel="stylesheet" type="text/css" href="css/fontAwesome/css/font-awesome.min.css"/>
	    <link rel="stylesheet" type="text/css" href="../css/homepage.css"/>
	    <link rel="icon" href="img/logo.png" type="image/x-icon">
</head>
<body>
	<?php include_once('../includes/productHeader.inc.php'); ?>
	<?php include_once('../includes/navBar.inc.php'); ?>

	<div class="container contentBanner">
			<div class="">
				<h1>Registration</h1>
					<h4 class="txt-ctr txt-underline marb-0">
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
								<tr>
									<td><input type='submit' name='submit'/></td>
								</tr>
							</form>
						</table>
					</h2>

	</div>
	<?php include_once('../includes/footer.inc.php'); ?>
	</body>
	<script src="js/jquery-3.2.1.min.js"></script>

</html>
