<!--QUERY TO FIND USER ID-->
    <?php
    $dbConnection = Connect();
    $UserID = $_SESSION['UserID'];
    $query="SELECT * FROM user WHERE UserID='$_SESSION[UserID]'";
    $result = mysqli_query($dbConnection, $query)
    or die ("couldn't run query");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>



<div id="account-content">
<div class="container rounded mt-5 mb-0">
    <div class="row">
        <div class="col-md-4 border">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://i.imgflip.com/3f2lx0.jpg"><span class="font-weight-bold text-white"><?php echo $row['FirstName'];?> <?php echo $row['LastName'];?></span><span class="text-white-50"><?php echo $row['Email'];?></span><span> </span></div>
        </div>
        <div class="col-md-8 border">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">User Details</h4>
                </div>
            <form action="../Components/UserComponents/updateUser.inc.php" method="post">
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" name="Email" class="form-control" placeholder="enter email" value="<?php echo $row['Email'];?>"></div>
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="PhoneNumber" class="form-control" placeholder="enter phone number" value="<?php echo $row['PhoneNumber'];?>"></div>
                    <div class="col-md-6"><label class="labels">Password</label><input type="text" name="Password" class="form-control" placeholder="enter Password" value="<?php echo $row[''];?>"></div>
                    <div class="col-md-6"><label class="labels">Repeat Password</label><input type="text" name="Password" class="form-control" placeholder="Repeat Password" value="<?php echo $row[''];?>"></div>
                </div>
                <div class="mt-5 text-center">
                    <input type="hidden" name="UserID" value='<?php echo $row['UserID'];?>'>
                    <input type="submit" name="submit" class="btn btn-primary profile-button" value="Update information">
                    <p>To Delete your account please submit a request on our <a href="contact.php" class="btn btn-primary">Contact Page</a></p>
                </div>
            </form>
            </div>
        </div>
        
    </div>
</div>
</div>
<?php } ?>