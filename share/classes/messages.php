<?php

  class Messages{
    public static function setMesssage($text,$type)
    {
      if($type == "error")
      {
        $_SESSION['errorMessage'] = $text;
      }
      else
      {
        $_SESSION['successMessage'] = $text;
      }
    }

    public static function display()
    {
      if(isset($_SESSION['errorMessage'])){
        echo '<div class="alert alert-danger">'.$_SESSION['errorMessage'].'</div>';
        unset($_SESSION['errorMessage']);
      }

      if(isset($_SESSION['successMessage'])){
        echo '<div class="alert alert-success">'.$_SESSION['successMessage'].'</div>';
        unset($_SESSION['successMessage']);
      }

    }
  }

 ?>
