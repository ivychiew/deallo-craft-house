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

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.css.min">
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

    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
   
      
      <div class="row">

        <div class="col-lg-3">


          <h1 class="my-4">Deallo's Craft House</h1>

          <!--Check user session--> 

          <?php  if (isset($_SESSION['username'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p> <a href="index.php?logout='1'" style="color: grey;">logout</a> </p>
          <?php endif ?>

          <!--End-->
          
          <div class="list-group">
            <a href="#" class="list-group-item">Clothing and Accessories</a>
            <a href="#" class="list-group-item">Jewellery</a>
            <a href="#" class="list-group-item">Craft Supplies</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                 <img class="d-block img-fluid" src="images/cover1.png" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/cover2.png" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="cover3.png" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

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
              <div class="card h-100">
                 <img src="images/product_images/<?php echo $row['productPic']; ?>" align="middle" class="img-responsive mx-auto d-block" width="200px" height="200px" />

                <div class="card-body">
                  <h4 class="card-title">
                    <a href="pages/products.php"><?php echo $productName ?></a>
                  </h4>

                  <h5>
                    <span class="product-price">
                      <?php echo "RM $productPrice  &nbsp &nbsp"; ?>
                    </span>
                  </h5>
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
  <script src="../js/bootstrap.min.js"></script>

  </body>

</html>