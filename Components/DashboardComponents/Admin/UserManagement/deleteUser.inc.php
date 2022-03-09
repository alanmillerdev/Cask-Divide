<?php

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$userID = $_POST["UserID"];

$DeleteQuery ="DELETE FROM user WHERE userID='$userID'";
$result=mysqli_query($dbConnection, $DeleteQuery) or die(mysqli_error($dbConnection));
header('location:../dashboard.php');
