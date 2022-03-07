<!DOCTYPE html>
<?php include('../includes/dbconnect.php');
include('../includes/sessions.php');
if(!isset($_SESSION['admin']))
{
  header('location: ../index.php');
  exit();
}?>
<html lang="en">
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
<body>
  <div class="wrapper">
      <!-- Sidebar  -->
       <?php 
      //include SIDEBAR
      include('sidebar.php');
      ?>

      <!-- Page Content, this is the top nav  -->
      <div id="content">

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn">
                    <i class="fas fa-angle-left"> </i>
                </button>
                <a class="navbar-brand" href="home.php">
                   <h1>Paws Pet Supplies - Add User</h1>
                 </a>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto greeting">
                          <li class="nav-item dropdown<?php if($page=='account'){echo 'active';}?>">
                            <!-- greetin-->
                              <a class="nav-link border border-dark rounded dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                aria-expanded="false">Hello Admin!<i class="material-icons right"></i></a>
                            <!-- Greeting end-->
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                  </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

<!-- MAIN CONTENT-->
    <main class="row">
      <div class="row">
      <div class="col-12">
        <h1 class="center-text">Add a new user to the website</h1>
        <hr/>
      </div>
      <div><br><br><br><br></div>
      </div>
            <!--<div class="col-1"></div>-->

    <section class="container-fluid row">
      <div class="col-12">
          <div class="card">
            <div class="card-header white-text">
                  Add a new user
                </div>
                <div class="card-body">
                  <div id="table" class="table-editable">
                  <table class="table table-bordered table-responsive-md table-striped " id="dataTable">
                          <thead>
                          <tr>
                          <th>Username</th>
                          <th>Date of Birth</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Add</th>
                          </tr>
                          </thead>
                          <?php
                          //Insert Code
                          if(isset($_POST['add'])){
                          $new_username=$_POST['new_username'];
                          $new_dob=$_POST['new_dob'];
                          $new_email=$_POST['new_email'];
                          $new_password=$_POST['new_password'];

                          $sql=mysqli_query ($con, "INSERT INTO pawsusers (username, email, password, dob)
                          VALUES ('$new_username', '$new_email', '$new_password', '$new_dob')")
                          or die(mysqli_error());
                          echo "Data inserted";
                          }
                          ?>
                          <tbody>
                          <form class="table table-bordered table-responsive-md table-striped" method="post" action="add_user.php" name="up_del_table">
                          <tr>
                          <td><input type='text' name='new_username' required></td>
                          <td><input type='date' name='new_dob' required></td>
                          <td><input type='text' name='new_email' required></td>
                          <td><input type='text' name='new_password' required></td>
                          <td><input class="btn" type='submit' name='add' id="add" value='add'></td>
                          </tr>
                          </form>
                        </tbody>
                    </table>
                  </div><!--/table editable-->
                </div><!--/card body-->
              </div><!--/col-8 card-->
            </div>
          </section>
          </main>
</div>
</div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

  <script type="text/javascript">
      $(document).ready(function () {
          $('#sidebarCollapse').on('click', function () {
              $('#sidebar').toggleClass('active');
          });
      });
  </script>

</body>
</html>
