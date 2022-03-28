<?php
if(!defined('SecurityCheck')) {
  exit(header("Location: ../../../index.php"));
}
?>
<section>
  <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        
        <?php

        include('carouselCaskBuilder.inc.php');

        ?>

      </div>
    </div>
  </div>
</section>