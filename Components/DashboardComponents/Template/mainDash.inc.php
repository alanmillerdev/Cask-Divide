<?php
if(!defined('SecurityCheck')) {
    exit(header("Location: ../../../index.php"));
  }
?>




<div class="dashboardContent">
    <h1><?php echo htmlspecialchars($_SESSION["UserType"]); ?> Dashboard</h1>


</div>