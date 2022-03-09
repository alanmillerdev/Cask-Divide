 <!-- CONTACT SECTION -->
  <section id="form-styling">
    <div class="container">
      <div class="d-flex justify-content-center">
        <div class="rounded-3 text-light bg-dark p-5">
          <div class="text-center">
            <h3 class="mt-1 mb-5">Contact</h3>
          </div>

          <form class="d-flex flex-column" id="contactForm" name="sentMessage" novalidate="novalidate" action="contactFormLogic.inc.php">
            <div class="form-outline form-group mb-4">
              <input type="text" name="name" id="name" required="required" data-validation-required-message="Please enter your name." class="input-style" placeholder="Name" />
             <p class="help-block text-light"></p>
            </div>

            <div class="form-outline form-group mb-4">
              <input type="email" name="email" id="email" required="required" class="input-style"  data-validation-required-message="Please enter your email address." placeholder="Email" />
             <p class="help-block text-light"></p>
            </div>

            <div class="form-outline form-group mb-4">
              <input type="text" name="phoneNumber" id="phoneNumber"  required="required" class="input-style"  data-validation-required-message="Please enter your phone number." placeholder="Phone Number" />
             <p class="help-block text-light"></p>
            </div>

            <div class="form-outline form-group mb-4">
              <textarea name="message" id="message" required="required" data-validation-required-message="Please enter your message." class="input-style" cols="25" rows="2" placeholder="Message"></textarea>
             <p class="help-block text-light"></p>
            </div>

            <div class="text-center pt-1 mb-5 pb-1">
                <div class="clearfix"></div>
                <div id="success"></div>
              <button class="form-styling-button" id="sendMessageButton" type="submit"><span>Send</span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
