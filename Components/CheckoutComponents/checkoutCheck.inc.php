
<?php
include '../../Database/dbConnect.inc.php';


$dbConnection = Connect();
session_start();
$caskID = $_POST['caskID'];
$percentage = $_POST['percent'];
$userID = $_SESSION['UserID'];
$result = $dbConnection->query("SELECT PercentageAvailable FROM Cask WHERE CaskID = $caskID");
$row = mysqli_fetch_array($result);
$PercentageAvailable = $row[0];
?>
<?php

CheckoutCheck($dbConnection, $caskID, $percentage, $userID, $PercentageAvailable);

function CheckoutCheck($dbConnection, $caskID, $percentage, $userID, $PercentageAvailable) 
{


  if(empty($_SESSION['UserID'])){
    header("Location: ../../login.php?msg=buy");
  } else{
    if(PercentageAvailable($dbConnection, $percentage, $caskID, $PercentageAvailable)) {
        $sqlQuery ="UPDATE Cask SET PercentageAvailable = PercentageAvailable - $percentage WHERE CaskID = $caskID";
        $queryResult = @mysqli_query($dbConnection, $sqlQuery);
    }
  }
}

                function PercentageAvailable($dbConnection, $percentage, $caskID, $PercentageAvailable) {
                  $result = $dbConnection->query("SELECT PercentageAvailable FROM Cask WHERE CaskID = $caskID");
                  $row = mysqli_fetch_array($result);
                  $PercentageAvailable = $row[0];
              
                  if ($PercentageAvailable >= $percentage) {
                      return true;
                  } 
                  elseif($PercentageAvailable < $finalPercentage) {
                    header("Location: ../../index.php?sku=$caskID&msg=percentage");
                  }
                  elseif ($PercentageAvailable < $percentage) {
                      header("Location: ../../index.php?sku=$caskID&msg=percentage");
                  } elseif ($PercentageAvailable == 0) {
                      header("Location: ../../index.php?sku=$caskID&msg=oos");
                  } else {
                      header("Location: ../../index.php?sku=$caskID&msg=err");
                  }
                }
?>