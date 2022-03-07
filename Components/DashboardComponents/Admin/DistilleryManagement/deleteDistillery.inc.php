<?php

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$distilleryName = $_POST["DistilleryName"];

$DeleteQuery ="DELETE FROM Distillery WHERE DistilleryName='$DistilleryName'";
$result=mysqli_query($dbConnection, $DeleteQuery) or die(mysqli_error($dbConnection));
header('location:../dashboard.php');
?>