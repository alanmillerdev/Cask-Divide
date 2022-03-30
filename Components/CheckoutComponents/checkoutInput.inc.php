<?php
if (!defined('SecurityCheck')) {
  exit(header("Location: ../../index.php"));
};

include 'Database/dbConnect.inc.php';
$dbConnection = Connect();

$caskID = $_GET['sku'];
$userID = $_SESSION['UserID'];
$percentage = $_GET['percentage'];
$finalPercentage = $_GET['finalPercentage'];

$result = $dbConnection->query("SELECT CaskID, CaskName, WholeCaskPrice FROM Cask WHERE CaskID = $caskID");
$row = mysqli_fetch_array($result);

$caskName = $row[1];

$caskPrice = $row[2];

$cost = round(($caskPrice / 100 * $percentage), 2);

$total = round(($cost * 1.2), 2);

//Stripe
require_once "vendor/autoload.php";

$amount = $total;

$stripe = new \Stripe\StripeClient("sk_test_51KiHJEEIsZ5yvNB5WoMfOjI15pYld5EF3uDYbD2XOFLUbNtvkcTku3VIYpf908EPcb1op4Nk0kJaDcOpqkV2FdSa00LV1zLrVL");

// creating setup intent
$payment_intent = $stripe->paymentIntents->create([
  'payment_method_types' => ['card'],

  // convert double to integer for stripe payment intent, multiply by 100 is required for stripe
  'amount' => round($total) * 100,
  'currency' => 'gbp',
  'statement_descriptor' => 'Cask Divide Investment',
]);
?>

<script src="https://js.stripe.com/v3/"></script>

<div class="container">
  <div class="py-5 text-center">

    <h2 id="main-title">Checkout</h2>
  </div>

  <div class="row">
    <div class="col-md-6 order-md-1 mb-6">
      <div class="shoppingbag" id="listGroup">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span id="decor-title">Your Order</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0" id="caskName"><?php echo $caskName ?></h6>
              <small class="text-muted" id="percentageCheck"><?php echo $percentage ?>%</small>
            </div>
            <span class="text-muted" id="cost">£<?php echo $cost ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span id = "totalTitle">Total (20% VAT Included)</span>
            <strong id="total">£<?php echo $total ?></strong>
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

        <input type="hidden" id="final-percentage" value="<?php echo $finalPercentage;?>" />
        <input type="hidden" id="stripe-public-key" value="pk_test_51KiHJEEIsZ5yvNB5fxjtAXezi1bmu7hTSoPW1o4oZ4nihYpqNqXFdi2B6yh3acDGS7P59lNQRQOUFQ2Xxb9uGPoE00VG1Bkcg9" />
        <input type="hidden" id="stripe-payment-intent" value="<?php echo $payment_intent->client_secret; ?>" />

        <!-- credit card UI will be rendered here -->
        <div id="stripe-card-element" style="margin-top: 20px; margin-bottom: 20px; padding: 20px color:white; "></div>

      </div>

    </div>

    <div class="col-md-6 order-md-2">
      <div class="shoppingdetails">
        <span id="decor-title">Your Details</span>
        <form method="dialog" class="needs-validation" novalidate id="paymentForm">
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
            <button class="btn btn-primary btn-lg btn-block" id="sendPayment" onclick="payViaStripe()">Pay £<?php echo $total ?> to Cask Divide</button>
        </form>
        <hr class="mb-4">
        <div class="text-muted">*We will be in touch with details of your investment periodically*</div>
        <div id="success"></div>
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
  window.addEventListener("load", function() {
    stripe = Stripe(stripePublicKey);
    var elements = stripe.elements();
    cardElement = elements.create('card');
    cardElement.mount('#stripe-card-element');
  });

  function payViaStripe() {

    // get stripe payment intent
    const stripePaymentIntent = document.getElementById("stripe-payment-intent").value;

    // execute the payment
    if(percentageCheck()) {
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
              if(percentageCheck() == true) {
                console.log("The card has been verified successfully...", result.paymentIntent.id);
                  // Success message
                  $('#success').html("<div class='alert alert-success'>");
                  $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                    .append("</button>");
                  $('#success > .alert-success')
                    .append("<strong>Thank you.\nYour payment has been processed. </strong>");
                  $('#success > .alert-success')
                    .append('</div>');
                  $('#paymentForm').trigger("reset");
                  cardElement.clear();
                  document.getElementById("caskName").innerHTML = " ";
                  document.getElementById("cost").innerHTML = " ";
                  document.getElementById("totalTitle").innerHTML = " ";
                  document.getElementById("total").innerHTML = " ";
                  document.getElementById("percentageCheck").innerHTML = " ";
                  document.getElementById("listGroup").remove();
              }
              else {
                console.log(result.error);
                window.location.replace('paymentError.php');
              }
          }
      })
    }
    else{
        // Fail message
        $('#success').html("<div class='alert alert-danger'>");
        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
          .append("</button>");
        $('#success > .alert-danger').append($("<strong>").text("Sorry, it seems that the percentage you requested is not available."));
        $('#success > .alert-danger').append($("<br><strong>").text("Please go back and try another amount."));
        $('#success > .alert-danger').append('</div>');
    }
  }

  function percentageCheck() {
    var percentageCheck = $("#percentageCheck").val();
    var finalPercentage = $("#final-percentage").val();


    var totalAvailable = percentageCheck + finalPercentage;
    if(!parseInt(percentageCheck)) {
              // Fail message
        $('#success').html("<div class='alert alert-danger'>");
        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
          .append("</button>");
        $('#success > .alert-danger').append($("<strong>").text("Sorry, something has gone wrong on our end. Your payment has not been processed."));
        $('#success > .alert-danger').append($("<br><strong>").text("Please try again."));
        $('#success > .alert-danger').append('</div>');
  
    }
    else {
      $this = $("#sendPayment");
      $this.prop("disabled", true); // Disable submit button until AJAX call is finished, this is to prevent multiple payment attempts in the same window
      $.ajax({
        url: 'Components/CheckoutComponents/checkoutCheck.inc.php',
        type: 'GET',
        data: {
          percentageCheck: percentageCheck,
          finalPercentage: finalPercentage,
          totalAvailable: totalAvailable
        },

        cache: false,

        success: function() {
            // Success message
            $('#success').html("<div class='alert alert-success'>");
            $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
              .append("</button>");
            $('#success > .alert-success')
              .append("<strong>Thank you.\nYour payment has been processed. </strong>");
            $('#success > .alert-success')
              .append('</div>');
              $('#paymentForm').trigger("reset");
              cardElement.clear();
              document.getElementById("caskName").innerHTML = " ";
                  document.getElementById("cost").innerHTML = " ";
                  document.getElementById("totalTitle").innerHTML = " ";
                  document.getElementById("total").innerHTML = " ";
                  document.getElementById("percentageCheck").innerHTML = " ";
                  document.getElementById("listGroup").remove();
              
              
              
        },
        error: function() {
            // Fail message
            $('#success').html("<div class='alert alert-danger'>");
            $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
              .append("</button>");
            $('#success > .alert-danger').append($("<strong>").text("Sorry. Please try again later."));
            $('#success > .alert-danger').append('</div>');
        },
        complete: function () {
            setTimeout(function () {
              //$this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
            }, 1000);
          }
      });
      return true;
    }
    
  }
</script>

<?php


?>