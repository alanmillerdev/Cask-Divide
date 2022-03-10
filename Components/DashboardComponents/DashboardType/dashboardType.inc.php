<?php

if ($_SESSION['UserType'] == 'Admin') {
    echo '           <ul class="menu-links">
                    <li class="nav-link">
                        <a href="../index.php">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>
            
                    <li class="nav-link">
                        <a href="../casks.php">
                            <img class="caskimg" src="css/icons/cask-icon.svg">
                            <span class="text nav-text">Browse Casks</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-bell icon"></i>
                            <span class="text nav-text">Admin Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-bar-chart-alt-2 icon"></i>
                            <span class="text nav-text">Revenue</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-user icon"></i>
                            <span class="text nav-text">Users</span>
                        </a>
                    </li>

                </ul>';
} else {
    echo '           <ul class="menu-links">
                        <li class="nav-link">
                        <a href="../index.php">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../casks.php">
                            <img class="caskimg" src="css/icons/cask-icon.svg">
                            <span class="text nav-text">Browse Casks</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-bell icon"></i>
                            <span class="text nav-text">My Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-bar-chart-alt-2 icon"></i>
                            <span class="text nav-text">My Investments</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-line-chart icon"></i>
                            <span class="text nav-text">Past Investments</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-user icon"></i>
                            <span class="text nav-text">My Details</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-cog icon"></i>
                            <span class="text nav-text">Account Settings</span>
                        </a>
                    </li>

                </ul>';
}
