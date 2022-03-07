<?php

$PageTitle = "Home";
include 'Components/RequiredComponents/header.inc.php';
include 'Components/RequiredComponents/bootstrapCSS.inc.php';

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/c983ed605c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>Scotch Whiskey Casks</title>
</head>

<div class="content">

    <!--NAVBAR INCLUDE-->
    <?php
    $page='home';
    include('./includes/navbar_login.php');
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

    include('./includes/footer.php');

    ?>


<?php

include 'Components/RequiredComponents/bootstrapJS.inc.php';

?>