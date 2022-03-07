<?php
include('../../includes/dbconnect.php');

error_reporting(E_ALL);
ini_set('display_errors', 'On');


if(!empty($_POST['id'])){
  $id=$_POST['id'];
}

if(isset($_POST['submit'])){
//assign variables
$prod_name=$_POST['prod_name'];
$prod_type=$_POST['prod_type'];
$prod_weight=$_POST['prod_weight'];
$prod_desc=$_POST['prod_desc'];
$prod_pet=$_POST['prod_pet'];
$prod_price=$_POST['prod_price'];



$con->query("UPDATE products SET prod_name='$prod_name', prod_weight='$prod_weight', prod_type='".addslashes($prod_type)."', prod_price='$prod_price', prod_desc='$prod_desc', prod_pet='$prod_pet' WHERE id=$id") or
       die($con->error);



/*$con->query("UPDATE `films` SET `title`=[$title],`desc`=[$desc],`director`=[$director],
`genre`=[$genre],`age_rating`=[$age_rating],`length`=[$length],`showing_time`=[$showing_time],`stock`=[$stock], `trailer`=[$trailer] WHERE 'id'=[$id]") or
       die($con->error); 
*/
  
header('location:../edit-products.php');
}

 ?>
