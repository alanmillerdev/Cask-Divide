<?php
if (!defined('SecurityCheck')) {
    exit(header("Location: ../../../index.php"));
}

// Investments
$sql = "SELECT * FROM investment";
if ($result = mysqli_query($dbConnection, $sql)) {
    $investmentcount = mysqli_num_rows($result);
}

$sql = "SELECT PurchaseDate FROM investment WHERE DATE(PurchaseDate) >= CurDate() - INTERVAL 7 DAY";
if ($result = mysqli_query($dbConnection, $sql)) {
    $investmentsInLastWeek = mysqli_num_rows($result);
}
$sql = "SELECT SUM(PurchaseAmount), PurchaseDate FROM investment WHERE DATE(PurchaseDate) >= CurDate() - INTERVAL 7 DAY";
if ($result = mysqli_query($dbConnection, $sql)) {
    $row = mysqli_fetch_row($result);
    $maxPurchaseAmount = $row[0];
}

$sql = "SELECT SUM(PurchaseAmount) FROM investment";
if ($result = mysqli_query($dbConnection, $sql)) {
    $totalRevenue = mysqli_fetch_row($result);
    $totalRevenue = implode($totalRevenue);
}
?>

<main class="py-6 bg-surface">
     <!-- Investments -->
     <div class="container-fluid">
        <div class="row g-6 mb-6">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Investments</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                    echo $investmentcount;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                <i class="bi bi-wallet-fill"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Investments in the Last Week</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                    echo $investmentsInLastWeek;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                    <i class="bi bi-calendar-week-fill"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Revenue in the Last Week</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                   echo "£".$maxPurchaseAmount;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                    <i class="bi bi-cash"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Revenue to Date</span>
                                <span class="h3 font-bold mb-0">
                                <?php
                                   echo "£".$totalRevenue;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                    <i class="bi bi-cash-stack"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow border-0 mt-20">
        <div class="card-header">
            <h5 class="mb-0">Investments </h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-nowrap">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Investment ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Cask ID</th>
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
                    $sql = 'SELECT i.InvestmentID, i.UserID, u.FirstName, u.LastName, i.CaskID, c.CaskName, i.PercentPurchased, i.PurchaseAmount, i.TransactionID, i.PurchaseDate 
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
                                        <a class="text-heading font-semibold" href="#">
                                            ' . $row['InvestmentID'] . '
                                        </a>
                                    </td>
                                    <td>
                                        ' . $row['UserID'] . '
                                    </td>
                                    <td>
                                        <a class="text-heading font-semibold" href="#">
                                            ' . $row['FirstName'] . ' ' . $row['LastName'] .'
                                        </a>
                                    </td>
                                    <td>
                                        ' . $row['CaskID'] . '
                                    </td>
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
        <div class="card-footer border-0 py-5">
            <nav>
                <ul class="pagination">
                    <?php
                    for ($page = 1; $page <= $number_of_pages; $page++) {
                        //echo '<a href="show-casks.php?page=' . $page . '">' . $page . '</a> ';
                        echo '
                                    
                                    <li class="page-item"><a class="page-link" href="show-investment.php?page=' . $page . '">' . $page . '</a></li>
                                    
                                ';
                    };

                    ?>
                </ul>
            </nav>
        </div>
    </div>
</main>