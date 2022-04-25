<?php
include 'Database/dbConnect.inc.php';
$name = $_SESSION['FullName'];
$userID = $_SESSION['UserID'];
$caskID = $_GET['caskID'];
$transactionID = $_GET['transactionID'];
$chargeID = $_GET['stripeID'];


$dbConnection = Connect();

// get cask name and description
$query = "SELECT CaskDescription, CaskName, CaskImage FROM cask where CaskID = '$caskID'";
$result = mysqli_query($dbConnection, $query);
$row = mysqli_fetch_array($result);
$caskDescription = $row[0];
$caskName = $row[1];
$caskImage = $row[2];

//get purchase amount, date, transaction ID, charge ID for stripe and percentage
$query = "SELECT TransactionID, PurchaseAmount, PercentPurchased, PurchaseDate FROM investment where TransactionID = '$transactionID'";
$result = mysqli_query($dbConnection, $query);
$row = mysqli_fetch_array($result);
$purchaseAmount = $row[1];
$percent = $row[2];
$purchaseDate = $row[3];


?>

<div id="account-content">
<div class="container rounded mt-5 mb-0">
    <div class="row">
        <div class="col-md-4 border">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <span class="font-weight-bold text-white"><?php echo $caskName; ?></span>
                <span class="font-weight-bold text-white-50 mt-2"><?php echo $caskDescription; ?></span>
                <span></span>
                <img class="mt-5" width="250px" src="data:image/jpeg;base64,<?php echo $caskImage ?>" alt="Scotch Whiskey Cask Image">>
            </div>
        </div>
        <div class="col-md-8 border">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-right">Thank you for purchasing with us <?php echo $name; ?></h4>
                </div>
            <form action="#" method="post">
                <div class="row mt-3">
                    <div class="col-md-12"><label class=" checkout-header">Amount Purchased</label><p class="h4 text-white" value="<?php echo $purchaseAmount; ?>"><?php echo "£".$purchaseAmount;?></p></div>
                    <div class="col-md-6 pt-4"><label class=" checkout-header">Percentage Purchased</label><p class="h4 text-white" value="<?php echo $percent; ?>"><?php echo $percent."%"; ?></p></div>
                    <div class="col-md-6 pt-4"><label class=" checkout-header">Purchase Date</label><p class="h4 text-white" value="<?php echo $purchaseDate; ?>"><?php echo $purchaseDate; ?></p></div>
                    <div class="col-md-6 pt-4"><label class="checkout-header">Transaction ID</label><p class="h4 text-white" value="<?php echo $transactionID; ?>"><?php echo $transactionID; ?></p></div>
                    <div class="col-md-6 pt-4"><label class=" checkout-header">Stripe Transaction ID</label><p class="h4 text-white" value="<?php echo $chargeID; ?>"><?php echo $chargeID; ?></p></div>
                </div>
                <div class="mt-5 text-center">
                    <a href="index.php">
                    <input type="button" name="submit" class="btn btn-primary profile-button mt-5" value="Return to Home">
                    </a>
                </div>
            </form>
            </div>
        </div>
        
    </div>
</div>
</div>
</div> 
</div>