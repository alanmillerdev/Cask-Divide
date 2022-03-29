<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../../index.php"));
  }

if ($_SESSION['UserType'] == 'Admin') {
    echo '<div class="nav_list"> 
                <a href="#" class="nav_link active">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Dashboard</span> </a>
                    
                <a href="./dashboard/pages/edit-users.php" class="nav_link"> 
                    <i class="bx bx-user nav_icon"></i> 
                    <span class="nav_name">Users</span> </a>
                    
                <a href="#" class="nav_link"> 
                    <img class="caskimg" src="./dashboard/css/icons/cask-icon.svg"> 
                    <span class="nav_name">Casks</span> </a>
                    
                <a href="#" class="nav_link"> 
                    <i class="bx bx-bell icon"></i>
                    <span class="nav_name">Notifications</span> </a>
                    
                <a href="#" class="nav_link"> 
                    <i class="bx bx-bar-chart-alt-2 icon"></i>
                    <span class="nav_name">Revenue</span> </a>                    
            </div>';
} else {
    echo '   <div class="nav_list"> 
                <a href="#" class="nav_link active">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Dashboard</span> </a>
                    
                <a href="#" class="nav_link"> 
                    <i class="bx bx-user nav_icon"></i> 
                    <span class="nav_name">My Details</span> </a>
                    
                <a href="#" class="nav_link"> 
                    <img class="caskimg" src="./dashboard/css/icons/cask-icon.svg"> 
                    <span class="nav_name">My Investments</span> </a>
                    
                <a href="#" class="nav_link"> 
                    <i class="bx bx-bell icon"></i>
                    <span class="nav_name">Notifications</span> </a>
                    
                <a href="#" class="nav_link"> 
                    <i class="bx bx-bar-chart-alt-2 icon"></i>
                    <span class="nav_name">Past Investments</span> </a>
                    
                <a href="#" class="nav_link"> 
                    <i class="bx bx-cog"></i>
                    <span class="nav_name">Account Settings</span> </a>
                    
            </div>';
}
