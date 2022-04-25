<?php
if (!defined('SecurityCheck')) {
    exit(header("Location: ../../../index.php"));
}
?>

<main class="container rounded mt-5 mb-0">
     

    <div class="card shadow border-0 mt-20">
        <div class="card-header">
            <h5 class="mb-0">Investments </h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-nowrap">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Cask Name</th>
                        <th scope="col">Percent Purchased</th>
                        <th scope="col">Purchase Amount</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Purchase Date</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    // determine which page number visitor is currently on
                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    // determine the sql LIMIT starting number for the results on the displaying page
                    $this_page_first_result = ($page - 1) * $results_per_page;

                    // retrieve selected results from database and display them on page
                    $sql = 'SELECT c.CaskName, i.PercentPurchased, i.PurchaseAmount, i.TransactionID, i.PurchaseDate 
                            FROM investment AS i 
                            INNER JOIN user AS u 
                                ON u.UserID = i.UserID 
                            INNER JOIN cask as c 
                                ON i.CaskID = c.CaskID LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
                    $result = mysqli_query($dbConnection, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        echo ' 
                                <tr>
                                    <td>
                                        ' . $row['CaskName'] . '
                                    </td>
                                    <td>
                                        ' . $row['PercentPurchased'] . '
                                    </td>
                                    <td>
                                        ' . $row['PurchaseAmount'] . '
                                    </td>
                                    <td>
                                    ' . $row['TransactionID'] . '
                                    </td>
                                    <td>
                                        ' . $row['PurchaseDate'] . '
                                    </td>
                                </tr>
     
                                        ';
                    };

                    ?>

                </tbody>

            </table>
        </div>
    </div>
</main>