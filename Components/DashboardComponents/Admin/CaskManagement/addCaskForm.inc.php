




<div id="account-content">
<div class="container rounded mt-5 mb-0">
    <div class="row">

        <div class="col-md-12 border">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Add a Cask</h4>
                </div>
            <form action="../Components/DashboardComponents/Admin/CaskManagement/addCask.inc.php" method="post">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Cask Name</label><input type="text" class="form-control" name="caskName" placeholder="" value=""></div>
                    <div class="col-md-6"><label class="labels">Description</label><input type="text" class="form-control" name="CaskDescription"  placeholder="" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Percentage Available</label><input type="number" class="form-control" name="PercentageAvailable" placeholder="" value=""></div>
                    <div class="col-md-12"><label class="labels">WholeCaskPrice</label><input type="number" class="form-control" name="WholeCaskPrice" placeholder="" value=""></div>
                    <div class="col-md-12"><label class="labels">OLA</label><input type="number" class="form-control" name="OLA" placeholder="" value=""></div>
                    <div class="col-md-12"><label class="labels">RLA</label><input type="number" class="form-control" name="RLA" placeholder="" value=""></div>
                    <div class="col-md-12"><label class="labels">Alcohol Percentage</label><input type="number" class="form-control" name="PercentageAlcohol" placeholder="" value=""></div>
                    <div class="col-md-6"><label class="labels">Cask Type</label><input type="text" class="form-control" name="CaskType" placeholder="" value=""></div>
                    <div class="col-md-6"><label class="labels">Wood Type</label><input type="text" class="form-control" name="WoodType" placeholder="" value=""></div>
                    <div class="col-md-6"><label class="labels">Image</label><input type="file" class="form-control" name="CaskImage" placeholder="" value=""></div>
                    <div class="col-md-6"><label class="labels">Distillery Name</label><input type="text" class="form-control" name="DistilleryName" placeholder="" value=""></div>
                </div>
                <div class="mt-5 text-center">
                <input class="btn btn-primary profile-button" type="Submit" name="Submit" id="Submit" value="Submit">
                </div>
            </form>
            </div>
        </div>
        
    </div>
</div>
</div>