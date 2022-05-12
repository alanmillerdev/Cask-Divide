<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

require '../../Database/dbConnect.inc.php';

$dbConnection = Connect();

require '../NotificationComponents/notification.inc.php';

//Destroy session, redirect user to logged out index
function LogOut($dbConnection)
{
  
  session_start();

  if($_SESSION['UserType'] == 'Admin')
  {
    $date = date('Y/m/d H:i:s');
    createNoti($dbConnection, $_SESSION['UserID'], "Logout", "$_SESSION[FullName] has logged out on $date");
  }

  session_destroy();
  header("Location: ../../index.php?msg=logoutSuccess");
}

LogOut($dbConnection);
