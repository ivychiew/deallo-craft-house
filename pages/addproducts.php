 <?php

include_once("..\includes\server.php");
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
  <link href="../styles/style.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->

  <!--   <php include('includes\errors.php')> -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

       

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
         
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
         
                <li class="nav-item">
                  <a class="nav-link" href="index.php?logout='1'">Sign out</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/profile.php">Profile</a>
                </li>


            <li class="nav-item">
              <a class="nav-link" href="#">Sell</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Shopping Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <br>
        
      <h2 align="center">Add a product to sell</h2>
  
      <hr>

      <form action="product.php" method="post">
      
      <table width="100%">
      <tbody>

      <tr>
        <td width="30%" align="right">Product Name :</td>
        <td width="70%">
        <label>
          <input name="product_name" type="text" id="product_name" size="64">
        </label>
        </td>
      </tr>

      <tr>
        <td align="right">Product Price (RM): </td>
        <td>
        <label>
            <input name="price" type="text" id="price" size="12">
        </label>
        </td>
      </tr>

      <tr>
        <td align="right">Quantity :</td>
        <td>
          <label>
            <input name="quantity" type="text" id="quantity" size="12">
          </label>
        </td>
      </tr>

      <tr>
        <td align="right">Category :</td>
        <td>
          <label>
            <select name="category" id="category">
              <option value="Shoes">Clothes</option>
              <option value="Boots">Accessories</option>
            </select>
          </label>
        </td>
      </tr>

      <tr>
        <td align="right">Product Details :</td>
        <td><label>
          <textarea name="details" id="details" cols="64" rows="5"></textarea>
          </label>
        </td>
      </tr>
      <tr>
        <td align="right">Product Image :</td>
        <td>
          <label>
            <input type="file" name="fileField" id="fileField">
          </label>
        </td>
      </tr>      
      <tr>
        <td>&nbsp;</td>
        <td>
          <label>
            <input type="submit" name="'product_submit'" id="button" value="Add This Item Now">
          </label>
        </td>
      </tr>

    </tbody>

    </table>

    </form>
  </div>
</div>
   
</div>

    <!-- Footer -->
   <!--  <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright © Deallo's Craft House</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    </body>

    </html>

