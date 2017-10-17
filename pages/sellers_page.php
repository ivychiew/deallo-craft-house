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
   <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css.min">

    <!-- Custom styles for this template -->
  <!-- <link href="../styles/style.css" rel="stylesheet">
 -->
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-fixed-top">
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

            <?php  if (isset($_SESSION['username'])) : ?>
            <!-- <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p> -->
           <!--  <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p> -->
         
                <li class="nav-item">
                  <a class="nav-link" href="index.php?logout='1'" style="color: red;">Sign out</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/profile.php">Edit Profile</a>
                </li>

             <?php endif ?>
            <li class="nav-item">
              <a class="nav-link" href="pages/products.php">Products</a>
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
        <div class="row ">
          <div class="col-md-12 col-lg-12 col-xl-12">

             <h1 class="heading" align="center"> Welcome to Deallo's Seller Centre </h1>
          </div>
        </div>
        <div class="row" align="center">
          <div class="col-md-4">
            <a href="#">
              <span><img src="images/vectors/shop.png" alt="my shop" class="img-responsive"/></span>  
              <br><br>
              <h4>My Products</h4> 
            </a>
          </div>
          <div class="col-md-4">
            <a href="#">
              <span><img src="images/vectors/coin.png" alt="my products" class="img-responsive"/></span>    
              <br><br>
              <h4>My Sales</h4>     
            </a>   
          </div>
          <div class="col-md-4">
            <a href="#">
              <span><img src="images/vectors/paper.png" alt="shop rating" class="img-responsive"/></span>
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