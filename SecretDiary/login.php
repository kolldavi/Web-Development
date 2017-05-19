<?php

    session_start();
    $error = "";

    //log user out
    if (array_key_exists("logout", $_GET)) {
        session_unset();
      //session_destroy();
      header("Location: login.php");


      //check if cookie or session are not null
    } elseif ((array_key_exists("id", $_SESSION) and $_SESSION['id']) or (array_key_exists("id", $_COOKIE) and $_COOKIE['id'])) {
        //rediect to loggedInPage if  have cookie and session
                    header("Location: loggedInPage.php");
    }

    if (array_key_exists('submit', $_POST)) {
        //connect to database
            include("connection.php");
            //check if email is null and valid
            if (!$_POST["email"] || filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
                $error .= "Email not valid <br />";
            }

        if (!$_POST["password"]) {
            $error .= "A password is required <br />";
        }

        if ($error!="") {
            $error ="<p>There were error(s) in your form: </p>".$error;
        } else {
            if ($_POST['signUp'] == '1') {
                $query = "SELECT id FROM users WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($link, $query);
                // echo $query."<br />";
              if (mysqli_num_rows($result) > 0) {
                  $error = "That email is taken!";
              } else {
                  $query =  "INSERT INTO users (email, password) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";


                  if (!mysqli_query($link, $query)) {
                      $error = "<p>
                  Could not sign in Please try again at a later time.
                  </p>";
                  } else {
                      $query = "UPDATE users SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";

                //  echo $query;
                  $x  = mysqli_insert_id($link);
                      $_SESSION['id'] = $x;

                      mysqli_query($link, $query);
                  //mysql_insert_id();




                  if ($_POST['stayLoggedIn'] == '1') {
                      setcookie('id', $x, time() + 60 * 60 *24 * 365);
                  }



                      header("Location: loggedInPage.php");
                  }
              }
            } else {

           //Login button selected
           //print_r($_POST);
           $query  = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";

                $result = mysqli_query($link, $query);

                $row = mysqli_fetch_array($result);
          //  print_r($row);
           if (isset($row)) {
               $hashedpass  = md5(md5($row['id']).$_POST['password']);

               if ($hashedpass == $row['password']) {
                   $_SESSION['id'] = $row['id'];

              // echo $_SESSION['id'];

             if ($_POST['stayLoggedIn'] == '1') {
                 setcookie('id', $row['id'], time() + 60 * 60 *24 * 365);
             }

                   header("Location: loggedInPage.php");
               } else {
                   $error  = "That password is incorrect!";
               }
           } else {
               $error  = "That email/password combination could not be found!";
           }
            }
        }
    }




?>


<?php include("header.php") ?>
    <div class="container col-md-4">

      <h1>Secret Diary</h1>
      <p>
        <strong>Store your thoughts</strong>
      </p>

      <div id="error">
         <?php if ($error !="") {
    echo  '<div class="alert alert-danger" role="alert">'.$error.'</div>';
}
           ?>
      </div>
        <form method = "post" id ="signUpForm">
          <p>
            Enter email and password to sign up
          </p>
          <fieldset class="form-group">
            <input name="email" class="form-control" type="text" placeholder="Email address">
          </fieldset>

          <fieldset class="form-group">
            <input name="password" class="form-control"  type="password" placeholder="Password">
          </fieldset>


          <div class="form-check">
            <label class="form-check-label">
              <input name ="stayLoggedIn" class="form-check-input" type ="checkbox" />
                   Stay Logged In
            </label>
          </div>
            <input type="hidden"  name ="signUp" value="1" />


          <fieldset class="form-group">
            <input type="submit" class ="btn btn-success" name ="submit" value = "Sign Up!">
          </fieldset>


            <button type="button"  class="btn btn-link toggleForm">Log In</button>

        </form>

        <form method = "post" id ="logInForm">
          <p>
            Enter email and password to log in
          </p>
          <fieldset class="form-group">
              <input name="email" class="form-control" type="text" placeholder="Email address">
          </fieldset>

          <fieldset class="form-group">
              <input name="password" class="form-control" type="password" placeholder="Password">
          </fieldset>


              <div class="form-check">
                <label class="form-check-label">
                  <input name ="stayLoggedIn" class="form-check-input" type ="checkbox" />
                       Stay Logged In
                </label>
              </div>

              <input type="hidden" name ="signUp" value="0" />


          <fieldset class="form-group">
              <input type="submit" class="btn btn-success" name ="submit" value = "Log In!">
          </fieldset>

            <button type="button" class="btn btn-link toggleForm">Sign Up</button>
        </form>
      </div>


<?php include("footer.php") ?>
