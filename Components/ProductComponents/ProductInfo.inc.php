<?php

$caskID = $_GET['sku'];
$userID = $_SESSION['UserID'];

require 'Database/dbConnect.inc.php';

$dbConnection = Connect();

$sql = "SELECT CaskID, CaskName, CaskDescription, WholeCaskPrice, PercentageAvailable, CaskImage FROM cask WHERE CaskID = $caskID";
$query = mysqli_query($dbConnection, $sql);
while ($row = mysqli_fetch_array($query)) {
    $CaskID = $row['CaskID'];
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

                    <form method="POST" action="Components/CheckoutComponents/checkoutStart.inc.php">
                        <div class="form-group">
                            <label for="formControlRange" class="text-white">How much do you want to Invest?</label>
                            <input type="range" min="1" max="<?php echo $PercentageAvailable ?>" value="<?php echo $PercentageAvailable ?>" name="percentage" onInput="$('#rangevalue').html($(this).val())" class="form-control-range" id="formControlRange" style="
                        border-radius: 100px;">
                        </div>
                        <input type="hidden" name="CaskID" value="<?php echo $CaskID  ?>">
                        <input type="hidden" name="UserID" value="<?php echo $userID ?>">
                        <h1 class="display-6 fw-bolder text-white mb-4"><span class="text-white" name="percentage" id="rangevalue"><?php echo $PercentageAvailable ?></span>% of the Cask: £<span id="price" ><?php echo $CaskPrice ?></span></h1>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            
                            <button class="btn btn-primary btn-lg px-4 purchase-button" type="submit">Purchase <i class="fas fa-shopping-bag"></i></button>
                    </form>

                    <a class="btn btn-outline-light btn-lg px-4" href="#">Learn about the Casks <i class="fas fa-arrow-alt-circle-down"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="data:image/jpeg;base64, <?php echo $CaskImage ?>" alt="Scotch Whiskey Cask Image"></div>
    </div>
    </div>
</section>


<script>
var slider = document.getElementById("formControlRange");
var output = document.getElementById("rangevalue");

var percent = document.getElementById('rangevalue').innerText;
var price = document.getElementById('price').innerText;
var priceOutput = document.getElementById('price');

var total = parseInt(price  *  output.innerText / 100);
output.innerHTML = slider.value;
priceOutput.innerHTML = total;

slider.oninput = function() {
  output.innerHTML = this.value;
  total = parseInt(price  *  output.innerText / 100);
  priceOutput.innerHTML = total;
}
</script>