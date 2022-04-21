<?php
  define('SecurityCheck', TRUE);
  if (!defined('SecurityCheck')) {
    exit(header("Location: ../../index.php"));
  };

  if(!isset($_REQUEST['caskID'])) {
    exit(header("Location: ../../index.php"));
  }
 include "../../Database/dbConnect.inc.php";
 header("Refresh:2");
 $dbConnection = Connect();
 


 $caskID = $_REQUEST['caskID'];
 $percentage = $_REQUEST['cPercent'];
$result = $dbConnection->query("SELECT PercentageAvailable FROM Cask WHERE CaskID = $caskID");
$row = mysqli_fetch_array($result);
$PercentageAvailable = $row[0];
echo $PercentageAvailable;

?>