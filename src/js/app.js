// packages installed with NPM
var $ = require( "jquery" );
var Handlebars = require("handlebars");

// Begin JavaScript
$(document).ready(function() {

// ======================================================
// ======== SELECT CHANGE ===============================
$('.author-select').change( function() {
  var author = $('.author-select').val();
  console.log(author);

});


callDatabase();


// ================= FUNCTIONS =================================
// =============================================================

// =============================================================
// =============== callDatabase() ==============================
function callDatabase() {
  $.ajax(
    {
      url: 'http://localhost:8888/php-ajax-dischi/server.php',
      method: 'GET',
      success: function(cds) {

        printCds(cds)

      },
      error: function(request, state, error) {
        alert('errore' + error);
      }
    }
  );
}

// =============================================================
// ================= printCds() ================================
function printCds(arrayObjects) {
  // Handlebars cds tamplate
  var source = $('#cd-template').html();
  var template = Handlebars.compile(source);

  // Handlebars authors options in select tag
  var source2 = $('#author-option').html();
  var template2 = Handlebars.compile(source2);

  // Ciclo sul array
  for (var i = 0; i < arrayObjects.length; i++) {
    var singleCd = arrayObjects[i];

    var context = singleCd;

    var html = template(context);
    var html2 = template2(context);

    $('.cds-container.tamplate').append(html);
    $('.author-select').append(html2);
  }
}

}); // End document ready
