<?php

  include('functions.php');


  if($_GET['action'] == 'loginSignUp'){

    $error = "";
  //  print_r($_POST);
  $email = $_POST['email'];
  $password = $_POST['password'];


    if(!$email)
    {
      $error =  "An email address is required";
    }
    else if(!$password)
    {
      $error =  "An password is required";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      $error = "Invalid email format";
    }

    if($error != "")
    {
      echo $error;
      exit();
    }


//SIGN UP BUTTON CLICKED
    if($_POST['loginActive'] == '0')
    {

    $query =    "SELECT * FROM users where email = '".mysqli_real_escape_string($link, $email)."'";

    $result  = mysqli_query($link, $query);



    if(mysqli_num_rows($result) > 0 )
    {
      $error  = "That email has already been taken. Select login or enter new email.";
    }
    else
    {
        $query =    "INSERT INTO users (email,password) values ('".mysqli_real_escape_string($link, $email)."', '".mysqli_real_escape_string($link, $password)."')";

            if(mysqli_query($link,$query))
            {
              $_SESSION['id'] = mysqli_insert_id($link);

               $query = "UPDATE users SET password = '".md5(md5($_SESSION['id']).$password)."' WHERE id = ".$_SESSION['id']." LIMIT 1";
               mysqli_query($link,$query);
               echo 1;

            }
            else
            {
              echo "Couldn't create user. Please try later" ;

            }

    }
//Log in BUTTON CLICKED
  }
  else
  {
        $query =    "SELECT * FROM users where email = '".mysqli_real_escape_string($link, $email)."'";
        $result  = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);

        if($row['password'] == md5(md5($row['id']).$password))
        {
          echo 1;
          $_SESSION['id'] = $row['id'];

        }
        else
        {
          $error = "Could not find email/password combination please try again";
        }
  }

    if($error != "")
    {
      echo $error;
      exit();
    }




  }


?>
