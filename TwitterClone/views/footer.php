
<footer class="footer">

    <div class="container">

        <p>&copy; David Koller 2017</p>

    </div>

</footer>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


 <!-- Modal -->
 <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="loginModalTitle">Log In</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="alert alert-danger" id="errorLogin">

         </div>
         <form>
          <input type="hidden" id="loginActive" name="loginActive" value="1" />
          <div class="form-group">
            <label for="formGroupExampleInput">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email Adress">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
          </div>
        </form>
       </div>
       <div class="modal-footer">
         <a  href="#"id="toggleLogin">Sign Up</a>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id='loginButton'>Login</button>
       </div>
     </div>
   </div>
 </div>

 <script>

 $('#toggleLogin').click(function()
 {
   if($('#loginActive').val() === '1')
   {
     $('#loginActive').val('0');
     $('#loginModalTitle').html('Sign Up');
     $('#loginButton').html('Sign Up');
     $('#toggleLogin').html('Sign In');
   }else{
     $('#loginActive').val('1');
     $('#loginModalTitle').html('Sign In');
     $('#loginButton').html('Sign In');
     $('#toggleLogin').html('Sign Up');
   }
 });

 $('#loginButton').click(function(){
   $.ajax({
     type: 'POST',
     url:'actions.php?action=loginSignUp',
     data: 'email=' + $('#email').val() + '&password=' + $('#password').val() + '&loginActive=' + $('#loginActive').val(),
     success: function(result){

       if(result == '1')
       {

         window.location.assign('http://176.32.230.9/davidkollerpracticewebsite.com/TwitterClone/');
       }
       else
       {
         $('#errorLogin').html(result).show();
       }
     }
   });


 });

  $('.toggleFollow').click(function(){

    var id = $(this).attr('data-userid');
    $.ajax({
      type: 'POST',
      url:'actions.php?action=toggleFollow',
      data: 'userid=' + id,
      success: function(result){
        if(result =="1")
        {
          $("a[data-userid='"+id+"']").html("Follow");
        }else if(result =="2")
        {
          $("a[data-userid='"+id+"']").html("Unfollow");
        }

      }
    });

  });

  $('#postTweetButton').click(function(){
  //  alert($("#tweetContent").val());

    $.ajax({
      type: 'POST',
      url:'actions.php?action=postTweet',
      data: 'tweetContent=' + $("#tweetContent").val(),
      success: function(result){
        if(result == "1")
        {
          $("#tweetSuccess").show();
          $("#tweetFail").hide();
        }
        else if(result != "")
        {
          $("#tweetFail").html(result).show();
          $("#tweetSuccess").hide();
        }



      }
    });
  });



 </script>
  </body>
</html>
