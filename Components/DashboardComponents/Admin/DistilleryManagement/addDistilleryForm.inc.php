<?php
if (!defined('SecurityCheck')) {
  exit(header("Location: ../../../../index.php"));
}
?>

<div id="account-content">
  <div class="container rounded mt-5 mb-0">
    <div class="row">
      <div class="col-md-12 border">
        <div class="p-3 py-5">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Add a Distillery</h4>
          </div>
          <form action="../Components/DashboardComponents/Admin/DistilleryManagement/addDistillery.inc.php" id="addDist" method="post">
            <div class="row mt-3">
              <div class="col-md-12"><label class="labels">Distillery Name</label><input type="text" class="form-control" name="NameOfDistillery" placeholder="" value=""></div>
              <div class="col-md-12"><label class="labels">Distillery Description</label><textarea type="text" rows="7" class="form-control" form="addDist" id="Description" name="Description" value=""></textarea></div>
              <div class="mt-5 text-center">
                <input class="btn btn-primary profile-button" type="Submit" name="Submit" id="Submit" value="Submit">
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>