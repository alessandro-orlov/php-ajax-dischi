<?php
  include __DIR__ . '/database.php';
  $cds = json_encode($database);
  header('Content-Type: application/json');
  echo $cds;
 ?>
