<?php
if (isset($_SESSION['login'])) {
  include('../includes/session-logout.inc.php');
} else {
  include('../includes/session-login.inc.php');
}
?>
