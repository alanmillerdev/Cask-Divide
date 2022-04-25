<?php
if(!defined('SecurityCheck')) {
  exit(header("Location: ../../index.php"));
}
?>
<!-- REGISTER SECTION -->
<section id="form-styling">
<div class="container">
  <div class="d-flex justify-content-center">
      <div class="rounded-3 text-light p-5" style="background-color: #272727;">
        <div class="text-center">
          <h3 class="mt-1 mb-5" id="decor-title">Register</h3>
        </div>
        <form action="Components/RegisterComponents/registerUser.inc.php" method="post">

        <div class="row mx-3">
          <div class=" mb-4 col-lg-6 p-0">
            <input type="text" id="" name="FullName" class="input-style mx-3 m-auto" placeholder="Full Name" required />
          </div>
          <div class="mb-4 col-lg-6 p-0">
            <input type="email" id="" name="EmailAddress" class="input-style mx-3 m-auto" placeholder="Email" required />
          </div>
        </div>

        <div class="row mx-3">
          <div class="mb-4 col-lg-6 p-0">
            <input type="password" id="" name="Password" class="input-style mx-3 m-auto" placeholder="Password" required />
          </div>

          <div class="mb-4 col-lg-6 p-0">
            <input type="password" id="" name="PasswordConfirm" class="input-style mx-3 m-auto" placeholder="Confirm Password" required />
          </div>
        </div>

        <div class="row mx-3">
          <div class="mb-4 col-lg-6 p-0">
            <input placeholder="Date of Birth" class="input-style mx-3 m-auto" type="text" name="DOB" onfocus="(this.type='date')" onblur="(this.type='text')" onsubmit="(this.type='date')" required>
          </div>
          <div class="mb-4 col-lg-6 p-0">
            <input type="text" id="" name="PhoneNumber" class="input-style mx-3 m-auto" placeholder="Phone Number (Optional)" />
          </div>
        </div>

          <div class="text-center pt-1 mb-5 pb-1">
            <button type="submit" class="form-styling-button"><span>Register</span></button>
          </div>
          <div class="d-flex align-items-center justify-content-center pb-4">
            <p class="mb-0 me-2">Aready have an account?</p>
            <a href="login.php">
              <button type="button" class="sign-up-button ml-3"><span>LOG IN</span></button>
            </a>
          </div>
        </form>
      </div>
      </div>
   </div>
</section>