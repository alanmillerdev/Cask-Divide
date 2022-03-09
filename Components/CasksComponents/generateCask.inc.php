<?php

function generateCask($caskID, $caskName, $caskAvailable, $CaskImageLocation)
{
    return <<<HTML
    <div class="col-md-4 p-0">
        <div class="card bg-dark border-light text-white text-center">
            <div class="card-body">
                <a href="#"><img class="card-img-top" src="images/cask1.png" alt="Scotch Whiskey Cask Image"></a>
                <h3 href='#'>$caskName</h3> <!--Cask ID will go here eventually-->
                <strong>$caskAvailable</strong>% Available
            </div>
        </div>
    </div>
HTML;
}

?>