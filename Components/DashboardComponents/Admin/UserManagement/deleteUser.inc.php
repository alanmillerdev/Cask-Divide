<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();


$userID = $_POST["UserID"];
//try catch 
try {
  $DeleteQuery = "DELETE FROM user WHERE UserID=$userID";
  $result = mysqli_query($dbConnection, $DeleteQuery);
  if($result === TRUE){
     header('location:../../../../Dashboard/show-users.php');
  } 
  elseif($result === FALSE) {
    header('location:../../../../Dashboard/edit-user.php');
  }
}
catch(Exception $e) {
  header('location:../../../../Dashboard/edit-user.php');
}
