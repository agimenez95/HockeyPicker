<div id="navHeader">
    <div class="container">
        <div class="row mart-28 padt-10">
          <div id="loginDiv" class="disp-in padb-8 fs-8">
          <?php
          if (isset($_SESSION['login'])) {
            include('../includes/session-logout.inc.php');
          } else {
            include('../includes/session-login.inc.php');
          }
          ?>
        </div>
            <div id="logoDiv" class="disp-in padb-8 fs-8">
                <a href="../index.php"><img src="../logo.png" alt="logo"></a>
            </div>

        </div>
        <div class="disp-block row" style="margin-top:2%; margin-left:3%">
            <ul id="navList" class="list-inline">
                <li><a href="index.php">How To Play</a></li>
                <li><a href="scorepicker.php">Predictions</a></li>
                <li><a href="https://www.nhl.com/standings">League Tables</a></li>
                <li><a href="https://www.nhl.com/news">News</a></li>
            </ul>
        </div>
    </div>
</div>
