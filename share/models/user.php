<?php

  class UserModel extends Model{

    public function register()
    {
  		// Sanitize POST
  		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  		$password = md5($post['password']);

  		if($post['submit'])
      {
  			if($post['name'] == '' || $post['email'] == '' || $post['password'] == '')
        {
  				Messages::setMesssage('Please Fill In All Fields', 'error');
  				return;
  			}

  			// Insert into MySQL
  			$this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
  			$this->bind(':name', $post['name']);
  			$this->bind(':email', $post['email']);
  			$this->bind(':password', $password);
  			$this->execute();
  			// Verify
  			if($this->lastInsertId())
        {
          $this->loginReg($post);
  			}
        	return;
  		}

  	}

          public function loginReg($post)
          {
              $password = md5($post['password']);

              $this->query('SELECT * FROM users WHERE email = :email AND password = :password');
              $this->bind(':email', $post['email']);
              $this->bind(':password', $password);

              $row = $this->single();

              if($row){
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['userData'] = array(
                    "id"	=> $row['id'],
                    "name"	=> $row['name'],
                    "email"	=> $row['email']);
              header('Location: '.ROOT_URL.'shares');
          }
        }



    public function login(){
      // Sanitize POST
      $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $password = md5($post['password']);

      if($post['submit']){
        // Compare Login
        $this->query('SELECT * FROM users WHERE email = :email AND password = :password');
        $this->bind(':email', $post['email']);
        $this->bind(':password', $password);

        $row = $this->single();

        if($row){
          $_SESSION['isLoggedIn'] = true;
          $_SESSION['userData'] = array(
            "id"	=> $row['id'],
            "name"	=> $row['name'],
            "email"	=> $row['email']
          );
          header('Location: '.ROOT_URL.'shares');
        } else {

         Messages::setMesssage('Incorrect Login', 'error');
        }
      }
      return;
    }

    public function profile()
    {
      $this->query('SELECT * FROM shares WHERE userid = :userid ORDER BY postdate DESC');
      $this->bind(':userid', $_SESSION['userData']['id']);
      $rows = $this->resultSet();

      return $rows;
    }

    public function publicprofile()
    {
      $this->query('SELECT * FROM shares WHERE userid = :userid ORDER BY postdate DESC');
      $this->bind(':userid', $_GET['userid']);
      $rows = $this->resultSet();

      return $rows;
    }


  }




 ?>
