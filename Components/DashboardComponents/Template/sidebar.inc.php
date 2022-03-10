<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../images/logo-1.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Cask Divide</span>
                    <span class="profession"><?php echo htmlspecialchars($_SESSION["UserType"]); ?></span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

     <?php include '../Components/DashboardComponents/DashboardType/dashboardType.inc.php';?>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../Components/LogoutComponents/logoutUser.inc.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>

    </nav>