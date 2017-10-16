<div id="login">
  <?php
  if(isset($_SESSION['userId'])){
    $custman = new CustomerManager(getDB());
    $cust = $custman->byID($_SESSION['userId']);
    $username = $cust->getUsername();
  }
  ?>
  <p>Welcome <?=$username;?> - <a href="../logic/logout.php">Log Out</a></p>
</div>
