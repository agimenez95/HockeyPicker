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

  </style>
<meta charset="utf-8">
<title>Fixture Admin </title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/homepage.css"/>
<link rel="stylesheet" href="../css/scorepickerblock.css">
<link rel="icon" href="img/logo.png" type="image/x-icon">
</head>
<body>
  <?php include_once('../includes/productHeader.inc.php'); ?>
	<?php include_once('../includes/navBar.inc.php'); ?>

	<div class="container contentBanner">
			<div class="">
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


        <div id="submitButtonAdmin">
        <button class="btn" type="submit" >Submit matches for the week</button>
      </div>

  </form>
</div>
</div>
</div>
<?php include_once('../includes/footer.inc.php'); ?>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src='../scripts/changescore.js' type="text/javascript"></script>
<script src="editingdatabaseteams.js"></script>
</html>
