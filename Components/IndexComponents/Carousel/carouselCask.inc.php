<?php
if(!defined('SecurityCheck')) {
  exit(header("Location: ../../../index.php"));
}

function generateCask($caskName, $caskDescription, $caskImage, $class)
{
  return <<<HTML
  <div class="$class">
    <img class="d-block m-auto w-50" src="data:image/jpeg;base64,$caskImage" alt="Carousel Item">
    <div class="carousel-caption d-none d-md-block">
        <h5>$caskName</h5>
        <p>$caskDescription</p>
    </div>
  </div>
HTML;
}
