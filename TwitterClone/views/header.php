<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

        <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">



  </head>
  <body>

    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="http://176.32.230.9/davidkollerpracticewebsite.com/TwitterClone/">Twitter</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="?page=timeine">Your TimeLine </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=yourtweets">Your Tweets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=publicprofile">Publice Profile</a>
          </li>
        </ul>
        <div class="form-inline pull-xs-right">

          <?php
            if($_SESSION['id'])
            {
          ?>
          <a class="btn btn-outline-success" href="?function=logout" >Logout</a>

          <?php
        }else{
          ?>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
          Login/Signup
        </button>
        <?php } ?>



      </div>
    </nav>
