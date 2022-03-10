      <form action="Components/LoginComponents/loginUser.inc.php" method="post">
        <div class="form-outline mb-4">
          <input type="email" id="" name="EmailAddress" class="input-style" placeholder="Email" required />
        </div>

        <div class="form-outline mb-4">
          <input type="password" id="" name="Password" class="input-style" placeholder="Password" required />
        </div>

        <div class="text-center pt-1 mb-5 pb-1">
          <button class="form-styling-button" type="submit"><span>Login</span></button>
        </div>

        <div class="d-flex align-items-center justify-content-center pb-4">
          <p class="mb-0 me-2">Not a member? Register now for free!</p>
          <a href="register.php">
            <button type="button" class="sign-up-button ml-3"><span>SIGN UP</span></button>
          </a>
        </div>
      </form>