<?php

require '../../Database/dbconnect.inc.php';

$dbConnection = Connect();

$email = $_POST["EmailAddress"];
$password = $_POST["Password"];

//Prepared Statement
$stmt = $dbConnection->prepare('SELECT Email, Password FROM `user` WHERE Email = ?');

if ($stmt) {
    $stmt->bind_param('s', $email);

    $stmt->execute();

    // Get query results
    $stmt->bind_result($email, $hash);
    $stmt->store_result();

    // Fetch the query results in a row
    $stmt->fetch();

    // Verify user's password $password being input and $hash being the stored hash
    if (password_verify($password, $hash)) {
        // Password is correct
    } else {
        // Password is incorrect
    }
}