<?php

$teamID = 1;
if (isset($_SESSION['userId'])) {
  $customermanager = new CustomerManager(getDB());
  $customer = $customermanager->byId($_SESSION['userId']);
  $teamID=$customer->getTeamSupport();
} else {
  $teamID = -1;
}


//Carolina Hurricanes
if ($teamID==1) {

  echo '<body style="background-color:#b3180e;">';
  echo '<html style="background-color:#b3180e;">';

}

//Columbus Blue Jackets
elseif ($teamID==2) {

 echo '<body style="background-color:rgb(6, 17, 41);">';
 echo '<html style="background-color:rgb(6, 17, 41);">';

}

//new jersey devils
elseif ($teamID==3) {
echo '<body style="background-color:rgb(209, 94, 115);">';
echo '<html style="background-color:rgb(209, 94, 115);">';
}
