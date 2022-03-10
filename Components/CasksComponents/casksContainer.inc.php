<section id="icon-boxes" class="py-5">
    <div class="container mb-4">
        <div class="row">

            <?php
            if(!defined('SecurityCheck')) {
                exit(header("Location: ../../index.php"));
              }

            include('casksViewBuilder.inc.php');

            ?>

        </div>
    </div>
    </div>
</section>