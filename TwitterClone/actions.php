<?php

  include('functions.php');


  if ($_GET['action'] == 'loginSignUp') {
      $error = "";
  //  print_r($_POST);
  $email = $_POST['email'];
      $password = $_POST['password'];


      if (!$email) {
          $error =  "An email address is required";
      } elseif (!$password) {
          $error =  "An password is required";
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $error = "Invalid email format";
      }

      if ($error != "") {
          echo $error;
          exit();
      }


//SIGN UP BUTTON CLICKED
    if ($_POST['loginActive'] == '0') {
        $query =    "SELECT * FROM users where email = '".mysqli_real_escape_string($link, $email)."'";

        $result  = mysqli_query($link, $query);



        if (mysqli_num_rows($result) > 0) {
            $error  = "That email has already been taken. Select login or enter new email.";
        } else {
            $query =    "INSERT INTO users (email,password) values ('".mysqli_real_escape_string($link, $email)."', '".mysqli_real_escape_string($link, $password)."')";

            if (mysqli_query($link, $query)) {
                $_SESSION['id'] = mysqli_insert_id($link);

                $query = "UPDATE users SET password = '".md5(md5($_SESSION['id']).$password)."' WHERE id = ".$_SESSION['id']." LIMIT 1";
                mysqli_query($link, $query);
                echo 1;
            } else {
                echo "Couldn't create user. Please try later" ;
            }
        }
//Log in BUTTON CLICKED
    } else {
        $query =    "SELECT * FROM users where email = '".mysqli_real_escape_string($link, $email)."'";
        $result  = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row['password'] == md5(md5($row['id']).$password)) {
            echo 1;
            $_SESSION['id'] = $row['id'];
        } else {
            $error = "Could not find email/password combination please try again";
        }
    }

      if ($error != "") {
          echo $error;
          exit();
      }
  }

  if ($_GET['action'] == 'toggleFollow') {
      //  print_r($_POST);

    $query =    "SELECT * FROM isFollowing where follower = '".mysqli_real_escape_string($link, $_SESSION['id'])."' AND isfollowing = '".mysqli_real_escape_string($link, $_POST['userid'])."' LIMIT 1";

  //  echo $query;
    $result  = mysqli_query($link, $query);


      if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $deleteQuery = "DELETE FROM isFollowing where id = '".mysqli_real_escape_string($link, $row['id'])."' LIMIT 1";
              //  echo   $deleteQuery;
                echo 1;
          mysqli_query($link, $deleteQuery);
      } else {
          $row = mysqli_fetch_assoc($result);
          $insertQuery = "INSERT INTO isFollowing (follower, isfollowing) VALUES('".mysqli_real_escape_string($link, $_SESSION['id'])."','".mysqli_real_escape_string($link, $_POST['userid'])."')";
          echo 2;
          mysqli_query($link, $insertQuery);
      }
  }

  if ($_GET['action'] == 'postTweet') {
      //    print_r($_POST);

    if (!$_POST['tweetContent']) {
        echo "Your tweet is empty!";
    } elseif (strlen($_POST['tweetContent']) > 140) {
        echo "Your tweet is to long!";
    } else {
        $date = date('Y-m-d H:i:s');
        $insertQuery1 = "INSERT INTO tweets (tweet, userid, datetime) VALUES ('".mysqli_real_escape_string($link, $_POST['tweetContent'])."', '".mysqli_real_escape_string($link, $_SESSION['id'])."', NOW())";


        mysqli_query($link, $insertQuery1);
        echo 1;
    }
  }
