<?php
if(!defined('SecurityCheck')) {
  exit(header("Location: ../../../index.php"));
}

function generateCask($CaskName, $CaskImage, $class)
{
  return <<<HTML
  <div class="$class">
  <img class="d-block m-auto carousel-images" src="data:image/jpeg;base64,$CaskImage" alt="Carousel Item">
    <div class="carousel-caption">
        <h5>$CaskName</h5>
    <div class="col-sm-4">
      <img class="d-block m-auto homecask-images" src="data:image/jpeg;base64,$CaskImage">
    </div>
    
  </div>

HTML;
}

