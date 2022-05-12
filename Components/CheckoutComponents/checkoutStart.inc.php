<?php

//Security
define('SecurityCheck', TRUE);
if(!isset($_POST['CaskID'])){
    header("Location: ../../index.php");
}
//Database
include '../../Database/dbConnect.inc.php';

$dbConnection = Connect();

?>

<?php
if(isset($_POST['CaskID'])){
    $userID = $_POST['UserID'];
    $caskID = $_POST['CaskID'];
    $PercentageRequested = $_POST['percentage'];
    $result = $dbConnection->query("SELECT PercentageAvailable FROM cask WHERE CaskID = $caskID");
    $row = mysqli_fetch_array($result);
    $PercentageAvilable = $row[0];
    $finalPercentage = $PercentageAvilable - $PercentageRequested;
    CheckoutStart($dbConnection, $caskID, $userID, $PercentageRequested, $PercentageAvilable, $finalPercentage);
} else {
    header("Location: ../../index.php");
}


function CheckoutStart($dbConnection, $caskID, $userID, $PercentageRequested, $PercentageAvilable, $finalPercentage)
{

    session_start();

    if(empty($_SESSION["UserID"])) {
        header("Location: ../../login.php?msg=buy");
     } else
     {
        if (PercentageAvailable($dbConnection, $PercentageRequested, $PercentageAvilable, $caskID, $finalPercentage)) {
            $result = $dbConnection->query("SELECT PercentageAvailable FROM cask WHERE CaskID = $caskID");
            $row = mysqli_fetch_array($result);
            $PercentageAvilable = $row[0];
            $finalPercentage = $PercentageAvilable - $PercentageRequested;
            header("Location: ../../checkout.php?sku=$caskID&uid=$userID&percentage=$PercentageRequested&finalPercentage=$finalPercentage");
        }
     }
};

function PercentageAvailable($dbConnection, $PercentageRequested, $PercentageAvilable, $caskID, $finalPercentage)
{
    $result = $dbConnection->query("SELECT PercentageAvailable FROM cask WHERE CaskID = $caskID");
    $row = mysqli_fetch_array($result);
    $PercentageAvilable = $row[0];

    if ($PercentageAvilable >= $PercentageRequested) {
        return true;
    } elseif ($PercentageAvilable < $PercentageRequested) {
        header("Location: ../../product.php?sku=$caskID&msg=percentage");
    } elseif ($PercentageAvilable == 0) {
        header("Location: ../../product.php?sku=$caskID&msg=oos");
    } else {
        header("Location: ../../product.php?sku=$caskID&msg=err");
    }
};


