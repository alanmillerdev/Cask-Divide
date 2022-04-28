<?php
require '../Database/dbConnect.inc.php';

$dbConnection = Connect();

$UserID = $_GET['UserID'];
$sql = "SELECT UserID, FirstName, LastName, Email, PhoneNumber FROM user WHERE UserID = $UserID";
$query = mysqli_query($dbConnection, $sql);
while ($row = mysqli_fetch_array($query)) {

?>

<div id="account-content">
<div class="container rounded mt-30 mb-0">
    <div class="row">
        <div class="col-md-4 border">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://i.imgflip.com/3f2lx0.jpg"><span class="font-weight-bold text-white"><?php echo $row['FirstName'];?> <?php echo $row['LastName'];?></span><span class="text-white-50"><?php echo $row['Email'];?></span><span class="text-white-50"><?php echo $row['PhoneNumber'];?></span></div>
        </div>
        <div class="col-md-8 border">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Edit User Details</h4>
                </div>
            <form action="../Components/DashboardComponents/Admin/UserManagement/updateUser.inc.php" method="post">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" name="FirstName" placeholder="first name" value="<?php echo $row['FirstName'];?>"></div>
                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" name="LastName" value="<?php echo $row['LastName'];?>" placeholder="surname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="PhoneNumber" placeholder="enter phone number" value="<?php echo $row['PhoneNumber'];?>"></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" name="Email" class="form-control" placeholder="enter email" value="<?php echo $row['Email'];?>"></div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                    <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="postcode" value=""></div>
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" value="" placeholder="country"></div>
                </div>
                <div class="mt-5 text-center">
                <input type="hidden" name="UserID" value='<?php echo $row['UserID'];?>'>
                <input class="btn btn-primary profile-button" type="submit" name="update" id="update" value="Update">
                
                <a href="../Components/DashboardComponents/Admin/UserManagement/deleteUser.inc.php?UserID=<?php echo $row['UserID'];?>">
                <button type="button" class="btn btn-outline-danger">                       
                    Delete Account
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