<?php
include '../../includes/dbconnect.php';

if(!empty($_GET['id'])){
  $id=$_GET['id'];
}


$DeleteQuery ="DELETE FROM pawsusers WHERE user_id='{$id}'";
$del_var=mysqli_query($con, $DeleteQuery) or die(mysqli_error($con));
header('location:../edit-users.php');


/*mysqli_query($con,"DELETE FROM users WHERE id='{$id}'");
 or die(mysqli_error($con));
header('location:../edit-members.php');
*/

?>