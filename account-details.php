<?php
define('SecurityCheck', TRUE);
$PageTitle = "Account";
include 'Components/RequiredComponents/header.inc.php';
include 'Components/RequiredComponents/styles.inc.php';
include('Components/RequiredComponents/navbar.inc.php');
include 'Database/dbConnect.inc.php';

?>

<!--QUERY TO FIND USER ID-->
    <?php
    $dbConnection = Connect();

    $query="SELECT * FROM user WHERE UserID='$_SESSION[UserID]'";
    $result = mysqli_query($dbConnection, $query)
    or die ("couldn't run query");

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>


    <?php
    include('Components/UserComponents/accountDetails.inc.php');
    ?>

<?php } ?>

    <?php
    include('Components/RequiredComponents/footer.inc.php');
    include 'Components/RequiredComponents/bootstrapJS.inc.php';
    ?>