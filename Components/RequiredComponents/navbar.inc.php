<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../index.php"));
  }

session_start();

?>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0">

        <!--  Show this only on mobile to medium screens  -->
        <a class="navbar-brand d-lg-none" href="#">Cask Divide</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!--  Use flexbox utility classes to change how the child elements are justified  -->
        <div class="collapse navbar-collapse justify-content-between" id="navbarToggle">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link border-right active p-4 m-0" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white p-4 m-0" href="casks.php">Casks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white p-4 m-0" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white p-4 m-0" href="contact.php">Contact</a>
                </li>
            </ul>

            <!--   Show this only lg screens and up   -->
            <a class="navbar-brand d-none d-lg-block mr-5" href="index.php">
                <img src="./images/logo-1.png" height="65" alt="CD Logo" loading="lazy" />
            </a>

            <?php
            if ($_SESSION['UserType'] == 'Admin') {
                echo '<ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="border-left nav-link text-white p-4 m-0" href="./dashboard/dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="border-left nav-link text-white p-4 m-0" href="Components/LogoutComponents/logoutUser.inc.php">Log Out     </a>
                        </li>
                    </ul>';
            } 
            elseif ($_SESSION['UserType'] == 'User'){
                echo
                '<ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="border-left nav-link text-white p-4 m-0" href="account-details.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="border-left nav-link text-white p-4 m-0" href="Components/LogoutComponents/logoutUser.inc.php">Log Out</a>
                        </li>
                    </ul>';
            }
             else {
                echo
                '<ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="border-left nav-link text-white p-4 m-0" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="border-left nav-link text-white p-4 m-0" href="register.php">Register</a>
                        </li>
                    </ul>';
            }
            ?>
            </ul>
        </div>
    </nav>

    <!-- Navbar -->