<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$CaskID = $_POST["CaskID"];

$UpdateQuery ="UPDATE cask SET CaskID='{$_POST['CaskID']}', 
CaskName='{$_POST['CaskName']}', CaskDescription='{$_POST['CaskDescription']}', PercentageAvailable='{$_POST['PercentageAvailable']}', 
WholeCaskPrice='{$_POST['WholeCaskPrice']}', OLA='{$_POST['OLA']}', RLA='{$_POST['RLA']}', PercentageAlcohol='{$_POST['PercentageAlcohol']}', 
CaskType='{$_POST['CaskType']}', WoodType='{$_POST['WoodType']}', DistilleryName='{$_POST['DistilleryName']}', CaskImage='{$_POST['CaskImage']}' WHERE CaskID='{$CaskID}'";
$up_var=mysqli_query($dbConnection, $UpdateQuery) or die(mysqli_error($dbConnection));
echo $UpdateQuery;
header('location:../../../../dashboard/show-casks.php');

?>
