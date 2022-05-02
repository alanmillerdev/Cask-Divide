<?php 
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../index.php"));
  }

include 'bootstrapJS.inc.php' 
?>

<footer>
    <div class="d-flex justify-content-around align-items-center border-light border-top">
        <div class="d-none d-md-block">
            <a href="index.php"><img class="footer_logo" src="./images/logo-1.png" alt="Scotch Whiskey Casks Logo"></a>
        </div>
        <div>
            <ul class="d-flex pl-0 pt-3 ">
                <li class="border-right px-3 ml-0"><a href="contact.php" class="nav-link footer-links px-2 text-light">
                        <h5>Contact</h5>
                    </a></li>
                <li class="border-right px-3"><a href="about.php" class="nav-link footer-links px-2 text-light">
                        <h5>FAQ</h5>
                    </a></li>
                <li class="border-right px-3"><a href="about.php" class="nav-link footer-links px-2 text-light">
                        <h5>About</h5>
                    </a></li>
                <li class="px-3"><a href="casks.php" class="nav-link footer-links px-2 text-light">
                        <h5>Our Casks</h5>
                    </a></li>
            </ul>
            <img class="px-3 pb-2" src="images/payment.png" alt="">
        </div>
        <div class="d-none d-md-block">
        <ul class="d-flex p-0 ">
            <li class="px-3"><a href="#"><i class="fab fa-instagram fa-3x"></i></a></li>
            <li class="px-3"><a href="#"><i class="fab fa-facebook-square fa-3x"></i></a></li>
            <li class="px-3"><a href="#"><i class="fab fa-google fa-3x"></i></a></li>
        </ul>
        </div>
    </div>


    <div class="d-flex justify-content-around align-items-center border-light border-top">
        <ul class="d-flex m-0">
            <li class="nav-item border-right p-3">
                <div href="#" class="nav-link footer-links">
                    <h6 class="text-muted">&copy; 2022- CASK DIVIDE</h6>
            </div>
            </li>
            <li class="nav-item border-right p-3">
                <a href="#" class="nav-link footer-links">
                    <h6 class="text-muted footer-links">Terms of Use</h6>
                </a>
            </li>
            <li class="nav-item border-right p-3">
                <a href="#" class="nav-link footer-links">
                    <h6 class="text-muted footer-links">Privacy Policy</h6>
                </a>
            </li>
            <li class="nav-item border-right p-3">
                <a href="#" class="nav-link footer-links">
                    <h6 class="text-muted footer-links">Support</h6>
                </a>
            </li>
            <li class="nav-item p-3">
                <a href="#" class="nav-link footer-links">
                    <h6 class="text-muted footer-links">Cookie Policy</h6>
                </a>
            </li>
        </ul>
    </div>

</footer>
</body>

</html>