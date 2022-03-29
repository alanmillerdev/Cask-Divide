<?php
if (!defined('SecurityCheck')) {
  exit(header("Location: ../../index.php"));
};

include 'Database/dbConnect.inc.php';
$dbConnection = Connect();

$caskID = $_GET['sku'];
$userID = $_SESSION['UserID'];
$percentage = $_GET['percentage'];

$result = $dbConnection->query("SELECT CaskID, CaskName, WholeCaskPrice FROM Cask WHERE CaskID = $caskID");
$row = mysqli_fetch_array($result);

$caskName = $row[1];

$caskPrice = $row[2];

$cost = round(($caskPrice / 100 * $percentage), 2);

$total = round(($cost * 1.2),2);

//Stripe
require_once "vendor/autoload.php";
 
    $amount = $total;
 
    $stripe = new \Stripe\StripeClient("sk_test_51KiJStCiLMNwkdjmlxRvmpexo2tsqrExebyJfWBgxRp6UhZaN0M76FoVH45xE98v7gdaO16DzooG5hk2G2TH4P7900I8n6AE13");
 
    // creating setup intent
    $payment_intent = $stripe->paymentIntents->create([
        'payment_method_types' => ['card'],
 
        // convert double to integer for stripe payment intent, multiply by 100 is required for stripe
        'amount' => round($total) * 100,
        'currency' => 'gbp',
    ]);
?>

<script src="https://js.stripe.com/v3/"></script>

<div class="container">
  <div class="py-5 text-center">

    <h2 id="main-title">Checkout</h2>
  </div>

  <div class="row">
    <div class="col-md-6 order-md-1 mb-6">
      <div class="shoppingbag">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span id="decor-title">Your Order</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0"><?php echo $caskName ?></h6>
              <small class="text-muted"><?php echo $percentage ?>%</small>
            </div>
            <span class="text-muted">£<?php echo $cost ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (20% VAT Included)</span>
            <strong>£<?php echo $total ?></strong>
          </li>
        </ul>
      </div>
      <div class="shoppingdetails">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span id="decor-title">Payment Details</span>
        </h4>

      <div class="mb-3">
            <label for="cardnumber">Card Number</label>
            <input type="cardnumber" class="form-control" id="cardnumber" placeholder="0123 4567 8910 1112">
            <div class="invalid-feedback">
              Please enter a valid credit card number for payment.
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="expiration">Expiry date (mm/yy)</label>
              <input type="text" class="form-control" id="expiration" placeholder="" value="" pattern="[0-9]*" inputmode="numeric" required>
              <div class="invalid-feedback">
                Valid expiry is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="Security Code">Security Code</label>
              <input type="text" class="form-control" id="Security Code" placeholder="" value="" pattern="[0-9]*" inputmode="numeric" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <input type="hidden" id="stripe-public-key" value="pk_test_51KiJStCiLMNwkdjmBxIiihgEfRd96advJeaSzIxPpImkVdFrvR8WfQfUA3eg6R8Ho0FLv6jVw1Rg0mZ66zpEebRa00cgcZUKzI" />
          <input type="hidden" id="stripe-payment-intent" value="<?php echo $payment_intent->client_secret; ?>" />
          
          <!-- credit card UI will be rendered here -->
          <div id="stripe-card-element" style="margin-top: 20px; margin-bottom: 20px;"></div>

</div>

    </div>

    <div class="col-md-6 order-md-2">
       <div class="shoppingdetails">
        <span id="decor-title">Your Details</span>
        <form method="dialog" class="needs-validation" novalidate>
          <div class="row">
            <div class="mb-3">
              <label for="firstName">Full Name</label>
              <input type="text" class="form-control" id="user-name" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="user-email" placeholder="you@example.com" required>
            <div class="invalid-feedback">
              Please enter a valid email address to allows us to contact you.
            </div>
          </div>

          <div class="mb-3">
            <label for="phone">Phone Number</label>
            <input type="phone" class="form-control" id="user-mobile-number" placeholder="07987474200" required>
            <div class="invalid-feedback">
              Please enter a valid phone number to allow us to contact you.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="mb-3">
            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="country">Country</label>
              <select class="custom-select d-block w-100" id="country" required>
                <option value="">Choose...</option>
                <option>United Kingdom</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="zip">Postcode</label>
              <input type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Postcode required.
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" onclick="payViaStripe()">Pay £<?php echo $total ?> to Cask Divide</button>
        </form>
        <hr class="mb-4">
        <div class="text-muted">*We will be in touch with details of your investment periodically*</div>
      </div>
    </div>

  
    </div>
  </div>

  <script>
    // global variables
    var stripe = null;
    var cardElement = null;
 
    const stripePublicKey = document.getElementById("stripe-public-key").value;
 
    // initialize stripe when page loads
    window.addEventListener("load", function () {
        stripe = Stripe(stripePublicKey);
        var elements = stripe.elements();
        cardElement = elements.create('card');
        cardElement.mount('#stripe-card-element');
    });

    function payViaStripe() {
    // get stripe payment intent
    const stripePaymentIntent = document.getElementById("stripe-payment-intent").value;
 
    // execute the payment
    stripe
        .confirmCardPayment(stripePaymentIntent, {
            payment_method: {
                    card: cardElement,
                    billing_details: {
                        "email": document.getElementById("user-email").value,
                        "name": document.getElementById("user-name").value,
                        "phone": document.getElementById("user-mobile-number").value
                    },
                },
            })
            .then(function(result) {

                // Handle result.error or result.paymentIntent
                if (result.error) {
                    console.log(result.error);
                    window.location.replace('paymentError.php');
                } else {
                    console.log("The card has been verified successfully...", result.paymentIntent.id);
                    window.location.replace('paymentSuccess.php');
                }
            });
}

</script>