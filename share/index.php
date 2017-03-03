<?php
//start Session
session_start();
  include('config.php');

  include('classes/bootstrap.php');
  include('classes/controller.php');
  include('classes/model.php');
  include('classes/messages.php');

  include('controllers/home.php');
  include('controllers/shares.php');
  include('controllers/users.php');

  include('models/home.php');
  include('models/share.php');
  include('models/user.php');

  $bootstrap = new Bootstrap($_GET);

  $controller = $bootstrap->createController();

  if($controller)
  {
    $controller->executeAction();
  }
 ?>
