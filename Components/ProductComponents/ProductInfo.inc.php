<?php

$caskID = $_GET['sku'];
$userID = $_SESSION['UserID'];

require 'Database/dbConnect.inc.php';

$dbConnection = Connect();

$sql = "SELECT CaskID, CaskName, CaskDescription, WholeCaskPrice, PercentageAvailable, CaskImage FROM cask WHERE CaskID = $caskID";
$query = mysqli_query($dbConnection, $sql);
while($row = mysqli_fetch_array($query)) {
    $CaskName = $row['CaskName'];
    $CaskDescription = $row['CaskDescription'];
    $PercentageAvailable = $row['PercentageAvailable'];
    $CaskImage = $row['CaskImage'];
    $CaskPrice = $row['WholeCaskPrice'];

}


?>

<section class="py-5">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2"><?php echo $CaskName ?></h1>
                    <p class="lead fw-normal text-white-50 mb-4"><?php echo $CaskDescription ?></p>
                    
                    <form method="POST" >
                        <div class="form-group">
                        <label for="formControlRange" class="text-white">How much do you want to Invest?</label>
                        <input type="range" min="1" max="<?php echo $PercentageAvailable ?>" value="<?php echo $PercentageAvailable ?>"  class="form-control-range" id="formControlRange"  style="
                        border-radius: 100px;" name="percentage">
                        </div>

                        <h1 class="display-6 fw-bolder text-white mb-4"><span class="text-white" id="rangevalue"><?php echo $PercentageAvailable ?></span>% of the Cask: £<?php echo $CaskPrice ?></h1>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" <?php echo "href='checkout.php?sku=$caskID&percentage=$PercentageAvailable&uid=$userID'"?>  type="submit" >Purchase <i class="fas fa-shopping-bag"></i></a>
                    </form>   
                    <script>
                        var slider = document.getElementById("formControlRange");
                        var output = document.getElementById("rangevalue");
                        output.innerHTML = slider.value; // Display the default slider value

                        // Update the current slider value (each time you drag the slider handle)
                        slider.oninput = function() {
                        output.innerHTML = this.value;
                        }
                    </script>
                    <div id="output"></div>
                    <a class="btn btn-outline-light btn-lg px-4" href="#">Learn about the Casks <i class="fas fa-arrow-alt-circle-down"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="data:image/jpeg;base64, <?php echo $CaskImage ?>" alt="Scotch Whiskey Cask Image"></div>
        </div>
    </div>
</section>