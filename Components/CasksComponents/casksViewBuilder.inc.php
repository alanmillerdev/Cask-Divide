<?php

require 'Database/dbconnect.inc.php';
require 'generateCask.inc.php';

$dbConnection = Connect();

$sql = "SELECT CaskID, CaskName, PercentageAvailable, CaskImageLocation FROM cask ORDER BY CaskID";
$query = mysqli_query($dbConnection, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

foreach ($result as $cask) {
    echo generateCask($cask['CaskID'], $cask['CaskName'], $cask['PercentageAvailable'], $cask['CaskImageLocation']);
};

// Free result set
mysqli_free_result($query);

mysqli_close($dbConnection);
