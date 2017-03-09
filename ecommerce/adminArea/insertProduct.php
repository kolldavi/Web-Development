<!DOCTYPE html>
<?php include ('../functions/functions.php');?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insert Poducts</title>
    <link href="../styles/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/style.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../styles/sticky-footer-navbar.css" rel="stylesheet">

  </head>
  <body bgcolor="skyblue">
      <?php insertProductSubmit(); ?>
    <div class="container">


    <form action="insertProduct.php" method="post" enctype="multipart/form-data">
      <div class="table-responsive">
           <table class="table table-striped">
             <thead>


            <h2 align="center">Insert In Here</h2>
          </td>
        </thead>
        <tr>
          <td align="right">
            Product Title:
          </td>
          <td>
            <input type="text" name="title" required/>
          </td>
        </tr>
        <tr>
          <td align="right">
            Product Category:
          </td>
          <td>
            <select name ="porductCategory">

              <?php getCategoriesOption(); ?>
            </select>

          </td>
        </tr>
        <tr>
          <td align="right">
            Product Brand:
          </td>
          <td>
            <select name ="porductBrand">

            <?php getBrandsOption(); ?>
          </select>
          </td>
        </tr>
        <tr>
          <td align="right">
            Product Image:
          </td>
          <td>
            <input type="file" name="image" required/>
          </td>
        </tr>
        <tr>
          <td align="right">
            Product Price:
          </td>
          <td>
            <input type="text" name="price" required/>
          </td>
        </tr>
        <tr>
          <td align="right">
            Product Description:
          </td>
          <td>
            <textarea type="text" name="description" cols="30" rows="10" required></textarea>
          </td>
        </tr>
        <tr>
          <td align="right">
            Product Keywords:
          </td>
          <td>
            <input type="text" name="keywords" required/>
          </td>
        </tr>
        <tr>
          <td align="center" colspan="8" >
            <input class="btn btn-success"type="submit" name="insertPost" value="Insert Now" />
          </td>
        </tr>
      </table>
      </div>

    </form>
        </div>

  </body>
</html>
