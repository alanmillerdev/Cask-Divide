<?php
if (!defined('SecurityCheck')) {
  exit(header("Location: ../../index.php"));
}

include 'Database/dbConnect.inc.php';
$dbConnection = Connect();

$caskID = $_GET['id'];
$userID = $_GET['uid'];
$percentage = $_GET['percent'];

$result = $dbConnection->query("SELECT CaskID, CaskName, WholeCaskPrice FROM Cask WHERE CaskID = $caskID");
$row = mysqli_fetch_array($result);

$caskName = $row[1];

$caskPrice = $row[2];

$cost = round(($caskPrice / 100 * $percentage), 2);

$total = round(($cost * 1.2),2);

?>
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
    </div>

    <div class="col-md-6 order-md-2">
       <div class="shoppingdetails">
        <span id="decor-title">Your Details</span>
        <form class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="username">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input type="text" class="form-control" id="username" placeholder="Username" required>
              <div class="invalid-feedback" style="width: 100%;">
                Your username is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address*</label>
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
            <div class="col-md-5 mb-3">
              <label for="country">Country</label>
              <select class="custom-select d-block w-100" id="country" required>
                <option value="">Choose...</option>
                <option>United Kingdom</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="state">County</label>
              <select class="custom-select d-block w-100" id="state" required>
                <option value="">Choose...</option>
                <option>Big Chungasville</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">Postcode</label>
              <input type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Pay £<?php echo $total ?> to Cask Divide</button>
        </form>
        <hr class="mb-4">
        <div class="text-muted">*Once the cask is finished we will contact you to get your current address details.</div>
      </div>
    </div>
    </div>
  </div>
