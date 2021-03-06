<?php
//require '../logic/prereq.php';
function singlePicker($team1ID, $team2ID, $game){
  $teamman = new TeamManager(getDB());
  $team1 = $teamman->byId($team1ID);
  $team2 = $teamman->byId($team2ID);
  echo "<div class='matchSelector' id='$game'>";
    echo "<table><tr>";
      echo "<td><h3 class='score' id='home".$game."'>0</h3></td>";
      echo "<td><input  type='hidden' name='home$game' value='0'/><td>";
      echo "<td><h3 style='text-align:center;'>".$team1->getName()." vs. ".$team2->getName()."</h3></td>";
      echo "<td><h3 class='score' id='away".$game."'>0</h3></td>";
      echo "<td><input class='score' type='hidden' name='away$game' value='0'/><td>";
    echo "</tr></table>";
    echo "<table >
          <tr class='scorePickerBtn'>
            <td><button  class='btn' type='button' onclick='changeScore(\"home\", $game, \"+\")'>+</button></td>
            <td><button class='btn' type='button' onclick='changeScore(\"away\", $game, \"+\")'>+</button></td>
          </tr>
          <tr class='scorePickerBtn'>
            <td><button class='btn' type='button' onclick='changeScore(\"home\", $game, \"-\")'>-</button></td>
            <td><button class='btn' type='button' onclick='changeScore(\"away\", $game, \"-\")'>-</button></td>
          </tr>
        </table>";
  echo "</div>";
}
