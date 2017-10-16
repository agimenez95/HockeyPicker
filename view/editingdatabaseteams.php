<?php
require '../logic/prereq.php';

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
<meta charset="utf-8">
<title></title>
</head>
<body>
  <h1>Hockey Picker - Admin Team Select Page</h1>
  <form action="../logic/insertweeklymatchup.php" method="post">
    <?php
      for ($i=0; $i < 6; $i++):
    ?>
    <p> Home team for match <?=$i+1;?></p>
        <select name=matches[<?=$i?>][home]>
          <?php foreach ($teams as $id => $team): ?>
            <option value=<?=$id;?>><?=$team;?></option>
          <?php endforeach;?>
        </select>
        <br>
        <br>
    <p> Away team for match <?=$i+1;?></p>
        <select name=matches[<?=$i?>][away]>
          <?php foreach ($teams as $id => $team): ?>
            <option value=<?=$id;?>><?=$team;?></option>
          <?php endforeach;?>
        </select>
        <br>
        <br>
    <?php
      endfor;
    ?>
    <button type="submit" >Submit matches for week 1</button>
  </form>
</body>
</html>
