<?php
if (!defined('SecurityCheck')) {
    exit(header("Location: ../../index.php"));
  };
  
  include 'Database/dbConnect.inc.php';
  $dbConnection = Connect();


  $caskID = $_GET['sku'];
  $percentageCheck = intval($_GET['percentageCheck']);
  $finalPercentage = intval($_GET['finalPercentage']);
  
  function PercentageAvailable($dbConnection, $percentageCheck, $PercentageAvilable, $caskID, $finalPercentage)
  {    
    $sql = $dbConnection->query("SELECT PercentageAvailable from Cask WHERE PercentageAvailable >= $percentageCheck AND CaskID = $caskID");
    $row = mysqli_fetch_array($sql);
    $PercentageAvilable = $row[0];
  
    if ($PercentageAvilable >= $percentageCheck) {
        return true;
    } elseif ($PercentageAvilable < $percentageCheck) {
        header("Location: ../../product.php?sku=$caskID&msg=percentage");
    } elseif ($PercentageAvilable == 0) {
        header("Location: ../../product.php?sku=$caskID&msg=oos");
    } else {
        header("Location: ../../product.php?sku=$caskID&msg=err");
    }
  
  }
?>