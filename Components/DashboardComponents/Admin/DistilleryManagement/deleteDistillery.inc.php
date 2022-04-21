<?php
define('SecurityCheck', TRUE);

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

try {
    $distilleryName = $_GET["DistilleryName"];

    $DeleteQuery = "DELETE FROM Distillery WHERE DistilleryName='$distilleryName'";
    $result = mysqli_query($dbConnection, $DeleteQuery) or die(mysqli_error($dbConnection));
    header("Location: ../../../../dashboard/show-distillery.php?msg=deleted");
} catch (Exception $e) {
    header("Location: ../../../../dashboard/show-distillery.php?msg=linkedCasks");
} finally {
    mysqli_close($dbConnection);
}
