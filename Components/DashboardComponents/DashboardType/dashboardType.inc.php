<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../../index.php"));
  }

if ($_SESSION['UserType'] == 'Admin') {
    echo '<div class="nav_list"> 
                <a href="dashboard.php" class="nav_link">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Dashboard</span> </a>
                    
                <a href="show-users.php" class="nav_link"> 
                    <i class="bx bx-user nav_icon"></i> 
                    <span class="nav_name">Users</span> </a>
                    
                <a href="show-casks.php" class="nav_link"> 
                    <img class="caskimg" src="css/icons/cask-icon.svg"> 
                    <span class="nav_name">Casks</span> </a>
                    
                <a href="notifications.php" class="nav_link"> 
                    <i class="bx bx-bell nav_icon"></i>
                    <span class="nav_name">Notifications</span> </a>
                    
                <a href="show-investment.php" class="nav_link"> 
                    <i class="bx bx-bar-chart-alt-2 nav_icon"></i>
                    <span class="nav_name">Revenue</span> </a>                    
            </div>';
} 