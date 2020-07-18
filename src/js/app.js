// packages installed with NPM
var $ = require( "jquery" );
var Handlebars = require("handlebars");

// Begin JavaScript
$(document).ready(function() {

// ======================================================
// ======== SELECT CHANGE ===============================
$('.author-select-php').change( function() {
  // Reset "cds-container ajax-call"
  $('.cds-container.ajax-call').html('');

  // prendo il valore del autore disco dalla option select
  var author = $('.author-select-php').val();

  if (author === 'default') {
    callApiCds();
  } else {
    // Stamp il cd con il valore author selezionato
    callFiltredCds(author);
  }

});

callApiCds();

// ====================================================================== //
// ========================== FUNCTIONS ================================= //
// ====================================================================== //

// ========================================================
// =============== callDatabase() =========================
function callApiCds() {
  $.ajax(
    {
      url: 'http://localhost:8888/php-ajax-dischi/apiCds.php',
      method: 'GET',
      success: function(cds) {

        // Stampo i dischi dall'API
        printCds(cds)

      },
      error: function(request, state, error) {
        alert('errore' + error);
      }
    }
  );
}

// =========================================================
// ================= printCds() ============================
function printCds(arrayObjects) {

  // Handlebars cds tamplate
  var source = $('#cd-template').html();
  var template = Handlebars.compile(source);

  // Ciclo sul array
  for (var i = 0; i < arrayObjects.length; i++) {
    var singleCd = arrayObjects[i];

    var context = singleCd;

    var html = template(context);

    $('.cds-container.ajax-call').append(html);
  }
}

// =========================================================
// =============== CallFiltredCds() ========================
// ---> argomento: autoreDisco è il valore del option select
function callFiltredCds(autoreDisco) {

  // Nella chiamata Ajax passo in data il valore selezionato
  $.ajax(
    {
      url: 'http://localhost:8888/php-ajax-dischi/apiCdsFilter.php',
      method: 'GET',
      data: {
        author: autoreDisco,
      },
      success: function(filtredCds) {

        // Stampo i dischi dall'API apiCdsFilter.php
        printCds(filtredCds)

      },
      error: function(request, state, error) {
        alert('errore' + error);
      }
    }
  );
} // End function callFiltredCds

}); // End document ready
