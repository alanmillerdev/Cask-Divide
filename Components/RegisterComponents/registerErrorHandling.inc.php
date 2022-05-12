<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../index.php"));
  }
  
if (isset($_GET["msg"])) {

    switch ($_GET["msg"]) {
        case "dupe":
            echo ('
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> An account with this email already exists.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            break;
        case "email":
            echo ('
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> You have entered an invalid email address.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    ');
            break;
        case "domain":
            echo ('
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Invalid Email Domain!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
            break;
        case "mismatch":
            echo ('
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Entered passwords do not match!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            break;
    }
};
