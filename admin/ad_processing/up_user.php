<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

include '../../includes/dbconnect.php';

if(!empty($_POST['user_id'])){
  $id=$_POST['user_id'];
}

$UpdateQuery ="UPDATE pawsusers SET username='{$_POST['username']}', 
dob='{$_POST['dob']}', email='{$_POST['email']}', password='{$_POST['password']}' WHERE user_id='{$id}'";
$up_var=mysqli_query($con, $UpdateQuery) or die(mysqli_error($con));
echo $UpdateQuery;
header('location:../edit-users.php');

?>
