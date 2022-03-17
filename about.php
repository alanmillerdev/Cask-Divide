<?php
define('SecurityCheck', TRUE);
$PageTitle = "About";


include 'Components/RequiredComponents/header.inc.php';

include 'Components/RequiredComponents/styles.inc.php';

include 'Components/ContactComponents/contactContentDiv.inc.php';

include 'Components/RequiredComponents/navbar.inc.php';

?>


<!--MAIN PAGE HEADING-->
    <div class="title-header">
        <h1>About Us</h1>
    </div>

<!--ABOUT HERO 1-->
<div class="about-hero">
    <div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="images/shopfront.jpg" class="d-block mx-lg-auto img-fluid"  width="700" height="500" loading="lazy" alt="Shop front image">
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold lh-1 mb-3">Our Shop</h1>
      <p class="lead">We currently have one store situated on Leith walk in Edinburgh. It has been in the same location since 1920 and we've built up a loyal, local following.</p>
    </div>
  </div>
</div>
</div>


<!--ABOUT HERO 2-->
<div class="about-hero">
    <div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold lh-1 mb-3">Dog Grooming</h1>
      <p class="lead">Our salon has a one dog at a time policy ensuring a stress free experience for your dog we only use the best natural products and sensitive shampoos that are PH balanced for your dogs skin.</p>
    </div>
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="images/glencoe.png" class="d-block mx-lg-auto img-fluid"  width="700" height="500" loading="lazy" alt="Dog in bath">
    </div>
  </div>
</div>
</div>

<!--ABOUT HERO 3-->
<div class="about-hero">
    <div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
    <!--GOOGLE MAPS API-->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1269.6249151966388!2d-3.174126126482327!3d55.9666389210184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887b80bda8254ad%3A0xfa5345bcc7fbc661!2s213%20Leith%20Walk%2C%20Edinburgh%20EH7%205HN!5e0!3m2!1sen!2suk!4v1621550009500!5m2!1sen!2suk" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold lh-1 mb-3">Come and Visit</h1>
      <p class="lead">Situated on Leith walk, we are but a stones throw away from the center of the capital as well as many great places to walk your dog.</p>
    </div>
  </div>
</div>
</div>

    <!--footer-->
  <?php

    include 'Components/RequiredComponents/footer.inc.php';

  ?>

</div>