<?php
if (!defined('SecurityCheck')) {
    exit(header("Location: ../../index.php"));
}

if (isset($_GET["msg"])) {

    switch ($_GET["msg"]) {
        case "image":
            ?> <script>
            // Fail message
            $("#success").html("<div class='alert alert-danger'>");
            $("#success > .alert-danger").html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                .append("</button>");
            $('#success > .alert-danger').append($("<strong>").text("Sorry, it seems that image is too large "));
            $('#success > .alert-danger').append($("<br><strong>").text("Please try again."));
            $('#success > .alert-danger').append('</div>');

         
                $('#success').click(function(){
                    $("#success").remove();
                });
                
            </script>
            
            <?php 
            break;
    }
};
