
<?php
define('SecurityCheck', TRUE);

include '../Database/dbConnect.inc.php';

$dbConnection = Connect();

include('../Components/DashboardComponents/Template/header.inc.php');

include('../Components/DashboardComponents/Template/sidebar.inc.php');

include('../Components/DashboardComponents/Template/mainDashboardCards.inc.php');

include('../Components/DashboardComponents/Template/scripts.inc.php');

?>
