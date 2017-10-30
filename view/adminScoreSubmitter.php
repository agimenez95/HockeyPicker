<?php
	require '../logic/prereq.php';
  include '../logic/singlePicker.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Super Skate</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/fontAwesome/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/homepage.css"/>
<link rel="stylesheet" href="../css/scorepickerblock.css">
<link rel="icon" href="img/logo.png" type="image/x-icon">
</head>
<body>
    <?php include_once('../includes/productHeader.inc.php'); ?>
    <?php include_once('../includes/navBar.inc.php'); ?>

    <div class="container contentBanner">
        <div class="">
            <h2 class="txt-ctr txt-underline marb-0">

							<h1>Admin Score Selector</h1>
							<div id='adminScore'>
							<form name="formName" action="../logic/submitActualResults.php" method="post">
								<?php
								$match = new Match(getDB());
								$games = $match->getMatchesForWeek();
								for ($i=0; $i < 6; $i++) {
									singlePicker($games[$i]["homeTeamID"], $games[$i]["awayTeamID"], $i);
								}
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
	<h1>Admin Score Selector</h1>

	<form name="formName" action="../logic/submitActualResults.php" method="post">
		<?php
	  $match = new Match(getDB());
	  $games = $match->getMatchesForWeek();
	  for ($i=0; $i < 6; $i++) {
	    singlePicker($games[$i]["homeTeamID"], $games[$i]["awayTeamID"], $i);
	  }
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
		<div id="submitButtonAd">
    	<input type="submit" value="Submit">
		</div>
	</div>
  </form>
</h2>
</div>

</div>
<?php include_once('../includes/footer.inc.php'); ?>
  <script src='../scripts/changescore.js' type="text/javascript"></script>


	<!-- ?>

	<div id="submitButtonAd">

	<input type="submit" value="Submit">
</div>
</div>
</form>
</h2>
</div>

</div>
<?php //include_once('../includes/footer.inc.php'); ?> -->
</body>
    <script src="js/jquery-3.2.1.min.js"></script>
		<script src='../scripts/changescore.js' type="text/javascript"></script>

</html>
