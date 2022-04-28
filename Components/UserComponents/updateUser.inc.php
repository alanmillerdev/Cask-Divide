<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

include '../../Database/dbConnect.inc.php';


$UserID = $_POST['UserID'];
$result = mysqli_query($dbConnection, $query);

$UpdateQuery ="UPDATE user SET UserID='{$_POST['UserID']}', 
Email='{$_POST['Email']}', PhoneNumber='{$_POST['PhoneNumber']}', Password='{$_POST['Password']}', Password='{$_POST['Password']}' WHERE UserID='{$UserID}'";
$up_var=mysqli_query($dbConnection, $UpdateQuery) or die(mysqli_error($dbConnection));
echo $UpdateQuery;
header('location:../../account-details.php');

?>
