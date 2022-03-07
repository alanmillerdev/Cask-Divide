<!DOCTYPE html>
<html lang="en">
  <?php
        //include db & sessions file
        include('../includes/dbconnect.php');
        include('../includes/sessions.php');
      ?>
<head>
  <title>Admin Panel</title>
  <?php include('../includes/dbconnect.php')?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap-->
  <link href="../mdb-framework/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../mdb-framework/css/mdb.min.css" rel="stylesheet">
  <!-- stylesheets -->
  <link href="../mdb-framework/css/style.min.css" rel="stylesheet">
  <link href="style/nav_style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<!-- start body-->
<body class="bg-dark">
  <!-- start container-->
    <div class="container">
      <!-- start card-->
      <div class="card card-login mx-auto mt-5">
        <div class="card-header bg-dark white-text">Admin Panel - Paws Pet Supplies</div>
        <!-- start card body-->
        <div class="card-body">
          <?php
              if(!empty($_SESSION['msg'])){
              // if session message has been set, display it
              echo "<div class='select-bar'><div class='".$_SESSION['msgstatus']."'>{$_SESSION['msg']}</div></div>";
              // clear session messages
              unset($_SESSION['msg']);
              unset($_SESSION['msgstatus']);
            }?>
                <!-- form start-->
                <form action="ad_processing/admin_login.php" method="post" name="login">
                    <!-- email-->
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="username" id="username" name="username" class="form-control" placeholder="Username" required>
                            <label for="username">Username</label>
                        </div>
                    </div>
                  <!-- password-->
                    <div class="form-group">
                        <div class="form-label-group">
                              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                              <label for="password">Password</label>
                        </div>
                    </div>

                  <!-- button-->
                  <button class="btn btn-md btn-block btn-primary" id="submit" name="submit">Log in<i class="fas fa-sign-in-alt"></i></button>
                  <!-- /button-->
                </form>
                <!-- /end form-->

        </div>
        <!--/end card body-->
      </div>
      <!--/end card-->
    </div>
    <!--end container-->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>
