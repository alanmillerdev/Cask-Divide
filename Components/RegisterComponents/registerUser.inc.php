<?php

require '../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$email = $_POST['EmailAddress'];
$password = $_POST['Password'];
$passwordConfirm = $_POST['PasswordConfirm'];
$fullName = split_name($_POST['FullName']);
$dob = $_POST['DOB'];
$phoneNo = $_POST['PhoneNumber'];

$firstName = $fullName[0];
$lastName = $fullName[1];

//Dupe Email Check
$select = mysqli_query($dbConnection, "SELECT * FROM user WHERE email = '" . $email . "'");
if (mysqli_num_rows($select)) {
    header('location: ../../register.php?msg=dupe');
    echo ('<h1>hi</h1>');
    exit();
    $dbConnection->close();
}
//Password Mismatch Check
if ($password != $passwordConfirm) {
    header('location: ../../register.php?msg=mismatch');
    exit();
    $dbConnection->close();
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

header('location: ../../login.php?msg=success');

// uses regex that accepts any word character or hyphen in last name
function split_name($name)
{
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim(preg_replace('#' . preg_quote($last_name, '#') . '#', '', $name));
    return array($first_name, $last_name);
}
