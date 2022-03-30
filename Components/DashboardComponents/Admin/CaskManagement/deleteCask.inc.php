<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$caskID = $_GET["CaskID"];

$DeleteQuery = "DELETE FROM cask WHERE CaskID='$caskID'";
$result = mysqli_query($dbConnection, $DeleteQuery) or die(mysqli_error($dbConnection));
header('location:../../../../dashboard/edit-casks.php');
