<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../../../index.php"));
  }
  
include 'Cask-Divide\Database\dbConnect.inc.php';

$dbConnection = Connect();

$sql = "SELECT * FROM user";

$query = mysqli_query($dbConnection, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">UserID</th>
            <th scope="col">Email</th>
            <th scope="col">User Type</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Phone Number</th>
            <th scope="col">2FA Enabled</th>
        </tr>
    </thead>
    <tbody>

        <?php

        foreach ($result as $user) {

            if ($user['2FAENABLED'] == 1) {
                $twoFactorStatus = "True";
            } else {
                $twoFactorStatus = "False";
            }
            
            echo '
                
                <tr>
                    <th scope="row">' . $user['UserID'] . '</th>
                    <td>' . $user['Email'] . '</td>
                    <td>' . $user['UserType'] . '</td>
                    <td>' . $user['FirstName'] . '</td>
                    <td>' . $user['LastName'] . '</td>
                    <td>' . $user['DOB'] . '</td>
                    <td>' . $user['PhoneNumber'] . '</td>
                    <td>' . $twoFactorStatus . '</td>
                </tr>
                ';
        };

        ?>

    </tbody>
</table>