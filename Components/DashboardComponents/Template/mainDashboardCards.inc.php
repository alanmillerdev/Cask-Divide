<?php
if (!defined('SecurityCheck')) {
    exit(header("Location: ../../../index.php"));
}

$sql = "SELECT SUM(PurchaseAmount) FROM investment";
if ($result = mysqli_query($dbConnection, $sql)) {
    $totalRevenue = mysqli_fetch_row($result);
    $totalRevenue = implode($totalRevenue);
}
// Users
$sql = "SELECT * FROM user";
if ($result = mysqli_query($dbConnection, $sql)) {
    $usercount = mysqli_num_rows($result);
}

$sql = "SELECT RegistrationDate FROM user WHERE DATE(RegistrationDate) >= CurDate() - INTERVAL 7 DAY";
if ($result = mysqli_query($dbConnection, $sql)) {
    $usersInLastWeekCount = mysqli_num_rows($result);
}

$sql = "SELECT RegistrationDate FROM user WHERE DATE(RegistrationDate) >= CurDate() - INTERVAL 30.4167 DAY"; // Exact number for days in a month
if ($result = mysqli_query($dbConnection, $sql)) {
    $usersInLastMonth = mysqli_num_rows($result);
}

$sql = "SELECT u.UserID, u.FirstName, u.LastName, i.UserID, MAX(i.PurchaseAmount) FROM user as u INNER JOIN investment as i ON u.UserID = i.UserID";
if ($result = mysqli_query($dbConnection, $sql)) {
    $row = mysqli_fetch_row($result);
    $userHighestInvestment = $row[4];
    $name = $row[1] . ' ' . $row[2];
}

// Casks
$sql = "SELECT * FROM cask";
if ($result = mysqli_query($dbConnection, $sql)) {
    $caskcount = mysqli_num_rows($result);
}

$sql = "SELECT MAX(PercentageAvailable), CaskName FROM cask";
if ($result = mysqli_query($dbConnection, $sql)) {
    $row = mysqli_fetch_row($result);
    $maxPercentageAvailable = $row[0];
    $caskName = $row[1];
}

$sql = "SELECT MIN(CaskName), MIN(PercentageAvailable) FROM cask WHERE PercentageAvailable > 0";
if ($result = mysqli_query($dbConnection, $sql)) {
    $row = mysqli_fetch_row($result);
    $minPercentageAvailable = $row[1];
    $lowCaskName = $row[0];
}

$sql = "SELECT MAX(WholeCaskPrice), CaskName FROM cask";
if ($result = mysqli_query($dbConnection, $sql)) {
    $row = mysqli_fetch_row($result);
    $caskExpensive = $row[0];
    $caskName = $row[1];
}

// Distilleries
$sql = "SELECT * FROM distillery";
if ($result = mysqli_query($dbConnection, $sql)) {
    $distillerycount = mysqli_num_rows($result);
}

$sql = "SELECT description FROM distillery WHERE description LIKE '%Speyside%'";
if ($result = mysqli_query($dbConnection, $sql)) {
    $speysideCount = mysqli_num_rows($result);
}

$sql = "SELECT description FROM distillery WHERE description LIKE '%Highland%'";
if ($result = mysqli_query($dbConnection, $sql)) {
    $highlandCount = mysqli_num_rows($result);
}

$sql = "SELECT description FROM distillery WHERE description LIKE '%Lowland%'";
if ($result = mysqli_query($dbConnection, $sql)) {
    $lowlandCount = mysqli_num_rows($result);
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
<!-- Cards -->
<main class="py-6 bg-surface">
    <!-- User Cards -->
    <div class="container-fluid">
        <div class="row g-6 mb-6">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Users</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                    echo $usercount;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                    <i class="bi bi-people"></i>
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
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">New Users in the Last Week</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                    echo $usersInLastWeekCount;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                    <i class="bi bi-person-plus"></i>
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
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">New Users in the Last Month</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                    echo $usersInLastMonth;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                    <i class="bi bi-person-lines-fill"></i>
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
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Highest User Investment</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                    echo "£".$userHighestInvestment;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                    <i class="bi bi-minecart-loaded"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cask Cards -->
    <div class="container-fluid">
        <div class="row g-6 mb-6">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Casks</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                    echo $caskcount;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                  <i><img class="caskimg" src="css/icons/cask-icon.svg"></i>
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
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Highest Percentage Available</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                    echo $maxPercentageAvailable. "%";
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-arrow-up-right"></i>
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
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Lowest Percentage Available</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                   echo  $minPercentageAvailable ."%";
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-arrow-down-left"></i>
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
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Most Expensive Cask</span>
                                <span class="h3 font-bold mb-0">
                                <?php
                                   echo "£". $caskExpensive;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-cash-stack"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Distilleries -->
    <div class="container-fluid">
        <div class="row g-6 mb-6">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Distilleries</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                    echo $distillerycount;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                  <i><img class="caskimg" src="css/icons/cask-icon.svg"></i>
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
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Number of Distilleries in Speyside</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                    echo $speysideCount;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                    <i class="bi bi-arrow-up-right"></i>
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
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Number of Distilleries in the Lowlands</span>
                                <span class="h3 font-bold mb-0">
                                    <?php
                                   echo $lowlandCount;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                    <i class="bi bi-arrow-down-left"></i>
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
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Number of Distilleries in the Highlands</span>
                                <span class="h3 font-bold mb-0">
                                <?php
                                   echo $highlandCount;
                                    ?>
                                </span>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                    <i class="bi bi-cash-stack"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</main>