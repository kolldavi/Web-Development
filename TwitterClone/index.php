<?php

      include("functions.php");

      include("views/header.php");

      if ($_GET['page'] =='timeline') {
          include("views/timeline.php");
      } elseif ($_GET['page'] =='yourtweets') {
          include("views/yourtweets.php");
      } elseif ($_GET['page'] =='search') {
          include("views/search.php");
      } elseif ($_GET['page'] =='publicprofile') {
            include("views/publicprofile.php");
        } else {
          include("views/home.php");
      }



    include("views/footer.php");
