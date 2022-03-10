<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../../../index.php"));
  }

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$sql = "SELECT * FROM cask";

$query = mysqli_query($dbConnection, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Cask ID</th>
            <th scope="col">Cask Name</th>
            <th scope="col">Cask Description</th>
            <th scope="col">Percentage Available</th>
            <th scope="col">Whole Cask Price</th>
            <th scope="col">OLA</th>
            <th scope="col">RLA</th>
            <th scope="col">Cask Type</th>
            <th scope="col">Wood Type</th>
            <th scope="col">Distillery Name</th>
        </tr>
    </thead>
    <tbody>

        <?php

        foreach ($result as $cask) {

            echo '
        
        <tr>
            <th scope="row">' . $cask['CaskID'] . '</th>
            <td>' . $cask['CaskName'] . '</td>
            <td>' . $cask['CaskDescription'] . '</td>
            <td>' . $cask['PercentageAvailable'] . '</td>
            <td>' . $cask['WholeCaskPrice'] . '</td>
            <td>' . $cask['OLA'] . '</td>
            <td>' . $cask['RLA'] . '</td>
            <td>' . $cask['CaskType'] . '</td>
            <td>' . $cask['WoodType'] . '</td>
            <td>' . $cask['DistilleryName'] . '</td>
        </tr>
        ';
        };

        ?>

    </tbody>
</table>