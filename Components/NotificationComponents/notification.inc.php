<?php
    if(!defined('SecurityCheck')) {
    exit(header("Location: ../../index.php"));
    }

function createNoti($dbConnection, $userID, $notiType, $notiText) {
    $sql = "INSERT INTO notification (UserID, NotificationType, NotificationText) VALUES ('$userID', '$notiType', '$notiText')";
    $query = mysqli_query($dbConnection, $sql);
}
?>