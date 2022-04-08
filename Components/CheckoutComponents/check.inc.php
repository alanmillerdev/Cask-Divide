<?php
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