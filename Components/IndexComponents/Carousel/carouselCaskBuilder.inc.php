<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../../index.php"));
  }
  
require 'Database/dbConnect.inc.php';
require 'carouselCask.inc.php';

$dbConnection = Connect();

$sql = "SELECT CaskName, CaskDescription, CaskImage FROM cask ORDER BY CaskID LIMIT 3";
$query = mysqli_query($dbConnection, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

$count = 0;

foreach ($result as $cask) {

    if ($count == 0) {
        $class = "carousel-item active";
    } else {
        $class = "carousel-item";
    }

    echo generateCask($cask['CaskName'], $cask['CaskDescription'], $cask['CaskImage'], $class);

    $count++;
};

// Free result set
mysqli_free_result($query);

mysqli_close($dbConnection);
