<?php
	include_once '../logic/prereq.php';
  include '../logic/singlePicker.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Super Skate Predictions</title>
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
					<h2 class="txt-ctr txt-underline marb-0">
						<div id="spcontainer">
						<form name="formName" action="../logic/submitguess.php" method="post">
							<?php
							echo "<div class='matchContainer'>";
						  $match = new Match(getDB());
						  $games = $match->getMatchesForWeek();
						  for ($i=0; $i < 6; $i++) {
						    singlePicker($games[$i]["homeTeamID"], $games[$i]["awayTeamID"], $i);
						  }
							echo "</div>";
							echo "<br><br>";
							echo "<div class='bpbox'>";
					    echo "<select name='bonusPlayer'>";
								$bpm = new bonusplayermanager(getDB());
								$allPlayers = $bpm->showAllOptions();
								foreach ($allPlayers as $value) {
									$punditsBonusPlayerID = $bpm->byPlayerName($value);
									echo "<option value =".$punditsBonusPlayerID.">$value</option>";
								}
							echo "</select>";
							?>
					    <input class="btn" type="submit" value="Submit">
						</div>
					  </form>

					</h2>

	</div>
	<?php include_once('../includes/footer.inc.php'); ?>
</body>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src='../scripts/changescore.js' type="text/javascript"></script>

</html>
