<?php
define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$userID = $_GET["UserID"];
//try catch 
try {
  $SelectQuery = "SELECT FROM user WHERE UserID=$userID";
  $result = mysqli_query($dbConnection, $SelectQuery);
  if ($result === TRUE) {
    $Delete = "DELETE `notification` from `user` INNER JOIN `notification` WHERE `notification`.UserID=$userID";
    $deleteResult = mysqli_query($dbConnection, $SelectQuery);
    if($deleteResult) {
       header('location:../../../../Dashboard/show-users.php?success');
    }
  } elseif ($result === FALSE) {
    header('location:../../../../Dashboard/edit-user.php?UserID='.$userID.'&error');
  }
} catch (Exception $e) {
  header('location:../../../../Dashboard/edit-user.php');
}
