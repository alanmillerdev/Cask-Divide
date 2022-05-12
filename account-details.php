<?php
define('SecurityCheck', TRUE);
$PageTitle = "Account";
include 'Components/RequiredComponents/header.inc.php';
include 'Components/RequiredComponents/styles.inc.php';
include('Components/RequiredComponents/navbar.inc.php');
include 'Database/dbConnect.inc.php';

?>

    <?php
    include('Components/UserComponents/accountDetailsForm.inc.php');
    ?>

    <?php
    include('Components/UserComponents/show-investment.inc.php');
    ?>

    <?php
    include('Components/RequiredComponents/footer.inc.php');
    include 'Components/RequiredComponents/bootstrapJS.inc.php';
    ?>