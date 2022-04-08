<?php
if (getenv('REQUEST_METHOD') != "POST") {
    header("Location: ../../../../index.php");
}

define('SecurityCheck', TRUE);

require '../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$email = $_POST["EmailAddress"];
$password = $_POST["Password"];

//Prepared Statement
$stmt = $dbConnection->prepare('SELECT Email, Password, UserType, UserID, FirstName, LastName FROM user WHERE Email = ?');

if ($stmt) {
    $stmt->bind_param('s', $email);

    $stmt->execute();

    // Get query results
    $stmt->bind_result($email, $hash, $userType, $userID, $firstName, $lastName);
    $stmt->store_result();

    // Fetch the query results in a row
    $stmt->fetch();

    // Verify user's password $password being input and $hash being the stored hash
    if (password_verify($password, $hash)) {
        // Password is correct
        if ($userType == "Admin") {
            session_start();
            $_SESSION["UserType"] = "Admin";
            $_SESSION["UserID"] = $userID;
            $_SESSION["FullName"] = $firstName . ' ' . $lastName;
            $dbConnection->close();
            header('Location: ../../index.php');
        } elseif ($usertype == "User"){
            session_start();
            $_SESSION["UserType"] = "User";
            $_SESSION["UserID"] = $userID;
            $_SESSION["FullName"] = $firstName . ' ' . $lastName;
            $dbConnection->close();
            header('Location: ../../index.php');
        }
        // Password is incorrect
    } else {
        header('Location: ../../login.php?msg=err');
        $dbConnection->close();
    }
}