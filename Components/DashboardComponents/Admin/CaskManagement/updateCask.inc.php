<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';
include '../../../NotificationComponents/notification.inc.php';
session_start();
$dbConnection = Connect();

$caskID = $_POST['CaskID'];
$caskName = $_POST['CaskName'];
$caskDescription = $_POST['CaskDescription'];
$percentageAvailable = $_POST['PercentageAvailable'];
$wholeCaskPrice = $_POST['WholeCaskPrice'];
$ola = $_POST['OLA'];
$rla = $_POST['RLA'];
$percentageAlcohol = $_POST['PercentageAlcohol'];
$caskType = $_POST['CaskType'];
$woodType = $_POST['WoodType'];
$distilleryName = $_POST['DistilleryName'];
$userID = $_SESSION['UserID'];
if (isset($_FILES['CaskImage']) && $_FILES['CaskImage']['size'] > 0) {
  $caskImage = base64_encode(file_get_contents($_FILES["CaskImage"]["tmp_name"]));
}

if (isset($_FILES['CaskImage']) && $_FILES['CaskImage']['size'] > 0) {
  $sql = "UPDATE cask SET CaskName = '$caskName', CaskDescription = '$caskDescription', PercentageAvailable = '$percentageAvailable', WholeCaskPrice = '$wholeCaskPrice', OLA = '$ola', RLA = '$rla', PercentageAlcohol = '$percentageAlcohol', CaskType = '$caskType', WoodType = '$woodType', DistilleryName = '$distilleryName', CaskImage = '$caskImage' WHERE CaskID = $caskID";
  mysqli_query($dbConnection, $sql);
  $name = $_SESSION['FullName'];
  createNoti($dbConnection, $userID, "Update", "$name has updated a cask: $caskName");

 
  header('location:../../../../dashboard/show-casks.php');
} else {
  $sql = "UPDATE cask SET CaskName = '$caskName', CaskDescription = '$caskDescription', PercentageAvailable = '$percentageAvailable', WholeCaskPrice = '$wholeCaskPrice', OLA = '$ola', RLA = '$rla', PercentageAlcohol = '$percentageAlcohol', CaskType = '$caskType', WoodType = '$woodType', DistilleryName = '$distilleryName' WHERE CaskID = $caskID";
  mysqli_query($dbConnection, $sql);
  $name = $_SESSION['FullName'];
  createNoti($dbConnection, $userID, "Update", "$name has updated a cask: $caskName");
  header('location:../../../../dashboard/show-casks.php');
};
