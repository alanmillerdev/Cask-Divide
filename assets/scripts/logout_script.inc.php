<?php
//Destroy session, redirect user to logged out index
function LogOut() {
  session_start();
  session_destroy();
  header("Location: ");
}

LogOut();
?>
