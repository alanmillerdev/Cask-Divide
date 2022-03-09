<?php

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$caskName = $_POST['NameOfCask'];
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

$allowed_types =array('jpg','png', 'jpeg')
$error = null;

// Get the file extension
$extension = pathinfo($caskImage, PATHINFO_EXTENSION);

// Search the array for the allowed file type

if (in_array($extension, $allowed_types, false) != true) {

    $error = "ERROR: ILLEGAL FILE TYPE";
    return $error; // or use  exit;
}


//Prepared Statement
$stmt = $dbConnection->prepare("INSERT INTO cask (CaskName, CaskDescription, PercentageAvailable, WholeCaskPrice, OLA, RLA, PercentageAlcohol, CaskType, WoodType, DistilleryName, CaskImage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssddddissss", $CaskName, $CaskDescription, $PercentageAvailable, $WholeCaskPrice, $OLA, $RLA, $PercentageAlcohol, $CaskType, $WoodType, $DistilleryName, $CaskImage);

$CaskName = $caskName;
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
$stmt->close();
$dbConnection->close();
