<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../index.php"));
    }
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
              <h6 class="my-0">Hoggshead Newmade Spirit</h6>
              <small class="text-muted">23%</small>
            </div>
            <span class="text-muted">$1224</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Fettercairn Whisky</h6>
              <small class="text-muted">4%</small>
            </div>
            <span class="text-muted">$267</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Blair Atholl Whisky</h6>
              <small class="text-muted">7%</small>
            </div>
            <span class="text-muted">$545</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (GBP)</span>
            <strong>£2036</strong>
          </li>
        </ul>
      </div>
      </div>