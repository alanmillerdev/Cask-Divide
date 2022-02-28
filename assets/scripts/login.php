<?php
//Pull variables from the form
$username = $_POST["uname"];
$password = $_POST["psw"];
//
// Connect to the database
$con = mysqli_connect("", "", "", "")
or die("Cannot Connect to Database");

//Check if fields not empty
if ( !isset($_POST['uname'], $_POST['psw']) ) {
	exit('Please fill both the username and password fields!');
}
//Check if username and password exist in the database
$sql = "SELECT  * FROM register WHERE username = '$username' and password = '$password'";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
while($row = mysqli_fetch_array($result) ){
	$user_type = $row["user_type"];
	}

//Find the user in the database, attach a session based on user type and redirect to new page
if($count == 1){
	if($user_type == "user"){
  session_start();
  $_SESSION["USER_ID"] = $username;
  header("Location:");
}
elseif ($user_type == "admin") {
	session_start();
  $_SESSION["USER_ID"] = $username;
	$_SESSION["admin"] = "true";
  header("Location:");
}
}else{
	header("refresh:5;url=");
	echo "User not recognized, you will be redirected";
}



?>
