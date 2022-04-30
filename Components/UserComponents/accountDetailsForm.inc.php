<!--QUERY TO FIND USER ID-->
<?php
$dbConnection = Connect();
$UserID = $_SESSION['UserID'];
$query = "SELECT * FROM user WHERE UserID='$_SESSION[UserID]'";
$result = mysqli_query($dbConnection, $query)
    or die("couldn't run query");
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>

    <div id="account-content">
        <div class="container rounded mt-5 mb-0">
            <div class="row">
                <div class="col-md-12 border">
                    <div class="p-2 py-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">User Details</h4>
                        </div>
                        <form action="Components/UserComponents/updateUser.inc.php" method="post">
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Email</label><input type="text" name="Email" class="form-control" placeholder="enter email" value="<?php echo $row['Email']; ?>"></div>
                                <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="PhoneNumber" class="form-control" placeholder="enter phone number" value="<?php echo $row['PhoneNumber']; ?>"></div>
                            </div>
                            <div class="mt-5 text-center">
                                <input type="hidden" name="UserID" value='<?php echo $row['UserID']; ?>'>
                                <input type="submit" name="submit" class="btn btn-primary profile-button" value="Update information">
                            </div></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="account-content">
        <div class="container rounded mt-3 mb-0">
            <div class="row">
                <div class="col-md-12 border">
                    <div class="p-2 py-3">

                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Change Password</h4>
                        </div>
                        <form action="Components/UserComponents/updateUser.inc.php" method="post" class"">
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Current Password</label><input type="text" name="CurrentPassword" class="form-control" placeholder="Current Password" value=""></div>
                                <div class="col-md-6"><label class="labels">New Password</label><input type="text" name="NewPassword" class="form-control" placeholder="New Password" value=""></div>
                                <div class="col-md-6"><label class="labels">Repeat New Password</label><input type="text" name="RepeatNewPassword" class="form-control" placeholder="Repeat Password" value=""></div>
                            </div>
                            <div class="mt-5 text-center">
                                <input type="hidden" name="UserID" value='<?php echo $row['UserID']; ?>'>
                                <input type="submit" name="submit" class="btn btn-primary profile-button" value="Update Password">
                                <p class="lead mt-2">To delete your account, please submit a request on our <a href="contact.php" class="btn btn-outline-light">Contact Page</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>