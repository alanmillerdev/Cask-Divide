<?php

$PageTitle = "Home";
include 'Components/RequiredComponents/header.inc.php';
include 'Components/RequiredComponents/styles.inc.php';

?>

<div class="content">

  <!--NAVBAR INCLUDE-->
  <?php
  $page = 'home';
  include('Components/RequiredComponents/navbar.inc.php');
  ?>

  <!--HERO-->
  <div class="hero">
    <img class="img-fluid" src="./images/glencoe.png" alt="main page background image">
    <div class="herotext">
      <h1>Invest in Scotch Whisky</h1>
      <button class="button hvr-hollow" onclick="window.location.href='casks.php'">Browse our Casks</button>
    </div>
    <div class="caskimg">
      <img src="./images/cask1.png" alt="cask">
    </div>
  </div>
  <!--MOBILE HERO-->
  <div class="mobile-hero">
    <div class="px-4 py-5 my-5 text-center">
      <h2 class="display-5 fw-bold">Browse</h2>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Best Pet Supplies in Edinburgh</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3" onclick="window.location.href='food_shop.php'">Products</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4 text-dark" onclick="window.location.href='grooming.php'">Grooming</button>
        </div>
      </div>
    </div>
  </div>
</div>


<!--footer-->
<?php

include('Components/RequiredComponents/footer.inc.php');

?>


<?php

include 'Components/RequiredComponents/bootstrapJS.inc.php';

?>