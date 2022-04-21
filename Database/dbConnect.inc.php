<?php
if(!defined('SecurityCheck')) {
  exit(header("Location: ../index.php"));
}

function Connect()
{

  $servername = "localhost";
  $username = "root";
  $password = "QvbtMG]g@qAPD]S4";
  $database = "caskdivide";

  $connection = new mysqli($servername, $username, $password, $database) or die("Connect failed: %s\n" . $connection->error);

  return $connection;
}
