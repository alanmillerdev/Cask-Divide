<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();


$userID = $_GET["UserID"];

$DeleteQuery = "DELETE FROM user WHERE userID='$userID'";
$result = mysqli_query($dbConnection, $DeleteQuery) or die(mysqli_error($dbConnection));
header('location:../../../../Dashboard/show-users.php');
