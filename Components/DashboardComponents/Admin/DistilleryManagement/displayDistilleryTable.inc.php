<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../../../index.php"));
  }

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

$sql = "SELECT * FROM distillery";

$query = mysqli_query($dbConnection, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Distillery Name</th>
            <th scope="col">Distillery Description</th>
        </tr>
    </thead>
    <tbody>

        <?php

        foreach ($result as $distillery) {

            echo '
                
                <tr>
                    <th scope="row">' . $distillery['DistilleryName'] . '</th>
                    <td>' . $distillery['Description'] . '</td>
                </tr>
                ';
        };

        ?>

    </tbody>
</table>