<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$UpdateQuery = "UPDATE distillery SET DistilleryName ='{$_POST['NameOfDistillery']}', Description ='{$_POST['Description']}' WHERE DistilleryName = '{$_POST['NameOfDistillery']}'";
$up_var=mysqli_query($dbConnection, $UpdateQuery) or die(mysqli_error($dbConnection));
echo $UpdateQuery;
header('location:../../../../dashboard/show-distillery.php?msg=updated');
