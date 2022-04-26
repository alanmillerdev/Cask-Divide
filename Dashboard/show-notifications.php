<?php
define('SecurityCheck', TRUE);

include '../Database/dbConnect.inc.php';

$dbConnection = Connect();

$sql = "SELECT * FROM notification";

$query = mysqli_query($dbConnection, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

// define how many results you want per page
$results_per_page = 10;

// find out the number of results stored in database
$result = mysqli_query($dbConnection, $sql);
$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

include('../Components/DashboardComponents/Template/header.inc.php');

include('../Components/DashboardComponents/Template/sidebar.inc.php');

include('../Components/DashboardComponents/Template/notificationsTable.php'); 

include('../Components/DashboardComponents/Template/scripts.inc.php'); 

?>