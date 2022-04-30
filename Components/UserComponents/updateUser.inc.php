<?php
if (getenv('REQUEST_METHOD') != "POST") {
  header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

include '../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$userID = $_POST['UserID'];
$firstName = $_POST['FirstName'];
$lastName = $_POST['LastName'];
$email = $_POST['Email'];
$phoneNumber = $_POST['PhoneNumber'];
$currentPassword = $_POST['CurrentPassword'];
$newPassword = $_POST['NewPassword'];
$newPasswordConfirm = $_POST['RepeatNewPassword'];

if (empty($email)) {
  //Password shit
  //Check if the current password verifies with the one stored in the database
  $stmt = $dbConnection->prepare('SELECT Password FROM user WHERE UserID = ?');
  $stmt->bind_param('i', $userID);
  $stmt->execute();
  $stmt->bind_result($hash);
  $stmt->store_result();
  $stmt->fetch();
  if (password_verify($currentPassword, $hash)) {
    //Check if the new password is the same as the confirm password
    if ($newPassword == $newPasswordConfirm) {
      //Check if the new password is the same as the current password
      if ($newPassword != $currentPassword) {
        //Check if the new password is the same as the current password
        $stmt = $dbConnection->prepare('UPDATE user SET Password = ? WHERE UserID = ?');
        $stmt->bind_param('si', password_hash($newPassword, PASSWORD_DEFAULT), $userID);
        $stmt->execute();
        $stmt->close();
        $dbConnection->close();
        header('Location: ../../account-details.php?msg=success');
      } else {
        header('Location: ../../account-details.php?msg=same');
      }
    } else {
      header('Location: ../../account-details.php?msg=nomatch');
    }
  } else {
    header('Location: ../../account-details.php?msg=wrong');
  }
} else {
  $stmt = $dbConnection->prepare('UPDATE user SET FirstName = ?, LastName = ?, Email = ?, PhoneNumber = ? WHERE UserID = ?');
  $stmt->bind_param('ssi', $firstName, $lastName, $email, $phoneNumber, $userID);
  $stmt->execute();
  header('Location: ../../account-details.php?msg=updated');
}
