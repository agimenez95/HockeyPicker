<?php
	require '../logic/prereq.php';
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<title>Super Skate</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="../css/homepage.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/menubar.css">
</head>

<body>

<div class="flex-container">

	<div class="flex-item" id="header">
	<img id="logo" src="../logo.png"></img>
	<div id="Prize Money Box">
			<?php include 'prizemoney.php'; ?>

	</div>
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


	<div class="flex-item" id="menubar">


				<table id="menu">
			 <tr>
					<th>Results</th>
					<th><a href="rules.php">How to play</a></th>
					<th>News</th>
					<th>League Tables</th>
					<th>Settings</th>
					<th>Feedback</th>
				</tr>

			</table>
	</div>

	<div class="flex-item" id="MainBodyContainer">




	<div class="flex-item" id ="leftside">


						<div id="Prize Money Box">
								<?php include 'prizemoney.php'; ?>

						</div>

	</div>

	<div class="flex-item" id="MainBody">




	<div id ="Score Picker">
		<?php include 'scorepicker.php'; ?>

	</div>



</div>
</div>


<div class="flex-item" id="footer">
	<em>Footer</em>
</div>






















	<?php
		//include "../logic/loginheader.php";
	?>


 <?php
	// if (isset($_SESSION['login'])) {
	// 	echo '<p><a href="scorepicker.php">Pick your scores</a></p>';
	// }
	// else {
	// 	echo '<p>You need an account to be able to select your scores!</p>';
	// }
	?>




</div>



<script src="../../../jquery-3.2.1.min.js"></script> <script src="../../../main.js"></script>

</body>
</html>
