//main function
var main = function() {
  //toggle cart
  	$('.cart').click(function() {
      $('.account .dropdown-menu').hide();
      $('.help .dropdown-menu').hide();
      $('.cart .dropdown-menu').toggle();
  });
  //toggle account
  $('.account').click(function() {
    $('.help .dropdown-menu').hide();
    $('.cart .dropdown-menu').hide();
    $('.account .dropdown-menu').toggle();
});
  //toggle help
   	$('.help').click(function() {
      $('.account .dropdown-menu').hide();
      $('.cart .dropdown-menu').hide();
      $('.help .dropdown-menu').toggle();
  });



                    };

$(document).ready(main);
