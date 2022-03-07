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

<!--NAVBAR INCLUDE-->
    <?php
    $page='home';
    include('./includes/navbar_login.php');
    ?>

  <!-- HOME SECTION -->
  <section id="home-section">
    <div class="home-inner container">
      <div class="row">
        <div class="col-lg-8 d-none d-lg-block">
          <h1 class="display-4">INVEST IN SCOTCH WHISKEY</h1>
          <div class="d-flex">
            <div class="py-4 align-self-end">
              Whisky casks are growing as a investment oppertunity for the general public and consumers. With casks ranging from several hundreds to tens of thousands of pounds, 
              this significantly reduces the possibility of the general public having the ability to risk significant savings or simply afford to invest within scotch whisky at all.
            </div>
          </div>
          <a class="browse_button px-5 py-2 border rounded" href="#" role="button">Link</a>
        </div>
        
        <div class="col-lg-4">
          <img class="rounded img-fluid d-none d-lg-block" src="images/cask1.png" alt="Image of a Scotch Whiskey Cask">
        </div>
      </div>
    </div>
  </section>

  <!-- CAROUSEL SECTION -->

      <!--footer-->
    <?php

    include('./includes/footer.php');

    ?>

<?php

include 'Components/RequiredComponents/bootstrapJS.inc.php';

?>