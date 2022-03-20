<?php

define('SecurityCheck', TRUE);

$PageTitle = "Product";
include 'Components/RequiredComponents/header.inc.php';
include 'Components/RequiredComponents/styles.inc.php';

?>

<div class="content">

<?php

include('Components/RequiredComponents/navbar.inc.php');

include('Components/ProductComponents/ProductInfo.inc.php');

include('Components/ProductComponents/ProductOrigin.inc.php');

include('Components/RequiredComponents/footer.inc.php');

include 'Components/RequiredComponents/bootstrapJS.inc.php';

?>