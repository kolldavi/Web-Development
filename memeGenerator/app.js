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

  /*    var reader = new FileReader();
       $('#image-file').change (function() {
        $('.meme').children().attr("src",$(this).val().replace(/^.*\\/, ""));
      });*/



};
 function handleFileSelect(evt) {
var files = evt.target.files; // FileList object

// Loop through the FileList and render image files as thumbnails.
for (var i = 0, f; f = files[i]; i++) {

  // Only process image files.
  if (!f.type.match('image.*')) {
    continue;
  }

  var reader = new FileReader();

  // Closure to capture the file information.
  reader.onload = (function(theFile) {
    return function(e) {
      // Render thumbnail.
  //    var span = document.createElement('span');
  //    span.innerHTML = ['<img class="thumb" src="', e.target.result,
  //                      '" title="', escape(theFile.name), '"/>'].join('');
  //    document.getElementById('list').insertBefore(span, null);
    $('.meme').children().attr("src",e.target.result);
    };
  })(f);

  // Read in the image file as a data URL.
  reader.readAsDataURL(f);
}
}
  document.getElementById('image-file').addEventListener('change', handleFileSelect, false);

$(document).ready(main);
