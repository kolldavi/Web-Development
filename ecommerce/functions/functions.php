<?php

$con  = mysqli_connect("localhost","root","^NFuhQvN3Og3","ecommerce");
//get categories

function getCategories()
{

  global $con;
  $getCategoriesQuery = "SELECT * FROM categories";

  $run_query= mysqli_query($con,$getCategoriesQuery);

  while($row = mysqli_fetch_array($run_query))
  {
    $categoriesId = $row['id'];
    $categoriesTitle =  $row['title'];

    echo      "<li class='nav-item'>
                <a class='nav-link' href='index.php?cat=$categoriesId'>$categoriesTitle</a>
              </li>";

  }
}

function getBrands()
{

  global $con;
  $getCategoriesQuery = "SELECT * FROM brands";

  $run_query= mysqli_query($con,$getCategoriesQuery);

  while($row = mysqli_fetch_array($run_query))
  {
    $categoriesId = $row['id'];
    $brandTitle =  $row['title'];

    echo      "<li class='nav-item'>
                <a class='nav-link' href='index.php?brand=$categoriesId'>$brandTitle</a>
                </li>";
  }
}

function getCategoriesOption()
{

  global $con;
  $getCategoriesQuery = "SELECT * FROM categories order by title ";

  $run_query= mysqli_query($con,$getCategoriesQuery);

  while($row = mysqli_fetch_array($run_query))
  {
    $categoriesId = $row['id'];
    $categoriesTitle =  $row['title'];

    echo      '<option value="'.$categoriesId.'">'.
                $categoriesTitle.'
                </option>';

  }
}

function getBrandsOption()
{

  global $con;
  $getCategoriesQuery = "SELECT * FROM brands order by title";

  $run_query= mysqli_query($con,$getCategoriesQuery);

  while($row = mysqli_fetch_array($run_query))
  {
    $categoriesId = $row['id'];
    $brandTitle =  $row['title'];

    echo     '<option value="'.$categoriesId.'">'.
                $brandTitle.'
                </option>';
  }
}

function insertProductSubmit()
{
  if(isset($_POST['insertPost']))
  {

    global $con;

    //get fields
    $productTitle = $_POST['title'];
    $productCategories = $_POST['porductCategory'];
    $porductBrand = $_POST['porductBrand'];
    $productPrice = $_POST['price'];
    $productKeywords = $_POST['keywords'];
    $productDescription = $_POST['description'];


    //get image
      $productImage = $_FILES['image']['name'];
      $productImageTemp = $_FILES['image']['tmp_name'];


      $insertProduct =  "INSERT INTO products (title, category, brand, price, description, image, keywords) VALUES ('$productTitle', '$productCategories', '$porductBrand', '$productPrice', '$productDescription', '$productImage', '$productKeywords')";


      $insertQuery = mysqli_query($con,$insertProduct);


      if($insertQuery)
      {
        move_uploaded_file($productImageTemp,"../images/productImages/$productImage");
        echo "<script>
        alert('Product has been inserted');
        window.open('insertProduct.php','_self');
        </script>";
      }
  }
}

  function getProducts()
  {
    global $con;

    if(isset($_GET['cat']))
    {
      $cat = $_GET['cat'];
      $getProducts = "SELECT * FROM products where category  = $cat";

      $runQuery = mysqli_query($con, $getProducts);

      while($row = mysqli_fetch_array($runQuery))
       {
         $productId = $row['id'];
         $productTitle = $row['title'];
         $productPrice = $row['price'];
         $productImage = $row['image'];


        echo "<div class='product'>";
        echo "<h3>$productTitle</h3>";
        echo "<img src='images/productImages/$productImage' width='180px;' height='150px;'/>";
        echo "<h3>$$productPrice</h3><br />";
        echo "<a class='btn btn-success' href='details.php?productId=$productId' >Details</a>";
        echo "<a class='btn btn-primary' href='index.php?productId=$productId' '>Add To Cart</a><br />";
        echo  "</div>";
       }
   }else if(isset($_GET['brand'])){
     $brand = $_GET['brand'];
     $getProducts = "SELECT * FROM products where brand  = $brand";

     $runQuery = mysqli_query($con, $getProducts);

     while($row = mysqli_fetch_array($runQuery))
      {
        $productId = $row['id'];
        $productTitle = $row['title'];
        $productPrice = $row['price'];
        $productImage = $row['image'];


       echo "<div class='product'>";
       echo "<h3>$productTitle</h3>";
       echo "<img src='images/productImages/$productImage' width='180px;' height='150px;'/>";
       echo "<h3>$$productPrice</h3><br />";
       echo "<a class='btn btn-success' href='details.php?productId=$productId' >Details</a>";
       echo "<a class='btn btn-primary' href='index.php?productId=$productId' '>Add To Cart</a><br />";
       echo  "</div>";
      }
   }else if(isset($_GET['viewall'])){
     $getProducts = "SELECT * FROM products";

     $runQuery = mysqli_query($con, $getProducts);

     while($row = mysqli_fetch_array($runQuery))
      {
        $productId = $row['id'];
        $productTitle = $row['title'];
        $productPrice = $row['price'];
        $productImage = $row['image'];


       echo "<div class='product'>";
       echo "<h3>$productTitle</h3>";
       echo "<img src='images/productImages/$productImage' width='180px;' height='150px;'/>";
       echo "<h3>$$productPrice</h3><br />";
       echo "<a class='btn btn-success' href='details.php?productId=$productId' >Details</a>";
       echo "<a class='btn btn-primary' href='index.php?productId=$productId' '>Add To Cart</a><br />";
       echo  "</div>";
      }
   }else if(isset($_GET['search'])){
     $search = $_GET['search'];
     $getProducts = "SELECT * FROM products WHERE keywords LIKE  '%$search%'";

     $runQuery = mysqli_query($con, $getProducts);

     while($row = mysqli_fetch_array($runQuery))
      {
        $productId = $row['id'];
        $productTitle = $row['title'];
        $productPrice = $row['price'];
        $productImage = $row['image'];


       echo "<div class='product'>";
       echo "<h3>$productTitle</h3>";
       echo "<img src='images/productImages/$productImage' width='180px;' height='150px;'/>";
       echo "<h3>$$productPrice</h3><br />";
       echo "<a class='btn btn-success' href='details.php?productId=$productId' >Details</a>";
       echo "<a class='btn btn-primary' href='index.php?productId=$productId' '>Add To Cart</a><br />";
       echo  "</div>";
      }
   }
   else{

     $getProducts = "SELECT * FROM products limit 6";

     $runQuery = mysqli_query($con, $getProducts);

     while($row = mysqli_fetch_array($runQuery))
      {
        $productId = $row['id'];
        $productTitle = $row['title'];
        $productPrice = $row['price'];
        $productImage = $row['image'];


       echo "<div class='product'>";
       echo "<h3>$productTitle</h3>";
       echo "<img src='images/productImages/$productImage' width='180px;' height='150px;'/>";
       echo "<h3>$$productPrice</h3><br />";
       echo "<a class='btn btn-success' href='details.php?productId=$productId' >Details</a>";
       echo "<a class='btn btn-primary' href='index.php?productId=$productId' '>Add To Cart</a><br />";
       echo  "</div>";
      }
   }
  }

  function getDetails()
  {
    global $con;
    if(isset($_GET['productId']))
    {
      $id  = $_GET['productId'];
      $getProducts = "SELECT * FROM products where id = $id";

      $runQuery = mysqli_query($con, $getProducts);

      while($row = mysqli_fetch_array($runQuery))
       {
         $productId = $row['id'];
         $productTitle = $row['title'];
         $productCategories = $row['category'];
         $porductBrand = $row['brand'];
         $productPrice = $row['price'];
         $productKeywords = $row['keywords'];
         $productDescription = $row['description'];
         $productImage = $row['image'];


        echo "<div class='product'>";
        echo "<h3>$productTitle</h3>";
        echo "<img src='images/productImages/$productImage' width='400px;' height='300px;'/>";
        echo "<h3>$$productPrice</h3><br />";
        echo "<h5>$productDescription</h5><br />";
        echo "<a class='btn btn-success' href='index.php' '>Go Back</a>";
        echo "<a class='btn btn-primary' href='index.php?productId=$productId' '>Add To Cart</a><br />";
        echo  "</div>";
       }
    }

    }





 ?>
