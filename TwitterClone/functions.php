<?php

  session_start();

  $link = mysqli_connect("localhost","cl45-twitter-cip","3f73wEM.!","cl45-twitter-cip");

  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if($_GET['function'] == 'logout')
    {
      session_unset();
    }

?>
