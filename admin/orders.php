<!DOCTYPE html>
<?php 

include('../includes/dbconnect.php');
include('../includes/sessions.php');
if(!isset($_SESSION['admin']))
{
  header('location: ../home.php');
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

<!-- Wrap all content, important to start each page with this for the header to work!-->
<div class="wrapper">
          <?php 
      //include SIDEBAR
      include('sidebar.php');
      ?>

                <!-- Page Content  -->
      <div id="content">

        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn">
                    <i class="fas fa-angle-left"> </i>
                </button>
                <a class="navbar-brand" href="home.php">
                   <h1>Paws Pet Supplies - Orders</h1>
                 </a>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto greeting">
                          <li class="nav-item dropdown<?php if($page=='account'){echo 'active';}?>">
                            <!-- greetin-->
                              <a class="nav-link border border-dark rounded dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                aria-expanded="false">Hello, Admin!<i class="material-icons right"></a>
                            <!-- Greeting end-->
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="logout.php">Logout</a>

                                  </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

       <main>
        <div class="bg">
            <div class="row">
            <div class="col-12">
              <h1 class="center-text">All Orders</h1>
              <hr/>
            </div>
            <div><br><br><br><br></div>
            </div>


  <!-- start container-->

  <section class="row">
            <!--<div class="col-1"></div>-->
            <div class="col-12">

  <div class="card mb-3">
              <!-- start card body-->
              <div class="card-body">
                <!-- start table-->
                <div class="table-responsive">
                  <table class="table table-bordered" id="data_Table">
                    <thead>
                      <tr>
                        <th>Order Number</th>
                        <th>Total Price</th>
                        <th>Paid Status</th>
                        <th>Customer</th>
                        <th>PayPal TX</th>
                        <th><strong>Delete</strong></th>
                      </tr>
                    </thead>
                    <?php
                    //Select all from products table
                    $sql ="SELECT * FROM orders";
                    $result=mysqli_query($con, $sql);
                    $count=1;

                    // output data of each row
                    while($row=mysqli_fetch_assoc($result)) { ?>
                    <tbody>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td>£<?php echo $row['total_amount']; ?></td>
                        <td><?php echo $row['paid_status']; ?></td>
                        <td><?php //echo the name related to the userid
                        $usr_id=$row['user_id'];
                        $user_sql="SELECT username FROM pawsusers WHERE user_id='$usr_id'";
                        $user_result=mysqli_query($con, $user_sql);
                        $user_row=mysqli_fetch_assoc($user_result);
                        $user_nm=$user_row['username'];
                        //echo the customers full name
                        echo $user_nm;?></td>
                        <td><?php echo $row['paypal_tx'];?></td>
                        <td>
                          <button class="btn danger-color-dark"><a href="ad_processing/del-order.php?id=<?php echo $row['id'];?>">delete</a></button>
                          </td>
                      </tr>
                    </tbody>
                    <?php }?>
                  </table>
                </div>
                <!-- end table-->
            </div>
            <!-- /end card body-->
        </div>

        </div>

        </div>
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




  <!-- Include the footer-->
  <!-- /end footer-->
  <!-- end body and html tag-->
  </body>
  </html>