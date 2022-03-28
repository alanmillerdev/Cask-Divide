<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../../index.php"));
  }

include 'Database/dbConnect.inc.php';

$dbConnection = Connect();

$userID = $_SESSION['UserID'];

$sql = "SELECT UserID, FirstName, LastName, Email, DOB, PhoneNumber FROM user WHERE UserID = $userID";
$query = mysqli_query($dbConnection, $sql);
while ($row = mysqli_fetch_array($query)) {
    $UserID = $row['UserID'];
    $FirstName = $row['FirstName'];
    $LastName = $row['LastName'];
    $Email = $row['Email'];
    $DOB = $row['DOB'];
    $PhoneNumber = $row['PhoneNumber'];
}

?>


                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">New Users</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Date of Birth</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img alt="..." src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            <?php echo $FirstName . ' ' . $LastName;?>
                                        </a>
                                    </td>
                                    <td>
                                        Feb 15, 2021
                                    </td>
                                    <td>
                                        <a class="text-heading font-semibold" href="#">
                                            <?php echo $PhoneNumber;?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $Email;?>
                                    </td>
                                    <td>
                                            <?php echo $DOB;?>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-neutral">View</a>
                                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                    </div>
                </div>