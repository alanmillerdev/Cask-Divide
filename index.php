<?php

$PageTitle = "Home";
include 'Components/RequiredComponents/header.inc.php';
include 'Components/RequiredComponents/styles.inc.php';

?>

<div class="content">


    <?php

    $page = 'home';
    include('Components/RequiredComponents/navbar.inc.php');

    ?>

    <?php

    include('Components/IndexComponents/IndexBanner.inc.php');

    ?>

    <?php

    include('Components/IndexComponents/IndexAboutUs.inc.php');

    ?>
    <?php

    include('Components/IndexComponents/Carousel/carouselContainer.inc.php');

    ?>


    <?php

    include('Components/RequiredComponents/footer.inc.php');

    ?>


    <?php

    include 'Components/RequiredComponents/bootstrapJS.inc.php';

    ?>