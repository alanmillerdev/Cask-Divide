<?php
if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
  header("Location: ../../index.php");
}

define('SecurityCheck', TRUE);

//Destroy session, redirect user to logged out index
function LogOut()
{
  session_start();
  session_destroy();
  header("Location: ../../index.php?msg=logoutSuccess");
}

LogOut();
