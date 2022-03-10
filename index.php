<?php

$PageTitle = "Home";
include 'Components/RequiredComponents/header.inc.php';
include 'Components/RequiredComponents/styles.inc.php';

?>

<div class="content">

    <?php

    include('Components/RequiredComponents/navbar.inc.php');

    include('Components/IndexComponents/IndexBanner.inc.php');

    include('Components/IndexComponents/IndexAboutUs.inc.php');

    include('Components/IndexComponents/Carousel/carouselContainer.inc.php');

    include('Components/RequiredComponents/footer.inc.php');

    include 'Components/RequiredComponents/bootstrapJS.inc.php';

    ?>