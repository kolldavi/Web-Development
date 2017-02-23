<?php

$link = mysqli_connect("localhost", "username", "password", "dbname");

    if (mysqli_connect_error()) {
      die ("There was an error connecting to the database");
    }

    function formatDate($date)
    {
        return date('g:i: a', strtotime($date));
    }



 ?>
