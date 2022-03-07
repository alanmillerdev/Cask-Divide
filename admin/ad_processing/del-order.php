<?php
include '../../includes/dbconnect.php';

if(!empty($_GET['id'])){
  $id=$_GET['id'];
}


$DeleteQuery ="DELETE FROM orders WHERE id='{$id}'";
$del_var=mysqli_query($con, $DeleteQuery) or die(mysqli_error($con));
header('location:../orders.php');


?>