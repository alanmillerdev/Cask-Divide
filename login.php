<?php
define('SecurityCheck', TRUE);

$PageTitle = "Login";
include 'Components/RequiredComponents/header.inc.php';
include 'Components/RequiredComponents/styles.inc.php';

?>

<!--NAVBAR INCLUDE AND ERROR MESSAGE-->
<?php
  include('Components/RequiredComponents/navbar.inc.php');

  include 'Components/LoginComponents/loginErrorHandling.inc.php';

  include 'Components/LoginComponents/loginForm.inc.php'

  include('Components/RequiredComponents/footer.inc.php');

  include 'Components/RequiredComponents/bootstrapJS.inc.php';
?>