var template = function(text) {
  return '<p><input type="checkbox"><i class="glyphicon glyphicon-star"></i><span>' + text + '</span><i class="glyphicon glyphicon-remove"></i></p>';
};
 var add = function(item) {
          var html = template(item);
          $(html).appendTo('.list');
        };

var main = function() {
  $('form').submit(function() {
   var text = $('#todo').val();
   var html = template(text);
  	$('.list').append(html);
   $('#todo').val('');
    return false;
  });

  $('.list').on("click",'.glyphicon-star',function() {
        $(this).toggleClass('active');
    });

    $('.list').on("click",'.glyphicon-remove',function() {
        $(this).parent().remove();
    });
      if (annyang) {
            var commands = {
              'add *item': add,
            };
            annyang.addCommands(commands);
            annyang.start();
          }
};

$(document).ready(main);
