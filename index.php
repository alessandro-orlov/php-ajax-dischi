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
        <!-- =========================================================== -->
        <!-- ================== Stamo i dichi con PHP ================== -->
        <h2>Stampo i dischi con PHP</h2>
        <div class="cds-container">
          <?php foreach ($database as $singleCd) { ?>
            <div class="cd">
                <img src="<?php echo $singleCd['poster'] ?>" alt="{{author}}">
                <h3><?php echo $singleCd['title'] ?></h3>
                <span class="author"><?php echo $singleCd['author'] ?></span>
                <span class="year"><?php echo $singleCd['year'] ?></span>
            </div>
          <?php } ?>
        </div>

        <!-- =========================================================== -->
        <!-- ===== Stamo i dischi con la chiamata API e handlebars ===== -->
        <h2>Stampo i dischi con la chiamata AJAX</h2>
        
        <!-- PHP SELECT -->
        <div class="select-artist">
          <span>Seleziona artista (php foreach):</span>
          <select class="author-select-php">
            <option value="default" selected>Tutti</option>
            <!-- Begin PHP foreach -->
            <?php foreach ($database as $singleCd) { ?>
              <option value="<?php echo $singleCd['author'] ?>" ><?php echo $singleCd['author'] ?></option>
            <?php } ?>
            <!-- End PHP foreach -->
          </select>
        </div>

        <div class="cds-container ajax-call">
          <!-- tamplate goes here -->
        </div>
      </div>

    </main>

    <!-- ====================== END CONTENT ON PAGE ======================== -->
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
    <!-- <script id="author-option" type="text/x-handlebars-template">
      <option value="{{author}}">{{author}}</option>
    </script>   -->

    <!-- Script JS -->
    <script src="dist/app.js"></script>
  </body>
</html>
