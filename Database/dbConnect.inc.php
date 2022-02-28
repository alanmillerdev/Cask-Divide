<?php

function Connect()
{

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "caskdivide";

  $connection = new mysqli($servername, $username, $password, $database) or die("Connect failed: %s\n" . $connection->error);

  return $connection;
}
