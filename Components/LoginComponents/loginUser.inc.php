<?php
if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Location: ../../index.php");
  }

define('SecurityCheck', TRUE);

require '../../Database/dbconnect.inc.php';

$dbConnection = Connect();

$email = $_POST["EmailAddress"];
$password = $_POST["Password"];

//Prepared Statement
$stmt = $dbConnection->prepare('SELECT Email, Password, UserType, UserID FROM `user` WHERE Email = ?');

if ($stmt) {
    $stmt->bind_param('s', $email);

    $stmt->execute();

    // Get query results
    $stmt->bind_result($email, $hash, $userType, $userID);
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
            $dbConnection->close();
            header('Location: ../../index.php');
        } else {
            session_start();
            $_SESSION["UserType"] = "User";
            $_SESSION["UserID"] = $userID;
            $dbConnection->close();
            header('Location: ../../index.php');
        }
        // Password is incorrect
    } else {
        header('Location: ../../login.php?msg=err');
        $dbConnection->close();
    }
}
