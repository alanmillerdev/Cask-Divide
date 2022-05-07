<?php
define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$userID = $_GET["UserID"];
//try catch 
try {
  $SelectQuery = "SELECT * FROM investment WHERE UserID=$userID";
  $result = mysqli_query($dbConnection, $SelectQuery);
  $rows = mysqli_num_rows($result);
  if ($rows === 0) {
    $DeleteN = "DELETE `notification` from `user` INNER JOIN `notification` WHERE `notification`.UserID=$userID";
    $NdeleteResult = mysqli_query($dbConnection, $DeleteN);
    if($NdeleteResult) {
      $Delete = "DELETE `user` from `notification` INNER JOIN `user` WHERE `user`.UserID=$userID";
      $deleteResult = mysqli_query($dbConnection, $Delete);
    if($deleteResult === TRUE) {
       header('location:../../../../Dashboard/show-users.php?success');
    }
    else {
      header('location:../../../../Dashboard/show-users.php?sqlError');
    }
  }

  } elseif ($result === FALSE) {
    header('location:../../../../Dashboard/edit-user.php?UserID='.$userID.'&error');
  }
} catch (Exception $e) {
  header('location:../../../../Dashboard/edit-user.php');
}
