<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}
session_start();


define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';
include("../../../NotificationComponents/notification.inc.php");

$dbConnection = Connect();

$caskID = $_GET["CaskID"];
$userID = $_SESSION['UserID'];

$SelectQuery = "SELECT CaskName FROM cask WHERE CaskID = '$caskID'";
$result = mysqli_query($dbConnection, $SelectQuery);
$row = mysqli_fetch_row($result);
$caskName = $row[0];
$name = $_SESSION['FullName'];

createNoti($dbConnection, $userID, "Delete", "$name has deleted a cask: $caskName");
header('location:../../../../Dashboard/show-casks.php');

$DeleteQuery = "DELETE FROM cask WHERE CaskID='$caskID'";
$result = mysqli_query($dbConnection, $DeleteQuery) or die(mysqli_error($dbConnection));


