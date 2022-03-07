<?php

$PageTitle = "Login";
include 'Components/RequiredComponents/header.inc.php';
include 'Components/RequiredComponents/bootstrapCSS.inc.php';

?>

<!--NAVBAR INCLUDE-->
    <?php
    $page='home';
    include('./includes/navbar_login.php');
    ?>



<!-- LOGIN SECTION -->
  <section id="form-styling">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class=" rounded-3 text-light bg-dark p-5">
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

include 'Components/RequiredComponents/bootstrapJS.inc.php';

?>