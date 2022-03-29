<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../../index.php"));
  }
?>




                <div class="card shadow border-0 mt-20">
                    <div class="card-header">
                        <h5 class="mb-0">Casks</h5>
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
                        $this_page_first_result = ($page-1)*$results_per_page;

                        // retrieve selected results from database and display them on page
                        $sql='SELECT * FROM cask LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
                        $result = mysqli_query($dbConnection, $sql);

                        while($row = mysqli_fetch_array($result)) {
                        echo' 
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
                                        <a href="#" class="btn btn-sm btn-neutral">View</a>
                                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-trash"></i>
                                        </button>
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
                        for ($page=1;$page<=$number_of_pages;$page++) {
                        //echo '<a href="edit-users.php?page=' . $page . '">' . $page . '</a> ';
                        echo '
                                    
                                    <li class="page-item"><a class="page-link" href="edit-casks.php?page=' . $page . '">' . $page . '</a></li>
                                    
                                ';
                        }
                        ;

                    ?>
                            </ul>
                        </nav>                    </div>
                </div>