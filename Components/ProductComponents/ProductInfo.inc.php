<?php

$caskID = $_GET['sku'];
$userID = $_SESSION['UserID'];

require 'Database/dbConnect.inc.php';

$dbConnection = Connect();

$sql = "SELECT * FROM cask WHERE CaskID = $caskID";
$query = mysqli_query($dbConnection, $sql);
while ($row = mysqli_fetch_array($query)) {
    $CaskID = $row['CaskID'];
    $CaskName = $row['CaskName'];
    $CaskDescription = $row['CaskDescription'];
    $PercentageAvailable = $row['PercentageAvailable'];
    $DistilleryName = $row['DistilleryName'];
    $CaskImage = $row['CaskImage'];
    $CaskPrice = $row['WholeCaskPrice'];
    $RLA = $row['RLA'];
    $OLA = $row['OLA'];
    $PercentageAlcohol = $row['PercentageAlcohol'];
    $CaskType = $row['CaskType'];
    $WoodType = $row['WoodType'];
}

$sql = "SELECT * FROM distillery WHERE DistilleryName = '$DistilleryName'";
$query = mysqli_query($dbConnection, $sql);
while ($row = mysqli_fetch_array($query)) {
    $DistilleryName = $row['DistilleryName'];
    $DistilleryDescription = $row['Description'];
}

?>

<section class="py-5">
    <div class="container py-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2"><?php echo $CaskName ?></h1>
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

                    <a class="btn btn-outline-light btn-lg px-4" href="#top-home">Learn about the Casks <i class="fas fa-arrow-alt-circle-down"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="data:image/jpeg;base64, <?php echo $CaskImage ?>" alt="Scotch Whiskey Cask Image"></div>
    </div>
    </div>
</section>

<section class="tab-product m-0" id="product-details">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab"
                                href="#top-home" role="tab" aria-selected="true">Description</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-toggle="tab"
                                href="#top-profile" role="tab" aria-selected="false">Cask Details</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab"
                                href="#top-contact" role="tab" aria-selected="false">Distillery Info</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                            aria-labelledby="top-home-tab">
                            <p><?php echo $CaskDescription ?></p>
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            <div class="single-product-tables">
                                        <div class="table-responsive">
            <table class="table table-hover table-nowrap">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">OLA</th>
                        <th scope="col">RLA</th>
                        <th scope="col">Percentage Alcohol</th>
                        <th scope="col">Cask Type</th>
                        <th scope="col">Wood Type</th>

                    </tr>
                </thead>
                <tbody>
                                <tr>
                                    <td>
                                        <?php echo $OLA ?>
                                    </td>
                                    <td>
                                        <?php echo $RLA ?>
                                    </td>
                                    <td>
                                        <?php echo $PercentageAlcohol ?>
                                    </td>
                                    <td>
                                        <?php echo $CaskType ?>                          
                                    </td>
                                    <td>
                                        <?php echo $WoodType ?>
                                    </td>
                                </tr>
                </tbody>

            </table>
        </div>
    </div>
    </div>
                        <div class="tab-distillery fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                            <div class="mt-4 text-center">
                                <h5>Distillery Name</h5>
                                <div id="decor-title"><?php echo $DistilleryName; ?></div>
                            </div>
                            <div class="mt-4 text-center">
                                <h5>Description</h5>
                                <p><?php echo $DistilleryDescription; ?></p>
                            </div>

                        </div>
                    </div>
                </div>
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