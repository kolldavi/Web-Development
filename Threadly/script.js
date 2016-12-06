var main = function() {
  $('form').submit(function() {
    var comment = $('#comment').val();
    if(comment !== "") {
      var html = $('<li>').text(comment);
          $(html).prependTo($('.comments'));
          $('.post-error').text("");
    }else{
      $('.post-error').text("This Field Can't Be Empty");
    }
    return false;
  });
};

$(document).ready(main);
