<!DOCTYPE html>
<?php 

include('../includes/dbconnect.php');
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
                   <h1>Paws Pet Supplies - Edit Products</h1>
                 </a>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto greeting">
                          <li class="nav-item dropdown<?php if($page=='account'){echo 'active';}?>">
                            <!-- greetin-->
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
          <div class="bg">
            <div class="row">
              <div><br>
            </div>
            </div>

            <div class="row">
            <div class="col-12">
              <h1 class="center-text">Available Products</h1>
              <hr/>
            </div>
            <div><br><br><br><br></div>
            </div>
          <!--  MAIN CONTENT GOES HERE-->
          <section class="row">
            <div class="col-12">
              <!-- card starts -->
              <div class="card">
                <div class="card-header white-text">
                  Edit Existing Products
                </div>
                <div class="card-body">
                  <div id="table" class="table-editable">
                  <table class="table table-bordered table-responsive-md table-striped " id="dataTable">
                          <thead>
                          <tr>
                          <th>Product Name</th>
                          <th>Type of product</th>
                          <th>Weight</th>
                          <th>Price</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          </tr>
                          </thead>
          <!-- php, select all from films  -->
          <!-- php, while loop with results -->
          <!-- table+form to display the information  -->
          <!-- $count++; and close table+form -->
            <?php
            //select all from films table in db
            $sql = 'SELECT * from products';
            if (mysqli_query($con, $sql)) {
            echo "";
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }

            $count=1;
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {

            // output data of each row
            while($row = mysqli_fetch_assoc($result)) { ?>
                  <tbody>
                    <tr>
                      <td>
                        <?php echo $row['prod_name'];?>
                      </td>
                      <td>
                        <?php echo $row['prod_type'];?>
                      </td>
                      <td>
                        <?php echo $row['prod_weight'];?>
                      </td>
                      <td>
                        <?php echo $row['prod_price'];?>
                      </td>
                      <td>
                      <input type="hidden" name="id" value='<?php echo $row['id']?>'>
                      <button class="btn"><a href="./up_product.php?id=<?php echo $row['id']?>">Update</a></button>
                      </td>
                      <td>
                      <button class="btn danger-color-dark"><a href="./ad_processing/del_product.php?id=<?php echo $row['id']?>">Delete</a></button>
                      </td>
                    </tr>
                  </tbody>
                  <?php
                  $count++;
                  }
                  }
                  ?>
                </table>
              </div><!--/table editable-->
            </div><!--/card body-->
          </div><!--/col-8 card-->
          </div>
          </section>
          <div class="row divider">
          <div><br><br><br><br></div>
          </div>
          </div> <!--/bg-->
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
