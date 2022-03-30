<div id="account-content">
<div class="container rounded mt-5 mb-0">
    <div class="row">
        <div class="col-md-4 border">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://i.imgflip.com/3f2lx0.jpg"><span class="font-weight-bold text-white"><?php echo $row['FirstName'];?> <?php echo $row['LastName'];?></span><span class="text-white-50"><?php echo $row['Email'];?></span><span> </span></div>
        </div>
        <div class="col-md-8 border">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
            <form action="#" method="post">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="<?php echo $row['FirstName'];?>"></div>
                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="<?php echo $row['LastName'];?>" placeholder="surname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $row['PhoneNumber'];?>"></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="enter email" value="<?php echo $row['Email'];?>"></div>
                    <div class="col-md-12"><label class="labels">Date of Birth</label><input placeholder="Date of Birth" class="form-control" value="<?php echo $row['DOB'];?>" type="text" name="DOB" onfocus="(this.type='date')" onblur="(this.type='text')" onsubmit="(this.type='date')"></div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                    <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="postcode" value=""></div>
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" value="" placeholder="country"></div>
                </div>
                <div class="mt-5 text-center">
                    <input type="submit" name="submit" class="btn btn-primary profile-button" value="Update information">
                </div>
            </form>
            </div>
        </div>
        
    </div>
</div>
</div>
</div>
</div>