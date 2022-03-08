<!-- REGISTER SECTION -->
<section id="form-styling">
  <div class="container">
    <div class="d-flex justify-content-center align-items-center ">
      <div class=" rounded-3 text-light bg-dark px-4 py-1">
        <div class="text-center">
          <h3>Register</h3>
        </div>

        <form action="Components/RegisterComponents/registerUser.inc.php" method="post">

          <div class="form-outline mb-4">
            <input type="text" id="" name="FullName" class="input-style" placeholder="Name" />
          </div>

          <div class="form-outline mb-4">
            <input type="email" id="" name="EmailAddress" class="input-style" placeholder="Email" />
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="" name="Password" class="input-style" placeholder="Password" />
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="" name="PasswordConfirm" class="input-style" placeholder="Confirm Password" />
          </div>

          <div class="form-outline mb-4">
            <input type="date" id="" name="DOB" class="input-style" placeholder="Date of Birth" />
          </div>

          <div class="form-outline mb-4">
            <input type="text" id="" name="PhoneNumber" class="input-style" placeholder="Phone Number" />
          </div>

          <div class="text-center pt-1 mb-5 pb-1">
            <button type="submit" class="form-styling-button"><span>Register</span></button>
          </div>

          <div class="d-flex align-items-center justify-content-center pb-4">
            <p class="mb-0 me-2">Aready have an account?</p>
            <button type="button" class="sign-up-button ml-3"><span>LOG IN</span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>