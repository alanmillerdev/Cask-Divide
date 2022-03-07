<!DOCTYPE html>
<?php include('../includes/dbconnect.php');
include('../includes/sessions.php');
if(!isset($_SESSION['admin']))
{
  header('location: ../index.php');
  exit();
}
?>
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
      <?php 
      //include SIDEBAR
      include('sidebar.php');
      ?>

      <!-- Page Content  -->
      <div id="content">

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn">
                    <i class="fas fa-angle-left"> </i>
                </button>
                <a class="navbar-brand" href="home.php">
                   <h1>Paws Pet Supplies - Add Products</h1>
                 </a>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto greeting">
                          <li class="nav-item dropdown<?php if($page=='account'){echo 'active';}?>">
                            <!-- greeting-->
                              <a class="nav-link border border-dark rounded dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                aria-expanded="false">Hello Admin!<i class="material-icons right"></a>
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
          <main>
            <!-- Film Start-->
            <section class="row">
              <div class="col-12">
                <!-- card starts -->
                <div class="card">
                  <div class="card-body">
                    <form method="post" action="ad_processing/insert_product.php" enctype="multipart/form-data">
                      <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" id="prod_name" class="form-control" name="prod_name" value="" required>
                      </div>
                      <div class="form-group">
                      <label>Price</label>
                      <input type="text" class="form-control" name="prod_price" id="prod_price" value="" required></textarea>
                      </div>
                      <div class="form-group">
                          <label>Type of Pet</label>
                          <textarea class="form-control" name="prod_pet" id="prod_pet" value="" required></textarea>
                      </div>
                      <div class="form-group">
                          <label>Description</label>
                          <textarea class="form-control" name="prod_desc" id="prod_desc" value="" required></textarea>
                      </div>
                      <div class="form-group">
                          <label>Weight</label>
                          <input type="number" class="form-control" name="prod_weight" id="prod_weight" value="" required></textarea>
                      </div>
                      <div class="form-group">
                          <label>Type of Product</label>
                          <select name="prod_type" id="prod_type" class="browser-default custom-select form-control" placeholder="Select" required>
                            <option value="Dog Food">Dog Food</option>
                            <option value="Cat Food">Cat Food</option>
                            <option value="Collars">Collars</option>
                            <option value="Leads">Leads</option>
                            <option value="Carriers and Travel">Carriers and Travel</option>
                            <option value="Beds">Beds</option>
                            <option value="Grooming">Grooming</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="image">Upload Image File</label></br>
                          <input type="file" name="image"/>
                        </div>
                      </div>
                      <input type="hidden" id="id" name="id" value="">
                      <button type="submit" class="btn" id="submit" name="submit">Submit</button>
                      </form>
                </div> 
              </div>
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
