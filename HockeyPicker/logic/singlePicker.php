<?php
//require '../logic/prereq.php';
function singlePicker($team1ID, $team2ID, $game){
  $teamman = new TeamManager(getDB());
  $team1 = $teamman->byId($team1ID);
  $team2 = $teamman->byId($team2ID);
  echo "<div id='$game'>";
    echo "<table><tr>";
      echo "<td><h3 id='home".$game."'>0</h3></td>";
      echo "<td><h3>".$team1->getName()." vs. ".$team2->getName()."</h3></td>";
      echo "<td><h3 id='away".$game."'>0</h3></td>";
    echo "</tr></table>";
    echo "<table>
          <tr>
            <td><button type='button' onclick='changeScore($game, \"home\", \"+\")'>+</button></td>
            <td><button type='button' onclick='changeScore($game, \"away\", \"+\")'>+</button></td>
          </tr>
          <tr>
            <td><button type='button' onclick='changeScore($game, \"home\", \"-\")'>-</button></td>
            <td><button type='button' onclick='changeScore($game, \"away\", \"-\")'>-</button></td>
          </tr>
        </table>";
  echo "</div>";
}

?>
