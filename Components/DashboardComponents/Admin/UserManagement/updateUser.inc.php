<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$UserID = $_POST["UserID"];

$UpdateQuery ="UPDATE user SET UserID='{$_POST['UserID']}', 
Email='{$_POST['Email']}', FirstName='{$_POST['FirstName']}', LastName='{$_POST['LastName']}', PhoneNumber='{$_POST['PhoneNumber']}' WHERE UserID='{$UserID}'";
$up_var=mysqli_query($dbConnection, $UpdateQuery) or die(mysqli_error($dbConnection));
echo $UpdateQuery;
header('location:../../../../dashboard/show-users.php');

?>
