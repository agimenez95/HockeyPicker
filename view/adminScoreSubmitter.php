<?php
	require '../logic/prereq.php';
  include '../logic/singlePicker.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Super Six Hockey</title>
<link rel="stylesheet" href="../css/homepage.css">
<link rel="stylesheet" href="../css/scorepickerblock.css">
</head>

<body>

  <?php include 'pageheader.php' ?>
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
    <input type="submit" value="Submit">
	</div>
  </form>
  <script src='../scripts/changescore.js' type="text/javascript"></script>
</body>
</html>
