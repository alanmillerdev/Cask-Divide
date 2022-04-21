<?php
require '../Database/dbConnect.inc.php';

$dbConnection = Connect();

$DistilleryName = $_GET['DistilleryName'];
$sql = "SELECT DistilleryName, Description FROM distillery WHERE DistilleryName = '$DistilleryName'";
$query = mysqli_query($dbConnection, $sql);
while ($row = mysqli_fetch_array($query)) {

?>

    <div id="account-content">
        <div class="container rounded mt-5 mb-0">
            <div class="row">
                <div class="col-md-4 border">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://i.imgflip.com/3f2lx0.jpg"><span class="font-weight-bold text-white">
                            <?php echo $row['DistilleryName']; ?></span><span class="text-white-50"><?php echo $row['Description']; ?></span><span> </span></div>
                </div>
                <div class="col-md-8 border">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Edit Distillery Details</h4>
                        </div>
                        <form action="../Components/DashboardComponents/Admin/DistilleryManagement/updateDistillery.inc.php" id="editDist" method="post">
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Distillery Name</label><input type="text" class="form-control" name="NameOfDistillery" placeholder="" value="<?php echo $row['DistilleryName']; ?>"></div>
                                <div class="col-md-12"><label class="labels">Distillery Description</label><textarea type="text" class="form-control" form="editDist" id="Description" name="Description"><?php echo $row['Description']; ?></textarea></div>
                            </div>
                            <div class="mt-5 text-center">
                                <input type="hidden" name="DistilleryName" value='<?php echo $row['DistilleryName']; ?>'>
                                <input class="btn btn-primary profile-button" type="submit" name="update" id="update" value="Update">

                                <a href="../Components/DashboardComponents/Admin/DistilleryManagement/deleteDistillery.inc.php?DistilleryName=<?php echo $row['DistilleryName']; ?>">
                                    <button type="button" class="btn btn-outline-danger">
                                        Delete Distillery
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php
}
    ?>

    </div>
    </div>
    </div>