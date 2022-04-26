<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

session_start();

include '../../../../Database/dbConnect.inc.php';

require '../../../NotificationComponents/notification.inc.php';

$dbConnection = Connect();

$UpdateQuery = "UPDATE distillery SET DistilleryName ='{$_POST['NameOfDistillery']}', Description ='{$_POST['Description']}' WHERE DistilleryName = '{$_POST['NameOfDistillery']}'";
$up_var=mysqli_query($dbConnection, $UpdateQuery) or die(mysqli_error($dbConnection));

createNoti($dbConnection, $_SESSION['UserID'], "Edit Distillery", "$_SESSION[FullName] has updated the distillery named $_POST[NameOfDistillery]");

header('location:../../../../Dashboard/show-distillery.php?msg=updated');
