<?php

  $weather = "";
  $error = "";

      if (array_key_exists('location', $_GET)) {
          $city =  $_GET['location'];
          $city = str_replace(' ', '', $_GET['location']);
          $file_headers = @get_headers("http://www.weather-forecast.com/locations/$city/forecasts/latest");
            //echo $forecastPage;

            if ($file_headers[0] == 'HTTP/1.1 404 Not Found') {
                $error = "That city could not be found.";
            } else {
                $forecastPage = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");

                $contentArr = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecastPage);

                if (sizeof($contentArr) > 1) {
                    $contentArr2 = explode('</span></span></span>', $contentArr[1]);

                    if (sizeof($contentArr2) > 1) {
                        $weather = $contentArr2[0];
                    } else {
                        $error = "That city could not be found.";
                    }
          //  echo $contentArr2[0];
                } else {
                    $error = "That city could not be found.";
                }
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
                  } elseif ($error) {
                      echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                  }

                  ?></div>

            </div>




        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



  </body>
</html>
