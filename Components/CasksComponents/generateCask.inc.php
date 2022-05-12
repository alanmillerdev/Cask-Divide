<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../index.php"));
    }

function generateCask($caskID, $CaskName, $caskAvailable, $CaskImage)
{
    return <<<HTML
  <div class="col-md-4 p-0">
        <div class="card border-light text-white text-center">
            <div class="card-body">
                <a href='product.php?sku="$caskID"'><img class="card-img-top" src="data:image/jpeg;base64,$CaskImage" alt="Scotch Whiskey Cask Image"></a>
                <a class="h3" href='product.php?sku="$caskID"'>$CaskName</a><br>
                <strong>$caskAvailable</strong>% Available
            </div>
        </div>
    </div>
HTML;
}
