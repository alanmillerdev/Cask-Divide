<?php
if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
  header("Location: ../../../index.php");
}

define('SecurityCheck', TRUE);
