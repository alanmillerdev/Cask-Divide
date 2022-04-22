<?php
if (!defined('SecurityCheck')) {
    exit(header("Location: ../../../index.php"));
}

$sql = "SELECT * FROM cask";
if ($result = mysqli_query($dbConnection, $sql)) {
    $caskcount = mysqli_num_rows($result);
}

?>

<main class="py-6 bg-surface">
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
                                <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                    <i class="bi bi-minecart-loaded"></i>
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
    </div>

    <div class="card shadow border-0 mt-20">
        <div class="card-header">
            <h5 class="mb-0">Casks <a href="add-cask.php" class="btn btn-sm btn-neutral"><i class='bx bx-plus-circle'></i></a></h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-nowrap">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Cask ID</th>
                        <th scope="col">Cask Name</th>
                        <th scope="col">Percentage Available</th>
                        <th scope="col">Whole Cask Price</th>
                        <th scope="col">Percentage Alcohol</th>
                        <th scope="col">Cask Type</th>
                        <th scope="col">Wood Type</th>
                        <th scope="col">Distillery Name</th>
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
                    $sql = 'SELECT * FROM cask LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
                    $result = mysqli_query($dbConnection, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        echo ' 
                                <tr>
                                    <td>
                                        <a class="text-heading font-semibold" href="#">
                                            ' . $row['CaskID'] . '
                                        </a>
                                    </td>
                                    <td>
                                        ' . $row['CaskName'] . '
                                    </td>
                                    <td>
                                        <a class="text-heading font-semibold" href="#">
                                            ' . $row['PercentageAvailable'] . '
                                        </a>
                                    </td>
                                    <td>
                                        ' . $row['WholeCaskPrice'] . '
                                    </td>
                                    <td>
                                        ' . $row['PercentageAlcohol'] . '
                                    </td>
                                    <td>
                                        ' . $row['CaskType'] . '
                                    </td>
                                    <td>
                                        ' . $row['WoodType'] . '
                                    </td>
                                    <td>
                                        ' . $row['DistilleryName'] . '
                                    </td>
                                    <td class="text-end">
                                        <a href="edit-cask.php?CaskID=' . $row['CaskID'] . '" class="btn btn-sm btn-neutral">View</a>
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
                                    
                                    <li class="page-item"><a class="page-link" href="show-casks.php?page=' . $page . '">' . $page . '</a></li>
                                    
                                ';
                    };

                    ?>
                </ul>
            </nav>
        </div>
    </div>
</main>