$(document).ready(function() {

$.ajax(
  {
    url: 'http://localhost:8888/php-ajax-dischi/server.php',
    method: 'GET',
    success: function(cds) {
      console.log(cds);

      // Handlebars setup
      var source = $('#cd-template').html();
      var template = Handlebars.compile(source);

      for (var i = 0; i < cds.length; i++) {
        var singleCd = cds[i];

        var context = {
          author: singleCd.author,
          poster: singleCd.poster,
          title: singleCd.title,
          year: singleCd.year,
         };
        var html = template(context);

        $('.cds-container.tamplate').append(html);
      }
    },
    error: function(request, state, error) {
      alert('errore' + error);
    }
  }
)


}); // End document ready
