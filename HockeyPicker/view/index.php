<?php
	require '../logic/prereq.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Super Six Hockey</title>
</head>

<body>
  <h1>Hockey Picker</h1>
	<?php
		include "../logic/loginheader.php";
	?>
  <h2>Welcome to the hockey picker!</h2>
  <p>Do you think you can predict hockey games? Why not have a go!</p>
  <p><a href="rules.php">Rules of the game</a></p>
	<?php
	if (isset($_SESSION['login'])) {
		echo '<p><a href="scorepicker.php">Pick your scores</a></p>';
	}
	else {
		echo '<p>You need an account to be able to select your scores!</p>';
	}
	?>
</body>
</html>
