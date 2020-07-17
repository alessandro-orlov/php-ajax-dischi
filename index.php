<?php include __DIR__ . '/database.php' ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina PHP con chiamata AJAX">
    <title>PHP AJAX</title>
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
      <div class="container">
        <!-- Stamo a schermo con php -->
        <h2>Stampo i dischi con PHP</h2>
        <div class="cds-container">
          <?php foreach ($database as $key_index => $value) { ?>
            <div class="cd">
                <img src="<?php echo $value['poster'] ?>" alt="{{author}}">
                <h3><?php echo $value['title'] ?></h3>
                <span class="author"><?php echo $value['author'] ?></span>
                <span class="year"><?php echo $value['year'] ?></span>
            </div>
          <?php } ?>
        </div>

        <h2>Stampo i dischi con la chiamata AJAX</h2>
        <!-- Select author -->
        <div class="select-artist">
          <span>Seleziona artista (handlebars):</span>
          <select class="author-select">
            <option value="default" selected>Tutti</option>
            <!-- authors options -->
          </select>
        </div>

        <!-- PHP SELECT -->
        <div class="select-artist">
          <span>Seleziona artista (php foreach):</span>
          <select class="author-select-php">
            <option value="default" selected>Tutti</option>

            <?php foreach ($database as $value) { ?>
              <option value="<?php echo $value['author'] ?>" ><?php echo $value['author'] ?></option>
            <?php } ?>

          </select>
        </div>

        <div class="cds-container tamplate">
          <!-- tamplate goes here -->
        </div>
      </div>

    </main>

    <!-- ========================= END PAGE =========================== -->
    <!-- handlebars tamplate -->
    <script id="cd-template" type="text/x-handlebars-template">
      <div class="cd" data-autore="{{author}}">
          <img src="{{poster}}" alt="{{author}}">
          <h3>{{title}}</h3>
          <span class="author">{{author}}</span>
          <span class="year">{{year}}</span>
      </div>
    </script>

    <!-- handlebars tamplate -->
    <script id="author-option" type="text/x-handlebars-template">
      <option value="{{author}}">{{author}}</option>
    </script>

    <!-- Script JS -->
    <script src="dist/app.js"></script>
  </body>
</html>
