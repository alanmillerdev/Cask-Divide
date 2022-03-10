<?php
<<<<<<< HEAD

$PageTitle = "Product";
=======
define('SecurityCheck', TRUE);
$PageTitle = $CaskName;
>>>>>>> b30d572b45747d8f66ac85c68fe2803d6e48324f
include 'Components/RequiredComponents/header.inc.php';
include 'Components/RequiredComponents/styles.inc.php';

?>

<div class="content">

    <?php

    include('Components/RequiredComponents/navbar.inc.php');
    
    ?>

    <?php

    include('Components/ProductComponents/ProductInfo.inc.php');

    ?>

    <?php

    include('Components/ProductComponents/ProductOrigin.inc.php');

    ?>

    <?php

    include('Components/RequiredComponents/footer.inc.php');

    include 'Components/RequiredComponents/bootstrapJS.inc.php';

    ?>