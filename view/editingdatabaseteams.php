<?php
include_once '../logic/prereq.php';
$pdo = getDB();

$teams = array();

$r = $pdo->query(
    "select name, id from Teams order by name asc"
);

foreach ($r as $row){
    $teams[$row['id']] = $row['name'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <style media="screen">
    h1 {
      text-align: center;
    }
    h2 {
      text-align: center;
    }
    .matchContainer{
      display: flex;
      margin: auto;
      width: 1200px;
      flex-wrap: wrap;
    }
    .matchSelector{
      padding: 5px;
      border: 1px solid #CCC;
      margin: 15px;
      width: 400px;
    }
    .teamSelectorHome{
      float: left;
    }
    .teamSelectorAway{
      float: right;
    }
  </style>
<meta charset="utf-8">
<title></title>
</head>
<body>
  <h1>NHL Gotta pick 'em all - Admin Fixture Selector</h1>
  <form action="../logic/insertweeklymatchup.php" method="post">
    <div class="matchContainer">
    <?php
      for ($i=0; $i < 6; $i++):
    ?>
    <div class= "matchSelector">
    <h2>Match <?=$i+1;?></h2>
      <div class= "teamSelectorHome">
        <p>Home team</p>
        <select name=matches[<?=$i?>][home]>
          <?php foreach ($teams as $id => $team): ?>
            <option value=<?=$id;?>><?=$team;?></option>
          <?php endforeach;?>
        </select>
      </div>
      <div class= "teamSelectorAway">
        <p>Away team</p>
        <select name=matches[<?=$i?>][away]>
          <?php foreach ($teams as $id => $team): ?>
            <option value=<?=$id;?>><?=$team;?></option>
          <?php endforeach;?>
        </select>
      </div>
    </div>
    <?php
      endfor;
    ?>
    </div>
    <button type="submit" >Submit matches for week 1</button>
  </form>
</body>
</html>
