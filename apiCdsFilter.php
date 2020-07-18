<?php
  // Includo il database per avere la variabile $database contenuta nel file database.php
  include __DIR__ . '/database.php';

  // Recupero il valore passato in GET con la chaimata AJAX nella funzione callFiltredCds() - file JavasScript;
  $author = $_GET["author"];

  // Creo l'array vuoto
  $filtred_database = [];

  // Con Foreach cilco su database e se trovo corrispondenze con il valore passato in $_GET lo metto nell'array
  foreach ($database as $singoloCd) {
    if ($author == $singoloCd['author']) {
      $filtred_database[] = $singoloCd;
    }
  }

  // Converto l'array creato in JSON e lo metto nella variabile
  $filtred_cds = json_encode($filtred_database);

  header('Content-Type: application/json');

  echo $filtred_cds;
 ?>
