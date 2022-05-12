<?php
if (!defined('SecurityCheck')) {
    exit(header("Location: ../../index.php"));
}

if (isset($_GET["msg"])) {

    switch ($_GET["msg"]) {
        case "percentage":
            echo ('
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> The Percentage you requested is no longer available, please try again.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            break;
        case "oos":
            echo ('
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> You need to be logged in to make a purchase.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
            break;
        case "err":
            echo ('
                    <div class="alert alert-error alert-dismissible fade show" role="alert">
                    <strong>Uh Oh!</strong> We don\'t know what happened, please try again. If the problem persists please contact us. 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    ');
            break;
    }
};
