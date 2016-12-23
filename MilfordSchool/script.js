//Dropdown list
var dropDown =  function(){
  $('img').click(function(){
    $('.dropdown-menu').toggle();
  });
};
//Make sure form is filled out
var submit = function(){
  $('form').submit(function(){

    var email = $('#email').val();
    var password = $('#password').val();

    if(email === ""){
      $('.email-error').text("Please enter your email.");
    }else{
           $('.email-error').text("");
    }
       if(password === ""){
      $('.password-error').text("Please enter your password.");
    }else{
           $('.password-error').text("");
    }
     return false;
  });

};
var main = function(){
  submit();
  dropDown();
};

$(document).ready(main);
