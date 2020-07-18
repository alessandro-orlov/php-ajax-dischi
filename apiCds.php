<?php
  // Includo il file databes che è un array multidimensionale
  include __DIR__ . '/database.php';

  // Converto l'array database in JSON
  $cds = json_encode($database);

  // communico al server che il tipo di contenuto è json
  header('Content-Type: application/json');

  // satmpo a schermo l'array di oggetti/JSON
  echo $cds;
 ?>
