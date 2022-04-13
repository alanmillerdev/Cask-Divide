<?php
require '../Database/dbConnect.inc.php';

$dbConnection = Connect();

$CaskID = $_GET['CaskID'];
$sql = "SELECT CaskID, CaskName, CaskDescription, PercentageAvailable, WholeCaskPrice, OLA, RLA, PercentageAlcohol, CaskType, WoodType, DistilleryName, CaskImage FROM cask WHERE CaskID = $CaskID";
$query = mysqli_query($dbConnection, $sql);
while ($row = mysqli_fetch_array($query)) {
    
?>

<div id="account-content">
<div class="container rounded mt-5 mb-0">
    <div class="row">
        <div class="col-md-4 border">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://i.imgflip.com/3f2lx0.jpg"><span class="font-weight-bold text-white">
                <?php echo $row['CaskName'];?></span><span class="text-white-50"><?php echo $row['CaskDescription'];?></span><span> </span></div>
        </div>
        <div class="col-md-8 border">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Edit Cask Details</h4>
                </div>
            <form action="../Components/DashboardComponents/Admin/CaskManagement/updateCask.inc.php" method="post">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Cask Name</label><input type="text" class="form-control" name="CaskName" placeholder="" value="<?php echo $row['CaskName'];?>"></div>
                    <div class="col-md-6"><label class="labels">Description</label><input type="text" class="form-control" name="CaskDescription"  placeholder="" value="<?php echo $row['CaskDescription'];?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Percentage Available</label><input type="number" class="form-control" name="PercentageAvailable" placeholder="" value="<?php echo $row['PercentageAvailable'];?>"></div>
                    <div class="col-md-12"><label class="labels">WholeCaskPrice</label><input type="number" class="form-control" name="WholeCaskPrice" placeholder="" value="<?php echo $row['WholeCaskPrice'];?>"></div>
                    <div class="col-md-12"><label class="labels">OLA</label><input type="number" class="form-control" name="OLA" placeholder="" value="<?php echo $row['OLA'];?>"></div>
                    <div class="col-md-12"><label class="labels">RLA</label><input type="number" class="form-control" name="RLA" placeholder="" value="<?php echo $row['RLA'];?>"></div>
                    <div class="col-md-12"><label class="labels">Alcohol Percentage</label><input type="number" class="form-control" name="PercentageAlcohol" placeholder="" value="<?php echo $row['PercentageAlcohol'];?>"></div>
                    <div class="col-md-6"><label class="labels">Cask Type</label><input type="text" class="form-control" name="CaskType" placeholder="" value="<?php echo $row['CaskType'];?>"></div>
                    <div class="col-md-6"><label class="labels">Wood Type</label><input type="text" class="form-control" name="WoodType" placeholder="" value="<?php echo $row['WoodType'];?>"></div>
                    <div class="col-md-6"><label class="labels">Distillery Name</label><input type="text" class="form-control" name="DistilleryName" placeholder="" value="<?php echo $row['DistilleryName'];?>"></div>
                    <div class="col-md-6"><label class="labels">Image</label><input type="file" class="form-control" name="CaskImage" placeholder="" value="<?php echo $row['CaskImage'];?>"></div>
                </div>
                <div class="mt-5 text-center">
                <input type="hidden" name="CaskID" value='<?php echo $row['CaskID'];?>'>
                <input class="btn btn-primary profile-button" type="submit" name="update" id="update" value="Update">
                
                <a href="../Components/DashboardComponents/Admin/CaskManagement/deleteCask.inc.php?CaskID=<?php echo $row['CaskID'];?>">
                <button type="button" class="btn btn-outline-danger">                       
                    Delete Cask
                </button>
                </a>
                </div>
            </form>
            <?php
            }
            ?>
            </div>
        </div>
        
    </div>
</div>
</div>
</div>
</div>