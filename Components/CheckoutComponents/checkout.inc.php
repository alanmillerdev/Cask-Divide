<?php

//Security



//Check if the user is logged in

session_start();

if (!isset($_SESSION['UserID'])) {
    header("Location: ../../login.php?msg=buy");
}

include '../../Database/dbConnect.inc.php';

$dbConnection = Connect();


$caskID = $_POST['CaskID'];
$percentageRequested = $_POST['PercentageRequested'];

echo $caskID;
echo $percentageRequested;

//Check if the Percentage is still available

if ($PercentageAvilable >= $percentageRequested) {
    //Checkout
    echo 'bruh';
} elseif ($PercentageAvilable < $percentageRequested) {
    header("Location: ../../product.php?sku=$caskID&msg=percentage");
} elseif ($PercentageAvilable == 0) {
    header("Location: ../../product.php?sku=$caskID&msg=oos");
} else {
    header("Location: ../../product.php?sku=$caskID&msg=err");
}
