<?php
if(!defined('SecurityCheck')) {
  exit(header("Location: ../../../../index.php"));
}

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$caskID = $_POST["CaskID"];

$DeleteQuery ="DELETE FROM Cask WHERE CaskID='$caskID'";
$result=mysqli_query($dbConnection, $DeleteQuery) or die(mysqli_error($dbConnection));
header('location:../dashboard.php');
