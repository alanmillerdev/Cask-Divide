<?php
define('SecurityCheck', TRUE);
include('../Components/DashboardComponents/Template/header.inc.php');

include('../Components/DashboardComponents/Template/sidebar.inc.php');



include('../Components/DashboardComponents/Template/scripts.inc.php');
?>
<main>
    <div class="bg">
        <div class="row">
            <div class="col-12">
              <h1 class="center-text">Edit Users</h1>
              <hr/>
            </div>
            <div><br><br><br><br></div>
            </div>
          <!--  MAIN CONTENT GOES HERE-->
          <section class="row">
            <!--<div class="col-1"></div>-->
            <div class="col-12">
              <div class="card">
                <div class="card-header white-text">
                  Edit Users
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
                          <th>Address</th>
                          <th>Postcode</th>
                          <th>Country</th>
                          <th><strong>Update</strong></th>
                          <th><strong>Delete</strong></th>
                          </tr>
                          </thead>
                          <?php
                          error_reporting(E_ALL);
                          ini_set('display_errors', 'On');
                          //select all from users table in db
                          $sql = 'SELECT * from pawsusers';
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
                          <form class="table table-bordered table-responsive-md table-striped" method="post" action="ad_processing/up_user.php" name="up_del_table">
                          <tbody>
                          <tr>
                          <td>
                            <input type='text' name='username' id='username' value='<?php echo $row['username'];?>'>
                          </td>
                          <td>
                            <input type='text' name='dob' id='dob' value='<?php echo $row['dob'];?>'>
                          </td>
                          <td>
                            <input type='text' name='email' id='email' value='<?php echo $row['email'];?>'>
                          </td>
                          <td>
                            <input type='text' name='password' id='password' value='<?php echo $row['password'];?>'>
                          </td>
                          <td>
                            <input type='text' name='address' id='address' value='<?php echo $row['address'];?>'>
                          </td>
                          <td>
                            <input type='text' name='postcode' id='postcode' value='<?php echo $row['postcode'];?>'>
                          </td>
                          <td>
                            <input type='text' name='country' id='country' value='<?php echo $row['country'];?>'>
                          </td>
                          <td>
                          <input type="hidden" name="user_id" value='<?php echo $row['user_id'];?>'>
                          <input class="btn" type="submit" name="update" id="update" value="update">
                          </td>
                          <td>
                          <button class="btn danger-color-dark"><a href="ad_processing/del-user.php?id=<?php echo $row['user_id'];?>">delete</a></button>
                          </td>
                          </tr>
                          </tbody>
                          </form>
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
      </div>
    </main>