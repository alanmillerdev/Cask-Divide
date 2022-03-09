<?php

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$caskName = $_POST['NameOfCask'];
$percentageAvailable = $_POST['PercentageAvailable'];
$wholeCaskPrice = $_POST['WholeCaskPrice'];
$ola = $_POST['OLA'];
$rla = $_POST['RLA'];
$percentageAlcohol = $_POST['PercentageAlcohol'];
$caskType = $_POST['CaskType'];
$woodType = $_POST['WoodType'];
$distilleryName = $_POST['DistilleryName'];
$caskImagePath = $_POST[''];

//Prepared Statement
$stmt = $dbConnection->prepare("INSERT INTO cask (CaskName, PercentageAvailable, WholeCaskPrice, OLA, RLA, PercentageAlcohol, CaskType, WoodType, DistilleryName, CaskImageLocation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sddddissss", $CaskName, $PercentageAvailable, $WholeCaskPrice, $OLA, $RLA, $PercentageAlcohol, $CaskType, $WoodType, $DistilleryName, $CaskImageLocation);

$CaskName = $distilleryName;
$PercentageAvailable = $percentageAvailable;
$WholeCaskPrice = $wholeCaskPrice;
$OLA = $ola;
$RLA = $rla;
$PercentageAlcohol = $percentageAlcohol;
$CaskType = $caskType;
$WoodType = $woodType;
$DistilleryName = $distilleryName;
$CaskImageLocation = $caskImageLocation;

$stmt->execute();
$stmt->close();
$dbConnection->close();
