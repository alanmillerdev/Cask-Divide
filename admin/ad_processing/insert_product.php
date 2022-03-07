<?php
//dbconnection
include('../../includes/dbconnect.php');

error_reporting(E_ALL);
ini_set('display_errors', 'On');

//if form is submitted
if (isset($_POST['submit'])) {

// receive all input values from the form
$prod_name=$_POST['prod_name'];
$prod_price=$_POST['prod_price'];
$prod_pet=$_POST['prod_pet'];
$prod_desc=$_POST['prod_desc'];
$prod_weight=$_POST['prod_weight'];
$prod_type=$_POST['prod_type'];
$pic=$_FILES['image']['name'];


if (move_uploaded_file($_FILES['image']['tmp_name'], "../../images/" . $_FILES['image']['name'])) {


//inserts
$UpdateQuery =mysqli_query($con,"INSERT INTO products (prod_name, prod_price, prod_pet, prod_desc, prod_weight, prod_type, image)
VALUES ('$prod_name', '$prod_price', '$prod_pet', '$prod_desc', '$prod_weight', '$prod_type', '$pic')");


header('location:../edit-products.php');
} else {
echo "Error: " . $sql . "<br>" . $con->error;
}
}
$con->close();
?>
