
<?php
$prizeMoney=1000;

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link rel="stylesheet" href="/css/prizemoney.css">
    <title>Super Skate</title>
  </head>
  <body>

    <div id="PrizeMoneyContainer">
      <form class="prizeMoneyDisplay" action="registernewuser.php" method="post">


        <h1>THE PRIZE MONEY CURRENTLY STANDS AT:<br><br>
        <center><strong><?php echo "£".$prizeMoney?></strong></center></h1>


        <h2><a href="registernewuser.php">Login</a> to try and win this week.</h2>
            <h2>Good Luck!</h2>



              </form>

    </div>


  </body>
</html>
