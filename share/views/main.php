<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Share Board</title>



   <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/application.css">
   <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/docs.css">
   <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/toolkit.css">

    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/styles.css">
  </head>
  <body class="with-top-navbar">


    <nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Shareboard</a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo ROOT_URL; ?>">Home</a></li>
              <li><a href="<?php echo ROOT_URL; ?>shares">Shares</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <?php if(isset($_SESSION['isLoggedIn'])): ?>
                <li><a href="<?php echo ROOT_URL; ?>users/profile">Welcome <?php echo $_SESSION['userData']['name']; ?></a></li>
                <li><a href="<?php echo ROOT_URL; ?>users/logout">Logout</a></li>
              <?php else : ?>
              <li><a href="<?php echo ROOT_URL; ?>users/login">Login</a></li>
              <li><a href="<?php echo ROOT_URL; ?>users/register">Register</a></li>
            <?php endif; ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>


      <div class="container ">

            <div>
                 <?php Messages::display(); ?>

                  <?php  require($view); ?>
            </div>

      </div>



  </body>
</html>
