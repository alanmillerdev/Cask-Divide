<?php
switch ($_GET["msg"]) {
    case "success":
        echo ('
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You have registered successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        ');
        break;
    case "err":
        echo ('
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Entered password is incorrect.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        ');
        break;
}
