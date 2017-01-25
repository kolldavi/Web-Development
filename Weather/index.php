<?php

  $weather = "";
  $error = "";

      if ($_GET['location']) {
        $city = str_replace(' ', '', $_GET['location']);
    $urlContent = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$city .",us&appid=27457f335b178c4d939f7a0987a0cdea&units=imperial");

    if($urlContent === FALSE){
      $error .= "That city could not be found!";
    }else{
    $contentArray = json_decode($urlContent,true);

    $w  = $contentArray['weather'][0]['description'];
    $weather = "The weather in ".$contentArray['name']." is currently ".$w."<br />";
    $weather .= "The temperature is currently ".round($contentArray['main']['temp'])."&degF";
    //echo $currentWeather;

      }
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <style type="text/css">
    body {
    background-image: url("background.jpg");
    background-position: center top;
    background-size: 100% auto;
}
  .container{
    text-align: center;
    margin-top: 200px;
  }
  #location{
    margin-top: 30px;
  }
  #weather{
    margin-top: 20px;
  }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>

          <div class="container col-md-5">
              <h1>Whats the Weather</h1>


              <form>
                <fieldset class="form-group">
                  <label for="location">Enter name of city</label>
                  <input type="text" class="form-control" name ='location' id="location" placeholder="EG.. Chicago, New York, Dallas"
                  value = "<?php
                    if (array_key_exists('location', $_GET)) {
                        echo $_GET['location'];
                      }
                  ?>">
                </fieldset>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>


              <div id="weather"><?php

                  if ($weather) {
                      echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';

                  } else if ($error) {

                      echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';

                  }

                  ?></div>

            </div>




        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



  </body>
</html>
