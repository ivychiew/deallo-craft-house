<?php include 'includes/sessions.php' ?>
<?php include 'includes/product_config.php' ?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="styles/products.css"/>
    

</head>

<body>

<!-- Navigation -->
 <div class="navbar navbar-default navbar-inverse nav-fixed-top" role="navigation">
  
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" rel="home" href="../index.php">Deallo's Craft House</a>
  </div>
  
  <div class="collapse navbar-collapse">

    
    <div class="col-sm-3 col-md-3 navbar-right">
      <form class="navbar-form" role="search">
      <div class="input-group ">
        <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
      </form>
    </div>

   
    <ul class="nav navbar-nav"><!--unordered list start -->
    <li class="dropdown">
     <?php  if (isset($_SESSION['username'])) : ?>
              <a href="pages/products.php" class="dropdown-toggle" data-toggle="dropdown" style="color: #577B84">Welcome <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="pages/profile.php">Edit Profile</a></li>
                <li class="divider"></li>
                <li><a class="nav-link" href="index.php?logout='1'">Sign Out</a></li>
                 <li class="divider"></li>
                <li><a href="pages/customer-supp.php">Questions?</a></li>
              </ul>
            </li>
       <?php endif ?>
     
      <li class="dropdown">
              <a href="pages/products.php" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="pages/products.php">All Products</a></li>
                <li class="divider"></li>
                <li><a href="pages/products/clothingAcc.php">Clothing and Accessories</a></li>
                <li class="divider"></li>
                <li><a href="pages/products/jewelry">Jewellery</a></li>
                <li class="divider"></li>
                <li><a href="pages/products/craftSupplies.php">Craft Supplies</a></li>
                <li class="divider"></li>
                <li><a href="pages/products/bedding">Bedding and Room Decor</a></li>
                <li class="divider"></li>
                <li><a href="pages/products/softToys">Soft Toys</a></li>
                <li class="divider"></li>
                <li><a href="pages/products/vintage">Vintage Art</a></li>
                <li class="divider"></li>
                <li><a href="pages/products/wedding">Wedding Accessories</a></li>
              </ul>
      </li>
      <li><a href="#"> <span class="glyphicon glyphicon-shopping-cart"></span> &nbsp; Cart</a></li>
    </ul>
  </div>
</div>
<!--End of Nav Bar-->
    <!-- Page Content -->
    <div class="container">

    <!-- logged in user information -->
      
      <div class="row">

        <div class="col-lg-3">


          <span><img src="images/cat.png" class="center-block img-responsive" style="max-width: 200px; max-height: 200px;"/></span>
		  <p><a href="pages/sellers_page.php">SELLERS PAGE</a></p>

          <!--End-->
          
          <div class="list-group">
            <a href="pages/products/cloth_acce.php" class="list-group-item">Clothing and Accessories</a>
            <a href="pages/products/jewelry.php" class="list-group-item">Jewellery</a>
            <a href="pages/products/craft.php" class="list-group-item">Craft Supplies</a>
            <a href="pages/products/" class="list-group-item">Room Decor</a>
            <a href="pages/products/soft_toy.php" class="list-group-item">Toys</a>
            <a href="pages/products/vintage.php" class="list-group-item">Vintage Art</a>
            <a href="pages/products/wedding.php" class="list-group-item">Wedding Accessories</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
        
          <!--Carousel Starts Here-->
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

              <div class="item active">
                <img src="../deallo-craft-house/images/cover-art/clothesCover.jpg" alt="Los Angeles" style="width:100%;">
              </div>

              <div class="item">
                <img src="../deallo-craft-house/images/cover-art/craftCover.jpg" alt="Chicago" style="width:100%;">
              </div>

              <div class="item">
                <img src="../deallo-craft-house/images/cover-art/toysCover.jpg" alt="New York" style="width:100%;">
              </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <!--Carousel ENDS Here-->
  

<!--Products Diplay-->
<div class="row" id="products">
  <?php
  
      //Fetch the data from the database
      $stmt = $DB_con->prepare('SELECT productID, productName, productPrice, productPic, productDescription FROM product_tbl ORDER BY productID DESC LIMIT 6 OFFSET 0');
      $stmt->execute();
      
      //If the number of products is more than 0 
      if($stmt->rowCount() > 0)
      {
        //Fetch the products from the database table to a row
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        { 
          //Extract data to a row
          extract($row);
  ?>
    <div class="col-lg-4 col-md-6 mb-4">
      <br>
              <div class="well well-lg" style="background-color: white;">

                 <img src="images/product_images/<?php echo $row['productPic']; ?>" align="middle" class="img-responsive mx-auto d-block" width="200px" height="200px" />

                <div class="card-body">
                  <h3 class="card-title">
                    <a href="pages/products.php"><?php echo $productName ?></a>
                  </h3>
                  <h4 class="product-price">
                      <?php echo "RM $productPrice  &nbsp &nbsp"; ?>
                  </h4>
              </div>
            </div>
          </div>
      <?php
    }
  }
  else
  {
    ?>
    <!--If Empty Data, Show no data found-->
        <div class="col-xs-12">
          <div class="alert alert-warning">
              <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
  }
 
?>
</div>  
          <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Deallo's Craft House</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
<!--   <script src="../js/bootstrap.min.js"></script> -->
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>

</html>