<?php

require '../../Database/dbconnect.inc.php';

$dbConnection = Connect();

$email = $_POST['EmailAddress'];
$password = $_POST['Password'];
$passwordConfirm = $_POST['PasswordConfirm'];
$firstName = $_POST['FirstName'];
$lastName = $_POST['LastName'];
$dob = $_POST['DOB'];
$phoneNo = $_POST['PhoneNo'];

$select = mysqli_query($dbConnection, "SELECT * FROM user WHERE email = '" . $email . "'");
if (mysqli_num_rows($select)) {
    //Dupe Email
    header('?error:email');
}

if($password != $passwordConfirm)
{
    //Password Mismatch
    header('?error:pwdMM');
}

//Prepared Statement
$stmt = $dbConnection->prepare("INSERT INTO user (Email, Password, UserType, FirstName, LastName, DOB, PhoneNumber, 2FAENABLED) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssi", $Email, $HashedPassword, $UserType, $FirstName, $LastName, $DOB, $PhoneNo, $Auth);

$Email = $email;
$HashedPassword = password_hash($password, PASSWORD_DEFAULT); //password_verify to decrypt
$UserType = "User";
$FirstName = $firstName;
$LastName = $lastName;
$DOB = $dob;
$PhoneNo = $phoneNo;
$Auth = 0;
$stmt->execute();

$stmt->close();
$dbConnection->close();