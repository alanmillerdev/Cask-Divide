<?php
//Connect to database
$con = mysqli_connect("", "", "", "")
or die("Cannot Connect to Database");

//Pull variables from the form
$password = $_POST['psw'];
$c_password = $_POST['cpsw'];
$email = $_POST['email'];
$phone = $_POST['phone'];

//Check if form not empty
if (empty($_POST['email']) ||
    empty($_POST['psw']) ||
    empty($_POST['cpsw']) ||
    empty($_POST['phone'])) {
    header("refresh:5;url=");
    echo "Form not filled properly, you will be redirected";
}

//Check if user doesn't exist already
$sql = "SELECT  * FROM register WHERE email = '$email'";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

//Validate password
if($c_password == $password){
if($count < 1){
//Register a new user into the database
$sql = "INSERT INTO register (email, password, phone, user_type) VALUES ('$email', '$password', '$phone', 'user')";
if (!mysqli_query($con,$sql))
{die('Error: ' . mysqli_error($con));}
header("refresh:5;url=");
echo "User registered, you will be redirected";
}else{
  header("refresh:5;url=");
  echo "User already exists, you will be redirected";
}
}else{
  header("refresh:5;url=");
  echo "Passwords don't match, you will be redirected";
}

?>
