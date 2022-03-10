<?php
if(!defined('SecurityCheck')) {
  exit(header("Location: ../../index.php"));
}

//Destroy session, redirect user to logged out index
function LogOut()
{
  session_start();
  session_destroy();
  header("Location: ../../index.php?msg=logoutSuccess");
}

LogOut();
