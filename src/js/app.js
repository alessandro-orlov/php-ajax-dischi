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

// ======================================================
// ============== AJAX CALL =============================
$.ajax(
  {
    url: 'http://localhost:8888/php-ajax-dischi/server.php',
    method: 'GET',
    success: function(cds) {
      console.log(cds);

      // Handlebars cds tamplate
      var source = $('#cd-template').html();
      var template = Handlebars.compile(source);

      // Handlebars authors options in select tag
      var source2 = $('#author-option').html();
      var template2 = Handlebars.compile(source2);

      for (var i = 0; i < cds.length; i++) {
        var singleCd = cds[i];
        console.log(singleCd)

        var context = singleCd;

        var html = template(context);
        var html2 = template2(context);

        $('.cds-container.tamplate').append(html);
        $('.author-select').append(html2);
      }
    },
    error: function(request, state, error) {
      alert('errore' + error);
    }
  }
);

}); // End document ready
