<?php
if(!defined('SecurityCheck')) {
  exit(header("Location: ../../index.php"));
}
?>
<section id="home-section">
  <div class="home-inner container">
    <div class="row">
      <div class="col-lg-8">
        <h1 class="display-4 text-white " id="main-title">INVEST IN SCOTCH WHISKY</h1>
        <div class="d-flex">
          <div class="py-4 align-self-end text-white" id="subtext">
            Whisky casks are growing as a investment oppertunity for the general public and consumers. With casks ranging from several hundreds to tens of thousands of pounds,
            this significantly reduces the possibility of the general public having the ability to risk significant savings or simply afford to invest within scotch whisky at all.
          </div>
        </div>
        <button type="button" onclick="location.href='casks.php'" class="sign-up-button" style="text-transform: uppercase;"><span>Browse Casks</span></button>
      </div>

      <div class="col-lg-4">
        <img class="d-none d-lg-block" src="images/cask1.png" alt="Image of a Scotch Whiskey Cask" height="auto" width="auto">
      </div>
    </div>
  </div>
</section>
</div>