<?php

  class Shares extends Controller
  {
    protected function index()
    {
      $viewModel = new ShareModel();
      $this->ReturnView($viewModel->index(),true);
    }

    protected function add()
    {

      if(!isset($_SESSION['isLoggedIn'])){
        header('Location:'.ROOT_URL.'users/login');
      }
      $viewModel = new ShareModel();
      $this->ReturnView($viewModel->add(),true);
    }


}
 ?>
