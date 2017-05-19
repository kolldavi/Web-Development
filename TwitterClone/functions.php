<?php

  session_start();

  $link = mysqli_connect("localhost", "cl45-twitter-cip", "3f73wEM.!", "cl45-twitter-cip");

  // Check connection
  if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

    if ($_GET['function'] == 'logout') {
        session_unset();
    }

    function time_since($since)
    {
        $chunks = array(
              array(60 * 60 * 24 * 365 , 'year'),
              array(60 * 60 * 24 * 30 , 'month'),
              array(60 * 60 * 24 * 7, 'week'),
              array(60 * 60 * 24 , 'day'),
              array(60 * 60 , 'hour'),
              array(60 , 'minute'),
              array(1 , 'second')
          );

        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];
            $name = $chunks[$i][1];
            if (($count = floor($since / $seconds)) != 0) {
                break;
            }
        }

        $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
        return $print;
    }

    function displayTweets($type)
    {
        global $link;
        if ($type == 'public') {
            $whereClause = "";
        } elseif ($type =='isFollowing') {
            $query =    "SELECT * FROM isFollowing where follower = '".mysqli_real_escape_string($link, $_SESSION['id'])."'";

      //  echo $query;
        $result  = mysqli_query($link, $query);
            $whereClause = "";
            while ($row = mysqli_fetch_assoc($result)) {
                if ($whereClause == "") {
                    $whereClause = " WHERE ";
                } else {
                    $whereClause .= " OR ";
                }
                $whereClause .= "userid = '".$row['isfollowing']."'";
            }
        } elseif ($type =='yourtweets') {
            $whereClause = " WHERE userid = ".mysqli_real_escape_string($link, $_SESSION['id']);
        } elseif ($type =='search') {
            echo "<p>Showing Results for: ".mysqli_real_escape_string($link, $_GET['query'])."</p>";
            $whereClause = " WHERE tweet LIKE '%".mysqli_real_escape_string($link, $_GET['query'])."%'";
        } elseif (is_numeric($type)) {
            $userQuery = "SELECT * FROM users WHERE id =  '".mysqli_real_escape_string($link, $type)."' LIMIT 1";

            $userQueryResult = mysqli_query($link, $userQuery);
            $user  = mysqli_fetch_assoc($userQueryResult);

            echo "<h2>".mysqli_real_escape_string($link, $user['email'])."'s Tweets</h2>";

            $whereClause = " WHERE userid = '".mysqli_real_escape_string($link, $type)."'";
        }

        $query = "SELECT * FROM tweets".$whereClause." ORDER BY 'datetime' desc limit 10";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) == 0) {
            echo "There are no tweets to display";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $userQuery = "SELECT * FROM users WHERE id =  '".mysqli_real_escape_string($link, $row['userid'])."' LIMIT 1";

                $userQueryResult = mysqli_query($link, $userQuery);
                $user  = mysqli_fetch_assoc($userQueryResult);

                echo "<div class='tweet'><p><a href='?page=publicprofile&userid=".$user['id']."'>".$user['email']."</a> <span class='time'>".time_since(time() - strtotime($row ['datetime']))." ago:</span></p>";

                echo "<p>".$row['tweet']."</p>";
                echo "<p><a href='#' class='toggleFollow' data-userid='".$row['userid']."'>";

                $isFollowingQuery =    "SELECT * FROM isFollowing where follower = '".mysqli_real_escape_string($link, $_SESSION['id'])."' AND isfollowing = '".mysqli_real_escape_string($link, $row['userid'])."' LIMIT 1";

        //  echo $query;
          $isFollowingResult  = mysqli_query($link, $isFollowingQuery);


                if (mysqli_num_rows($isFollowingResult) > 0) {
                    echo "Unfollow";
                } else {
                    echo "Follow";
                }

                echo "</a></p></div>";
            }
        }
    }

    function displaySearch()
    {
        echo '<form class="form-inline">
              <div class="form-group">
                <input type="hidden" name="page" value="search" />
                <input type="text" name="query" class="form-control" id="search" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-primary">Search Tweets</button>
            </form>';
    }

    function displayTweetBox()
    {
        if ($_SESSION['id'] > 0) {
            echo '<div id="tweetSuccess" class="alert alert-success">Your tweet was posted successfully</div>
        <div id="tweetFail" class="alert alert-danger"></div>
        <div form">
                <div class="form-group">
                  <textarea type="text" class="form-control" id="tweetContent"></textarea>
                </div>
                <button  id="postTweetButton" class="btn btn-primary">Post Tweet</button>
              </div>';
        }
    }

    function displayUsers()
    {
        global $link;
        $query = "SELECT * FROM users ORDER BY 'datetime' desc limit 10";
        $result = mysqli_query($link, $query);


        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p><a href='?page=publicprofile&userid=".$row['id']."'>".$row['email']."</a></p>";
        }
    }
