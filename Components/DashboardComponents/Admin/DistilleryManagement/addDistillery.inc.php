<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

session_start();

include '../../../../Database/dbConnect.inc.php';

require '../../../NotificationComponents/notification.inc.php';

$dbConnection = Connect();

$distilleryName = $_POST['NameOfDistillery'];
$description = $_POST['Description'];

//Prepared Statement
$stmt = $dbConnection->prepare("INSERT INTO distillery (DistilleryName, Description) VALUES (?, ?)");
$stmt->bind_param("ss", $DistilleryName, $Description);

$DistilleryName = $distilleryName;
$Description = $description;
$stmt->execute();

$stmt->close();

createNoti($dbConnection, $_SESSION['UserID'], "Add Distillery", "$_SESSION[FullName] has added a new distillery named $distilleryName");

$dbConnection->close();
header("Location: ../../../../dashboard/show-distillery.php?msg=added");
