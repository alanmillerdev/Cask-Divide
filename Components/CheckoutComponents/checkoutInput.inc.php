<?php
if (!defined('SecurityCheck')) {
  exit(header("Location: ../../index.php"));
};

if(!isset($_GET['sku'])){
  header("../../index.php");
}

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

if(isset($_SESSION['customerID'])){

  $customerID = $_SESSION['customerID'];
  } else {
    $customer = $stripe->customers->create([
      'name' => $_SESSION['FullName'] ,
    ]);
  
    $customerID = $customer->id;
    $_SESSION['customerID'] = $customerID;
  }

$sql = $dbConnection->query("SELECT UserID, Email, PhoneNumber FROM User WHERE UserID = $userID");
$row = mysqli_fetch_array($sql);
$email = $row[1];
$phone = $row[2];
// creating setup intent
$payment_intent = $stripe->paymentIntents->create([
  'payment_method_types' => ['card'],

  // convert double to integer for stripe payment intent, multiply by 100 is required for stripe
  'amount' => round($total) * 100,
  'currency' => 'gbp',
  'statement_descriptor' => 'Cask Divide Investment',
  'customer' => $customerID,
]);




$sql = $dbConnection->query("SELECT PercentageAvailable from Cask WHERE CaskID = $caskID");
$row = mysqli_fetch_array($sql);
$currentPercentageAvailable = $row[0];
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
            <span class="text-muted">£<?php echo $cost ?></span>
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
        <div id="stripe-card-element" name="card" style="margin-top: 20px; margin-bottom: 20px; padding: 20px color:white; "></div>

      </div>

    </div>

    <div class="col-md-6 order-md-2">
      <div class="shoppingdetails">
        <span id="decor-title">Your Details</span>
        <form method="dialog" class="needs-validation" id="paymentForm">
          <div class="row">
            <div class="mb-3">
              <label for="firstName">Full Name</label>
              <input type="text" class="form-control" id="user-name" placeholder="" value="<?php echo $_SESSION['FullName'] ?>" required>
              <div class="invalid-feedback" id="feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="user-email" placeholder="you@example.com" value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; } else { echo $email; } ?>" required>
              <div class="invalid-feedback" id="feedback">
                Please enter a valid email address to allows us to contact you.
              </div>
            </div>

            <div class="mb-3">
              <label for="phone">Phone Number</label>
              <input type="phone" class="form-control" id="user-mobile-number" placeholder="07987474200" value="<?php if(isset($_SESSION['phone'])) { echo $_SESSION['phone']; } else { echo $phone; } ?>" required>
              <div class="invalid-feedback" id="feedback">
                Please enter a valid phone number to allow us to contact you.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback" id="feedback">
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
            <button class="btn btn-primary btn-lg btn-block" id="sendPayment" type="submit" onclick="percentageCheck()">Pay £<span id="cost"><?php echo $total ?></span> to Cask Divide</button>
            <input type="hidden" id="caskID" value="<?php echo $caskID?>"/>
            <input type="hidden" id="userID" value="<?php echo $userID?>"/>
            <input type="hidden" id="percent" name="percent" value="<?php echo $percentage?>" />
            <input type="hidden" id="finalPercent" name="finalPercentage" value="<?php echo $finalPercentage?>" />
            <input type="hidden" id="custID" name="custID" value="<?php echo $customerID?>" />

            <?php 

              $sql = $dbConnection->query("SELECT PercentageAvailable from Cask WHERE CaskID = $caskID");
              $row = mysqli_fetch_array($sql);

              $currentPercentageAvailable = $row[0];
            ?>
              <input type="" id="cPercentage" readonly name="cPercentage" value="<?php echo $currentPercentageAvailable?>" style="max-width: 0px; max-height: 0px; background-color: #272727; color:#272727; border: none; min-height: 0px; min-width: 0px;" />
        <script>

            var cPercent = document.getElementById("cPercentage").value;
            var caskID = document.getElementById("caskID").value;
              var auto_refresh = setInterval(
              function (data)
              {
                var xhttp;
                xhttp = new XMLHttpRequest();
                document.getElementById("cPercentage").style.display = 'none';
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cPercentage").value = this.responseText;
                    document.getElementById("cPercentage").style.display = 'none';
                    
                  }
                };
                xhttp.open("GET", "Components/CheckoutComponents/check.inc.php?caskID=" +caskID+"&cPercent="+cPercent, true);
                xhttp.send();   

              }, 2000); // refresh every 10000 milliseconds


      
        </script>
     


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


  function percentageCheck() {



    var caskID = $("#caskID").val();
    var percent = $("#percent").val();
    var userID = $("#userID").val();
    var name = $("input#user-name").val();
    var email = $("input#user-email").val();
    var phone = $("input#user-mobile-number").val();
    var address = $("input#address").val();
    var phoneRegex = "/^[0-9 ]+$/";
    var emailRegex = "[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\\\.[A-Za-z]{2,4}";
    var firstName = name; // For Success/Failure Message


      // Check for white space in name for Success/Fail message
      if (firstName.indexOf(' ') >= 0) {
        firstName = name.split(' ').slice(0, -1).join(' ');
      }
        // get the current percentage from the database and fetch the row
        // run checks before payment can be processed 
    var totalAvailable = $("#cPercentage").val();

        if(parseInt(percent) > totalAvailable || totalAvailable == 0 || totalAvailable < parseInt(percent)) {
              // Fail message
        $('#success').html("<div class='alert alert-danger'>");
        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
          .append("</button>");
        $('#success > .alert-danger').append($("<strong>").text("Sorry, " + firstName + " it seems that the percentage you requested is too high."));
        $('#success > .alert-danger').append($("<br><strong>").text("Please try again."));
        $('#success > .alert-danger').append('</div>');
       
         
    } else if ((phone.length > 11 || phone.length < 7 || phone.match(phoneRegex) || phone=="" )) {
        // Fail message
        $('#success').html("<div class='alert alert-danger'>");
        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
          .append("</button>");
        $('#success > .alert-danger').append($("<strong>").text("Sorry " + firstName + ", it seems that the phone number is not in the right format. "));
        $('#success > .alert-danger').append($("<br><strong>").text("Please try again."));
        $('#success > .alert-danger').append($("<br><strong>").text("e.g. 02011112222 or 07712300011."));
        $('#success > .alert-danger').append('</div>');


    }
    else if ((address.length > 100 || address.length < 5 || address=="") ) {
        // Fail message
        $('#success').html("<div class='alert alert-danger'>");
        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
          .append("</button>");
        $('#success > .alert-danger').append($("<strong>").text("Sorry " + firstName + ", it seems that the address is not in the right format. "));
        $('#success > .alert-danger').append($("<br><strong>").text("Please try again."));
        $('#success > .alert-danger').append('</div>');


    }
    else if ((name.length > 60 || name.length < 1 || name=="") ) {
        // Fail message
        $('#success').html("<div class='alert alert-danger'>");
        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
          .append("</button>");
        $('#success > .alert-danger').append($("<strong>").text("Sorry, it seems you need to provide a name."));
        $('#success > .alert-danger').append($("<br><strong>").text("Please try again."));
        $('#success > .alert-danger').append('</div>');


    } 
    else if(email.length > 50 || email.length < 5 || !email.match(emailRegex) || email=="") {
        // Fail message
        $('#success').html("<div class='alert alert-danger'>");
        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
          .append("</button>");
        $('#success > .alert-danger').append($("<strong>").text("Sorry " + firstName + ", it seems that the email is not in the right format. "));
        $('#success > .alert-danger').append($("<br><strong>").text("Please try again."));
        $('#success > .alert-danger').append('</div>');
    }
    else {
     
      $this = $("#sendPayment");
      $this.prop("disabled", true); // Disable submit button until AJAX call is finished, this is to prevent multiple payment attempts in the same window
      $.ajax({
          url: 'Components/CheckoutComponents/checkoutCheck.inc.php',
          type: 'POST',
          data: {
            caskID: caskID,
            percent: percent
        },

        cache: false,

        success: function() {
         // get stripe payment intent
          const stripePaymentIntent = document.getElementById("stripe-payment-intent").value;
          var cost = document.getElementById("cost").innerText;

              // execute the payment
            stripe
            .retrievePaymentIntent(stripePaymentIntent)
            .then(function(result) {
              var charges = result.paymentIntent.payment_method;
              

              // Handle result.error or result.paymentIntent
              if(result.error || (charges == "")) {
                console.log(result.error);
               
              }
              else {
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
                  if (result.error || result.paymentIntent.payment_method == "") {
                    console.log(result.error);
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                      .append("</button>");
                    $('#success > .alert-danger').append($("<strong>").text("Please make sure you have filled in all the fields and try again."));
                    $('#success > .alert-danger').append('</div>');

           
                  } else {
                        
                          console.log("The card has been verified successfully...", result.paymentIntent.id);
                          var email = document.getElementById("user-email").value;
                          var phone = document.getElementById("user-mobile-number").value;
                          var name = document.getElementById("user-name").value;
                          var today = new Date();
                          var dd = String(today.getDate()).padStart(2, '0');
                          var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                          var yyyy = today.getFullYear();
                          today = dd + '/' + mm + '/' + yyyy;
                          
                          <?php

                            ?>
                          window.location.replace('paymentSuccess.php?id=' + result.paymentIntent.id + '&caskID=' + caskID + '&userID=' + userID + '&price=' + cost + '&percentage=' + percent + "&date=" + today + '&name='+ name +'&email='+ email+'&phone='+phone);
     

                    }
              });
            };

                })

                  

                      
        },
        error: function () {
            // Fail message
            $('#success').html("<div class='alert alert-danger'>");
            $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
              .append("</button>");
            $('#success > .alert-danger').append($("<strong>").text("Sorry. Please try again later."));
            $('#success > .alert-danger').append('</div>');
        },
        complete: function () {

            setTimeout(function () {
              $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
            }, 1000);
          }
      });
      return true;
      
    }
    
  }

</script>