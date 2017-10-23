<?php include '../includes/sessions.php' ?>
<?php include '../includes/product_config.php' ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage</title>

    <!-- Bootstrap core CSS -->
     <link rel="stylesheet" href="../styles/sellers_page.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/products.css"/>
 
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
              <a href="products.php" class="dropdown-toggle" data-toggle="dropdown" style="color: #577B84">Welcome <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php">Edit Profile</a></li>
                <li class="divider"></li>
                <li><a class="nav-link" href="index.php?logout='1'">Sign Out</a></li>
                 <li class="divider"></li>
                <li><a href="customer-supp.php">Questions?</a></li>
              </ul>
            </li>
       <?php endif ?>
     
      <li class="dropdown">
              <a href="products.php" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="products.php">All Products</a></li>
                <li class="divider"></li>
                <li><a href="#">Clothing</a></li>
                <li class="divider"></li>
                <li><a href="#">Accessories</a></li>
                <li class="divider"></li>
                <li><a href="#">Food</a></li>
                <li class="divider"></li>
                <li><a href="#">Furniture</a></li>
              </ul>
      </li>
      <li><a href="#"> <span class="glyphicon glyphicon-shopping-cart"></span> &nbsp; Cart</a></li>
    </ul>
  </div>
</div>

    <!-- Page Content -->
    <div class="container">
        <div class="row ">
          <div class="col-md-12 col-lg-12 col-xl-12">

             <h1 class="heading" align="center"> Welcome to Deallo's Seller Centre </h1>
          </div>
        </div>
        <div class="row" align="center">
          <div class="col-md-4">
            <a href="myProducts.php">
              <span><img src="../images/vectors/shop.png" alt="my shop" class="img-responsive"/></span>  
              <br><br>
              <h4>My Products</h4> 
            </a>
          </div>
          <div class="col-md-4">
            <a href="mySales.php">
              <span><img src="../images/vectors/coin.png" alt="my products" class="img-responsive"/></span>    
              <br><br>
              <h4>My Sales</h4>     
            </a>   
          </div>
          <div class="col-md-4">
            <a href="shopRating.php">
              <span><img src="../images/vectors/paper.png" alt="shop rating" class="img-responsive"/></span>
              <br><br>
              <h4>Shop Rating</h4> 
            </a>
          </div>
        </div>
        <br>
       <!--  <div class="row" align="center">
          <div class="col-md-4">
             
          </div> -->

        <!-- <div class="col-md-4">
             <h4>My Sales</h4> 
          </div>
          <div class="col-md-4">
             <h4>Shop Rating</h4> 
          </div>
        </div>
 -->
          
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
  <script src="../js/bootstrap.min.js"></script>

  </body>

</html>