<?php

$PageTitle = "Login";
include 'Components/RequiredComponents/header.inc.php';
include 'Components/RequiredComponents/styles.inc.php';

?>

<!--NAVBAR INCLUDE AND ERROR MESSAGE-->
<?php
include('Components/RequiredComponents/navbar.inc.php');

include 'Components/LoginComponents/loginErrorHandling.inc.php';

?>



<!-- LOGIN SECTION -->
<section id="form-styling">
  <div class="container">
    <div class="d-flex justify-content-center align-items-center">
      <div class=" rounded-3 text-light p-5">
        <div class="text-center">
          <h3>LOGIN</h3>
        </div>

        <?php

        include 'Components/LoginComponents/loginForm.inc.php'

        ?>
      </div>
    </div>
  </div>
</section>

<?php

include('Components/RequiredComponents/footer.inc.php');

include 'Components/RequiredComponents/bootstrapJS.inc.php';

?>