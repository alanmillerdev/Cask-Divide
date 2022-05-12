<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../../index.php"));
  }
?>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <h1 id="header-title"><?php echo htmlspecialchars($_SESSION["UserType"]); ?> Dashboard</h1>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
            <div class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name"><?php echo htmlspecialchars($_SESSION["FullName"]); ?></span> </div>
            
            <?php include '../Components/DashboardComponents/DashboardType/dashboardType.inc.php';?>
            
            </div> 
            <div>
            <a href="../index.php" class="nav_link"> <i class='bx bx-home nav_icon'></i> <span class="nav_name">Go Home</span> </a>
            <a href="../Components/LogoutComponents/logoutUser.inc.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
            </div>
        </nav>
    </div>
    

    
         