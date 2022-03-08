<?php
switch ($_GET["msg"]) {
    case "dupe":
        echo ('
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> an account with this email already exists.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        ');
        break;
    case "mismatch":
        echo ('
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> entered passwords do not match!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        ');
        break;
}
