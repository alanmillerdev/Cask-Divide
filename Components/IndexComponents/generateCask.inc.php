<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../index.php"));
    }
    
  
function generateCask($caskID, $CaskName, $caskAvailable, $CaskImage)
{
    

   echo "
  <div class='col-md-4'>
        <div class='card text-white text-center'>
            <div class='bgimage$caskID'>
                <a href='product.php?sku=`$caskID`'><img class='card-img-top' src='data:image/jpeg;base64,$CaskImage' alt='Scotch Whiskey Cask Image'></a>
                </div>
            <div class='card-body'>
                <a class='h3' href='product.php?sku=`$caskID`'>$CaskName</a><br>
                <strong>$caskAvailable</strong>% Available
                <strong>$caskID</strong> CASK ID
            </div>
            
        </div>
    </div> 
";

}

