<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();
session_start();
$userID = $_SESSION['UserID'];
$CaskName = $_POST['CaskName'];
$caskDescription = $_POST['CaskDescription'];
$percentageAvailable = $_POST['PercentageAvailable'];
$wholeCaskPrice = $_POST['WholeCaskPrice'];
$ola = $_POST['OLA'];
$rla = $_POST['RLA'];
$percentageAlcohol = $_POST['PercentageAlcohol'];
$caskType = $_POST['CaskType'];
$woodType = $_POST['WoodType'];
$distilleryName = $_POST['DistilleryName'];
$caskImage = base64_encode(file_get_contents($_FILES["CaskImage"]["tmp_name"]));
$allowed_types = array('jpg', 'png', 'jpeg');
$uploadOk = 1;

// Get the file extension
$extension = pathinfo($_FILES["CaskImage"]["name"], PATHINFO_EXTENSION);

// Search the array for the allowed file type
//Implement Error Message Here

// Check file size
if ($_FILES["CaskImage"]["size"] > 500000) {
  header("Location: ../../../../Dashboard/add-cask.php?msg=image");
  $uploadOk = 0;
}

// Allow certain file formats
if($extension != "jpg" && $extension != "png" && $extension != "jpeg"
&& $extension != "gif" ) {
 
  $uploadOk = 0;
}

if (in_array($extension, $allowed_types, false) != true) {
  exit();
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "The image is too large, please try a smaller image";
// if everything is ok, try to upload file
} else {

//Prepared Statement
$stmt = $dbConnection->prepare("INSERT INTO cask (CaskName, CaskDescription, PercentageAvailable, WholeCaskPrice, OLA, RLA, PercentageAlcohol, CaskType, WoodType, DistilleryName, CaskImage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssddddissss", $CaskName, $CaskDescription, $PercentageAvailable, $WholeCaskPrice, $OLA, $RLA, $PercentageAlcohol, $CaskType, $WoodType, $DistilleryName, $CaskImage);

$CaskName = $CaskName;
$CaskDescription = $caskDescription;
$PercentageAvailable = $percentageAvailable;
$WholeCaskPrice = $wholeCaskPrice;
$OLA = $ola;
$RLA = $rla;
$PercentageAlcohol = $percentageAlcohol;
$CaskType = $caskType;
$WoodType = $woodType;
$DistilleryName = $distilleryName;
$CaskImage = $caskImage;
$stmt->execute();
$name = $_SESSION['FullName'];
include("../../../NotificationComponents/notification.inc.php");
createNoti($dbConnection, $userID, "Add", "$name has added a new cask: $CaskName");
$stmt->close();
$dbConnection->close();
header("Location: ../../../../Dashboard/show-casks.php");
}