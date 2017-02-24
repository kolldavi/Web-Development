<?php
include ('db.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chat Bot</title>
  </head>
  <link rel="stylesheet" href="style.css" media="all"/>

  <body >
    <div id = "container">
      <div id = "chatBox">
        <div id="chat">

        </div>
      </div>
      <form method="post" action="index.php">
        <input class= "input" type="text" name="name" placeholder="Enter name:" />
        <textarea class= "input" name ="msg" placeholder="Enter Message"></textarea>
        <input class = "input" type="submit" name="submit" value="send it" onclick="ajaxMethod();"/>
      </form>

      <?php

        if(isset($_POST['submit']))
        {
          $name = $_POST['name'];
          $msg = $_POST['msg'];

          $query = "INSERT INTO chat (name,msg) VALUES('$name','$msg')";

          $run = $link->query($query);

          if($run)
          {
              echo "<embed loop = 'false' src = 'blop.wav' hidden = 'true' autoplay = 'true' />";
          }

        }

       ?>
    </div>

    <script type="text/javascript">

      function ajaxMethod()
      {
        var request = new XMLHttpRequest();

        request.onreadystatechange = function()
        {
          if(request.readyState == 4 && request.status == 200)
          {
            document.getElementById('chat').innerHTML = request.responseText;
          }
        }
        request.open('GET','chat.php',true);
        request.send();
      }
      setInterval(function(){ajaxMethod();},1000);
    </script>
  </body>
</html>
