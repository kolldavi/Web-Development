<?php

  session_start();
  if(array_key_exists("info",$_POST)){
    //echo $_POST['info'];
echo $_SESSION['id'];
    include ("connection.php");
    $query =  "UPDATE users  SET diary = '".mysqli_real_escape_string($link,$_POST['info'])."' WHERE id = ".
    mysqli_real_escape_string($link, $_SESSION['id'] )." LIMIT 1";

    //echo $query;
    mysqli_query($link,$query);
  }

 ?>
