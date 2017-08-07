var main = function() {



  $('.toggle').on('click', function() {
    $('.image-url').toggle();
  });


  $('#top-text').on('input propertychange paste', function() {
    $('.top-caption').text($(this).val());
  });
  $('#bottom-text').on('input propertychange paste', function() {
    $('.bottom-caption').text($(this).val());
  });


  $('#image-url').on('input propertychange paste', function() {
    $('.meme').children().attr("src", $(this).val());
  });

};

//change color of font
function update(jscolor) {

  document.getElementById('top').style.color = '#' + jscolor
  document.getElementById('bottom').style.color = '#' + jscolor
}

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
        $('.meme').children().attr("src", e.target.result);
      };
    })(f);

    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
  }
}
document.getElementById('image-file').addEventListener('change', handleFileSelect, false);

$(document).ready(main);
