var main = function() {
  $('#top-text').keyup (function() {
    $('.top-caption').text($(this).val());
       });
   $('#bottom-text').keyup (function() {
    $('.bottom-caption').text($(this).val());
       });

       $('#image-url').keyup (function() {
        $('.meme').children().attr("src",$(this).val());
      });
/*
       $('#image-file').change (function() {
        $('.meme').children().attr("src",$(this).val().replace(/^.*\\/, ""));
          });
*/


};

$(document).ready(main);
