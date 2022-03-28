<?php

//Security

//Database
include '../../Database/dbConnect.inc.php';

$dbConnection = Connect();
$userID = $_POST['UserID'];
$caskID = $_POST['CaskID'];
$PercentageRequested = $_POST['percentage'];
?>

<?php

CheckoutStart($dbConnection, $caskID, $userID, $PercentageRequested, $percentageAvilable);

function CheckoutStart($dbConnection, $caskID, $userID, $PercentageRequested, $percentageAvilable)
{

    session_start();

    if(empty($_SESSION["UserID"])) {
        header("Location: ../../login.php?msg=buy");
     } else
     {
        if (PercentageAvailable($dbConnection, $PercentageRequested, $percentageAvilable, $caskID)) {
            header("Location: ../../checkout.php?sku=$caskID&uid=$userID&percentage=$PercentageRequested");
        }
     }
};

function PercentageAvailable($dbConnection, $PercentageRequested, $PercentageAvilable, $caskID)
{
    $result = $dbConnection->query("SELECT PercentageAvailable FROM Cask WHERE CaskID = $caskID");
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