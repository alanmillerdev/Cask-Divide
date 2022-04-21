<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../../index.php"));
  }

$sql = "SELECT * FROM user";
if ($result=mysqli_query($dbConnection,$sql)) {
    $usercount=mysqli_num_rows($result);   
}

$sql = "SELECT * FROM cask";
if ($result=mysqli_query($dbConnection,$sql)) {
    $caskcount=mysqli_num_rows($result);   
}

$sql = "SELECT SUM(PurchaseAmount) FROM investment";
if ($result=mysqli_query($dbConnection,$sql)) {
    $totalRevenue=mysqli_fetch_row($result);   
    $totalRevenue=implode($totalRevenue);
}

$sql = "SELECT * FROM investment";
if ($result=mysqli_query($dbConnection,$sql)) {
    $investmentcount=mysqli_num_rows($result);   
}
?>

<!-- Main -->
        <main class="py-6 bg-surface">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="row g-6 mb-6">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Revenue</span>
                                        <span class="h3 font-bold mb-0">
                                            £<?php 
                                            echo $totalRevenue 
                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                            <i class="bi bi-credit-card"></i>
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
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Users</span>
                                        <span class="h3 font-bold mb-0">
                                            <?php
                                                echo $usercount;
                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
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
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">New Investments</span>
                                        <span class="h3 font-bold mb-0">
                                        <?php 
                                            echo $investmentcount 
                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                            <i class="bi bi-clock-history"></i>
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
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Casks</span>
                                            <span class="h3 font-bold mb-0">
                                            <?php 
                                            echo $caskcount;
                                            ?>
                                            </span>
                                        
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                            <i class="bi bi-minecart-loaded"></i>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>