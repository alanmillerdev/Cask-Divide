<?php

//Security

//Database
include '../../Database/dbConnect.inc.php';

$dbConnection = Connect();
$userID = $_SESSION['UserID'];
$caskID = $_GET['sku'];
$PercentageRequested = $_GET['percentage'];
?>
                    <?php
                        // Create a new DOM Document
                        $dom = new DOMDocument();
                        // Enable validate on parse
                        $dom->validateOnParse = true;
                        // Get the tag name
                        $PercentageRequested = $dom->getElementById('formControlRange')->textContent;
                        intval($PercentageRequested);
                        

  
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
            header("Location: ../../checkout.php?sku=$caskID&uid=$userID&percentage=$percent");
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