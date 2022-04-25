<?php
define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';

require '../../../NotificationComponents/notification.inc.php';

$dbConnection = Connect();

session_start();

try {
    $distilleryName = $_GET["DistilleryName"];

    $DeleteQuery = "DELETE FROM Distillery WHERE DistilleryName='$distilleryName'";
    $result = mysqli_query($dbConnection, $DeleteQuery) or die(mysqli_error($dbConnection));
    createNoti($dbConnection, $_SESSION['UserID'], "Delete Distillery", "$_SESSION[FullName] has deleted the distillery named $distilleryName");
    header("Location: ../../../../dashboard/show-distillery.php?msg=deleted");
} catch (Exception $e) {
    header("Location: ../../../../dashboard/show-distillery.php?msg=linkedCasks");
} finally {
    mysqli_close($dbConnection);
}
