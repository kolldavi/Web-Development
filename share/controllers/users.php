<?php

  class Users extends Controller
  {
    protected function register()
    {
      $viewModel = new UserModel();
      $this->ReturnView($viewModel->register(),true);
    }

    protected function login()
    {
      $viewModel = new UserModel();
      $this->ReturnView($viewModel->login(),true);
    }

    protected function logout()
    {
      unset($_SESSION['isLoggedIn']);
      unset($_SESSION['userData']);
      session_destroy();
      header("Location:".ROOT_URL);
    }

    protected function profile()
    {
      $viewModel = new UserModel();
      $this->ReturnView($viewModel->profile(),true);
    }

    protected function publicprofile()
    {
      $viewModel = new UserModel();
      $this->ReturnView($viewModel->publicProfile(),true);
    }

}
 ?>
