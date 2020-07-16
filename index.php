<?php include __DIR__ . '/database.php' ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina PHP con chiamata AJAX">
    <title>PHP AJAX</title>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Handlebars -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.js"></script>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <!-- My CSS -->
    <link rel="stylesheet" href="dist/app.css">
  </head>
  <body>
    <header>
      <div class="container">
        <img src="img/logo.png" alt="logo">
      </div>
    </header>

    <main>
      <div class="cds-container container">

        <?php foreach ($database as $key_index => $value) { ?>
          <div class="cd">
              <img src="<?php echo $value['poster'] ?>" alt="{{author}}">
              <h3><?php echo $value['title'] ?></h3>
              <span class="author"><?php echo $value['author'] ?></span>
              <span class="year"><?php echo $value['year'] ?></span>
          </div>
        <?php } ?>

      </div>
    </main>

    <!-- handlebars tamplate -->
    <!-- <script id="cd-template" type="text/x-handlebars-template">
      <div class="cd">
          <img src="{{poster}}" alt="{{author}}">
          <h3>{{title}}</h3>
          <span class="author">{{author}}</span>
          <span class="year">{{year}}</span>
      </div>
    </script> -->

    <!-- Script JS -->
    <script src="dist/app.js"></script>
  </body>
</html>
