<?php
define('SecurityCheck', TRUE);
include('../Components/DashboardComponents/Template/header.inc.php');

include('../Components/DashboardComponents/Template/sidebar.inc.php');

?>

<div class="dashboardContent" style="margin-left: 110px;">
<?php

include('../Components/DashboardComponents/DashboardType/dashboardType.inc.php');

include('../Components/DashboardComponents/Admin/UserManagement/displayUserTable.inc.php');
?>
</div>

<?php

include('../Components/DashboardComponents/Template/heading.inc.php'); 

include('../Components/DashboardComponents/Template/scripts.inc.php'); 

?>