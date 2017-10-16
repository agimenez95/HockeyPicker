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
	<?php
	include "../logic/loginheader.php";

  $match = new Match(getDB());
  $games = $match->getMatchesForWeek();
  for ($i=0; $i < 6; $i++) {
    singlePicker($games[$i]["homeTeamID"], $games[$i]["awayTeamID"], $i);
  }
  ?>
  <form action="../logic/insertpunditguess.php" method="post">
    <select name =punditsBonusPlayer>
			<?php
			echo "TEST 2";
	    $pdo = getDB();
			$bpm = new bonusplayermanager($pdo);

			$allPlayers = $bpm->showAllOptions();

			foreach ($allPlayers as $value) {
				//gets the bonus player that the pundit ones and retrieves the player id related to that player

				$punditsBonusPlayerID = $bpm->byPlayerName($value);

				echo " <option value =".$punditsBonusPlayerID.">$value</option>";
			}
			?>
    </select>
    <input type='submit' name='submit'/>
  </form>
  <script src='../scripts/changescore.js'></script>
  <script src='../scripts/submitguess.js'></script>
</body>
</html>
