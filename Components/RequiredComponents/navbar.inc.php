<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0">

        <!--  Show this only on mobile to medium screens  -->
        <a class="navbar-brand d-lg-none" href="#">Navbar</a>

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

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white p-4 m-0" href="./dashboard/dashboard.php">Dashboard</a>
                </li>

                <?php

                session_start();

                if (isset($_SESSION['UserID'])) {
                    echo '<a href="Components/LogoutComponents/logoutUser.inc.php"><button type="button" class="border-left nav-link text-white p-4 m-0">Log Out</button></a>';
                } else {
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