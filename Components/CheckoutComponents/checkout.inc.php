<?php

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$percentage = $_POST['PercentageOfCask'];
$caskID = $_POST['CaskID'];

//Check if the Percentage is still available

$sql = "SELECT CaskID FROM cask WHERE CaskID = $caskID";

$result = mysqli_query($dbConnection, $sql);

?>