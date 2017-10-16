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
  <form action="../logic/changecookiescore.php" method="post">
  <?php
    $scores = ["avb"=>[0,0], "cvd"=>[0,0], "evf"=>[0,0], "gvh"=>[0,0], "ivj"=>[0,0], "kvl"=>[0,0]];
    $matchups = ["avb", "cvd", "evf", "gvh", "ivj", "kvl"];
    echo "<table>";
      $counter = 0;
      foreach ($matchups as $i => $game) {
        if ($counter == 0) {
          echo "<tr>";
        }
        echo "<td>";
        $teams = explode('v', $game);
        //setting the scores with sessions
        if (isset($_SESSION[$game.$teams[0]])) {
      		$scores[$game][0] = $_SESSION[$game.$teams[0]];
          //$scores[$game][0] = $_SESSION['scores'][$game][0];
      	}
        if (isset($_SESSION[$game.$teams[1]])) {
      		$scores[$game][1] = $_SESSION[$game.$teams[1]];
      	}
        //displaying everything
        echo "<p>".$scores[$game][0].$teams[0]." vs. ".$teams[1].$scores[$game][1]."</p>";
        echo "<table>
            <tr>
              <td><input type='submit' name='".$game.$teams[0]."' value='+'/></td>
              <td><input type='submit' name='".$game.$teams[1]."' value='+'/></td>
            </tr>
            <tr>
              <td><input type='submit' name='".$game.$teams[0]."' value='-'/></td>
              <td><input type='submit' name='".$game.$teams[1]."' value='-'/></td>
            </tr>
            </table>";
        echo "</td>";
        if ($counter == 1) {
          echo "</tr>";
          $counter = 0;
        } else {
          $counter ++;
        }
      }
    echo "</table>";
		echo "Test 1";
  ?>
  </form>
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
</body>
</html>
