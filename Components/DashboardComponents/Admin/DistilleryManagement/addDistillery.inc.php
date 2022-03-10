<?php
if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';

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
$dbConnection->close();
