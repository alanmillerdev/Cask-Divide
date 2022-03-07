<?php

$PageTitle = "Contact";
include 'Components/RequiredComponents/header.inc.php';
include 'Components/RequiredComponents/styles.inc.php';

?>

<body data-spy="scroll" data-target="#main-nav" id="home" class="bg-dark">

  <?php include 'Components/RequiredComponents/navbar.inc.php'; ?>

  <!-- CONTACT SECTION -->
  <section id="form-styling">
    <div class="container">
      <div class="d-flex justify-content-center">
        <div class="rounded-3 text-light bg-dark p-5">
          <div class="text-center">
            <h3 class="mt-1 mb-5">Contact</h3>
          </div>

          <form class="d-flex flex-column">
            <div class="form-outline mb-4">
              <input type="email" id="" class="input-style" placeholder="Name" />
            </div>

            <div class="form-outline mb-4">
              <input type="" id="" class="input-style" placeholder="Email" />
            </div>

            <div class="form-outline mb-4">
              <input type="" id="" class="input-style" placeholder="Phone Number" />
            </div>

            <div class="form-outline mb-4">
              <textarea name="" id="" class="input-style" cols="25" rows="2" placeholder="Message"></textarea>
            </div>

            <div class="text-center pt-1 mb-5 pb-1">
              <button class="form-styling-button" type="button"><span>Send</span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php include 'Components/RequiredComponents/footer.inc.php'; ?>