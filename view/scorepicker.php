<?php
	require '../logic/prereq.php';
  include '../logic/singlePicker.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Super Six Hockey</title>
</head>

<body>
  <h1>Hockey Picker</h1>
	<?php include "../logic/loginheader.php"; ?>
	<form name="formName" action="../logic/submitguess.php" method="post">
		<?php
	  $match = new Match(getDB());
	  $games = $match->getMatchesForWeek();
	  for ($i=0; $i < 6; $i++) {
	    singlePicker($games[$i]["homeTeamID"], $games[$i]["awayTeamID"], $i);
	  }
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
  </form>
  <script src='../scripts/changescore.js' type="text/javascript"></script>
</body>
</html>
