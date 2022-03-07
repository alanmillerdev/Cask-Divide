<?php
include('../../includes/dbconnect.php');

if(!empty($_GET['id'])){
  $id=$_GET['id'];
}
$sql =mysqli_query($con,"SELECT * FROM products");

while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
  $prod_name=$row['prod_name'];
}

$DeleteQuery ="DELETE FROM products WHERE ID='{$id}'";
$del_var=mysqli_query($con, $DeleteQuery) or die(mysqli_error($con));

$DeleteQuery_times ="DELETE FROM products WHERE prod_name='$prod_name'";
$del_var_times=mysqli_query($con, $DeleteQuery_times) or die(mysqli_error($con));
header('location:../edit-products.php');
?>
