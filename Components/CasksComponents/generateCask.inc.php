<?php

function generateCask($caskID, $caskName, $caskAvailable, $CaskImage)
{
    return <<<HTML
  <div class="col-md-4 p-0">
        <div class="card bg-dark border-light text-white text-center">
            <div class="card-body">
                <a href="#"><img class="card-img-top" src="data:image/jpeg;base64,$CaskImage" alt="Scotch Whiskey Cask Image"></a>
                <h3 href='#'>$caskName</h3> <!--Cask ID will go here eventually-->
                <strong>$caskAvailable</strong>% Available
            </div>
        </div>
    </div>
HTML;
}
