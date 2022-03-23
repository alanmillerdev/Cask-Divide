<?php

//Security

//Check if the user is logged in

session_start();

if (!isset($_SESSION['UserID'])) {
    header("Location: ../../login.php?msg=buy");
}

//Database
include '../../Database/dbConnect.inc.php';

$dbConnection = Connect();
$userID = $_SESSION['UserID'];
$caskID = 3; //$_POST['CaskID'];
$percentageRequested = 95; //$_POST['PercentageRequested'];

CheckoutStart($dbConnection, $caskID, $userID, $percentageRequested, $percentageAvilable);

function CheckoutStart($dbConnection, $caskID, $userID, $percentageRequested, $percentageAvilable)
{
    if (PercentageAvailable($dbConnection, $percentageRequested, $percentageAvilable, $caskID)) 
    {
        header("Location: ../../checkout.php?id=$caskID&uid=$userID&percent=$percentageRequested");
    }
};

function PercentageAvailable($dbConnection, $percentageRequested, $PercentageAvilable, $caskID)
{
    $result = $dbConnection->query("SELECT PercentageAvailable FROM Cask WHERE CaskID = $caskID");
    $row = mysqli_fetch_array($result);
    $PercentageAvilable = $row[0];

    if ($PercentageAvilable >= $percentageRequested) {
        return true;
    } elseif ($PercentageAvilable < $percentageRequested) {
        header("Location: ../../product.php?sku=$caskID&msg=percentage");
    } elseif ($PercentageAvilable == 0) {
        header("Location: ../../product.php?sku=$caskID&msg=oos");
    } else {
        header("Location: ../../product.php?sku=$caskID&msg=err");
    }
};
