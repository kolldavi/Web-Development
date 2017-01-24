<?php

  session_start();
$content ="";

//  echo "session ".$_SESSION['id'];
  //echo "cookie".$_COOKIE['id'];

  if(array_key_exists("id",$_SESSION) &&   $_SESSION['id']){
        echo "<p></p>";

    include ("connection.php");
    $query = "SELECT diary FROM users WHERE id =".mysqli_real_escape_string($link,$_SESSION['id'])." Limit 1";
  //  echo $query;
    $row = mysqli_fetch_array(mysqli_query($link,$query));
    $content = $row['diary'];

  }else{

    header("Location: login.php");

  }

include ("header.php");
?>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Secret Diary</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    </ul>
    <form class="form-inline my-2 my-lg-0">
  <a href='login.php?logout=1'>Log out</a>
    </form>
  </div>
</nav>



<div class="container-fluid">

  <textarea id ="diary" class="form-control"><?php echo  $content; ?></textarea>

</div>

<?php

include ("footer.php");

 ?>
