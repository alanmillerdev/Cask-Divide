<?php
//Database connection + sessions + errors
include('../../includes/dbconnect.php');
include('../../includes/sessions.php');
include('../../includes/errors.php');

///assign user input to variables
$username=trim($_POST['username']);
$pass=trim($_POST['password']);


//If form is submitted
  if (isset($_POST['submit'])){

      //check user input against database
      $sql="SELECT * FROM pawsusers_admin WHERE username ='$username' AND password='$pass'";
      $result=mysqli_query($con, $sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      // If result matched $myusername and $mypassword, table row must be 1 row
      $count = mysqli_num_rows($result);

      if($count == 1) {
          //set necessary session variables
          $_SESSION['admin']='admin';
          $_SESSION['username']=$row['user_name'];
          $_SESSION['user_id']=$row['ID'];
          $_SESSION['msg'] = "You are now logged in!";
          $_SESSION['msgstatus'] = "success";
          //send user to admin panel
          header('Location:../home.php');
      } else {
          $_SESSION['msg'] = "Something went wrong, please try again!";
          $_SESSION['msgstatus'] = "error";
          header('location:../login.php');
  }
}
?>
