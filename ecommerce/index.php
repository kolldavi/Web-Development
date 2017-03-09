<!DOCTYPE html>
<?php include ('functions/functions.php');?>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Online Shop</title>
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="styles/sticky-footer-navbar.css" rel="stylesheet">

  </head>
  <body>


    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
         <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <a class="navbar-brand" href="index.php">Home</a>

         <div class="collapse navbar-collapse" id="navbarsExampleDefault">
           <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
               <a class="nav-link" href="index.php?viewall">All Products <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#">My Account</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#">Sign Up</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#">Shopping Cart</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#">Contact Us</a>
             </li>
           </ul>
           <form class="form-inline mt-2 mt-md-0" method="get" action="index.php?">
             <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
           </form>
         </div>
       </nav>

       <div class="container-fluid">
         <div class="row">
           <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">

             <ul class="nav nav-pills flex-column" id="catagories">
               <li class="nav-item">
                 <a class="nav-link active" href="#">Catagories <span class="sr-only">(current)</span></a>
               </li>
               <?php getCategories(); ?>
             </ul>

             <ul class="nav nav-pills flex-column" id="brands">
               <li class="nav-item">
                 <a class="nav-link active" href="#">Brands <span class="sr-only">(current)</span></a>
               </li>
                  <?php getBrands(); ?>
             </ul>


           </nav>

           <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">

             <img src="images/myAddBanner.jpg" />

              <br />
               <?php getProducts(); ?>

           </main>
         </div>
       </div>



          <footer class="footer">
            <div class="container float-right">
              <span class="text-muted">David Koller</span>
            </div>
          </footer>


      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->

      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  </body>
</html>
