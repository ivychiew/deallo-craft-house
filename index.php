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
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 
    elements and media queries --> 
    <!-- WARNING: Respond.js doesn't work if you view the 
    page via file:// --> 
    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script> 
    <script src="js/respond.min.js"></script> 
    <![endif]--> 
</head>

<body>

<!-- Navigation -->
 <div class="navbar navbar-custom nav-fixed-top" role="navigation">
  
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" rel="home" href="#">Deallo's Craft House</a>
  </div>
  
  <div class="collapse navbar-collapse">

    <!--Search-->
    <div class="col-sm-3 col-md-3 navbar-right">
      <form class="navbar-form" role="search" method="GET" action="pages/searchpage.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="searchTerm" id="searchTerm"/>
        <div class="input-group-btn">
          <button class="btn btn-default" name="search_submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
      </form>
    </div>

   
    <ul class="nav navbar-nav"><!--unordered list start -->
		<li class="dropdown">
		 <?php  if (isset($_SESSION['username'])) : ?>
              <a class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo $_SESSION['welcomeName'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="pages/profile.php">Edit Profile</a></li>
                <li class="divider"></li>
                <li><a class="nav-link" href="index.php?logout='1'">Sign Out</a></li>
                 <li class="divider"></li>
                <li><a href="pages/customer-supp.php">Questions?</a></li>
              </ul>
        </li>
       <?php endif ?>
     <li><a class="nav-link" href="index.php?logout='1'">Sign Out</a></li>
      <li class="dropdown">
          <a href="pages/products.php" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="pages/products.php">All Products</a></li>
            <li class="divider"></li>
            <li><a href="pages/products/clothingAcc.php">Clothing &amp; Accessories</a></li>
            <li class="divider"></li>
            <li><a href="pages/products/jewelry.php">Jewelery</a></li>
            <li class="divider"></li>
            <li><a href="pages/products/craftSupplies.php">Craft Supplies</a></li>
            <li class="divider"></li>
            <li><a href="pages/products/bedding.php">Bedding &amp; Room Decor</a></li>
            <li class="divider"></li>
            <li><a href="pages/products/softToys.php">Soft Toys</a></li>
            <li class="divider"></li>
            <li><a href="pages/products/vintage.php">Vintage Art</a></li>
            <li class="divider"></li>
            <li><a href="pages/products/wedding.php">Wedding Accessories</a></li>
            <li class="divider"></li>
            <li><a href="pages/products/food.php">Homemade Food</a></li>

          </ul>
      </li>
     <li>
        <span class="navbar-text navbar-right">
            <span class="glyphicon glyphicon-shopping-cart glyphicon-2x my-cart-icon">  <span class="badge badge-notify my-cart-badge"></span>
            </span>
        </span>
      </li>
    </ul>
  </div>
</div>
<!--End of Nav Bar-->

    <!-- Page Content -->
    <div class="container-fluid" style="margin-left:10%; margin-right: 10%; background-color:#F2F3D9;" >
	
	<div class="row">
	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	       <br>
	      <!--Carousel Starts Here-->
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
      			  <li data-target="#myCarousel" data-slide-to="3"></li>
      			  <li data-target="#myCarousel" data-slide-to="4"></li>
      			  <li data-target="#myCarousel" data-slide-to="5"></li>
      			  <li data-target="#myCarousel" data-slide-to="6"></li>
      			  <li data-target="#myCarousel" data-slide-to="7"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

              <div class="item active">
                <img src="../deallo-craft-house/images/cover-art/clothesCover.jpg" alt="Clothes and Accessories" style="width:100%;">
              </div>

              <div class="item">
                <img src="../deallo-craft-house/images/cover-art/craftCover.jpg" alt="Craft Supplies" style="width:100%;">
              </div>

              <div class="item">
                <img src="../deallo-craft-house/images/cover-art/toysCover.jpg" alt="Soft Toys" style="width:100%;">
              </div>
			  
			  <div class="item">
                <img src="../deallo-craft-house/images/cover-art/bedroomCover.jpg" alt="Bedroom" style="width:100%;">
              </div>
			  
			  <div class="item">
                <img src="../deallo-craft-house/images/cover-art/jewelryCover.png" alt="Jewelry" style="width:100%;">
              </div>
			  
			  <div class="item">
                <img src="../deallo-craft-house/images/cover-art/meetCover.jpg" alt="Meet Community" style="width:100%;">
              </div>
			  
			  <div class="item">
                <img src="../deallo-craft-house/images/cover-art/weddingCover.png" alt="Wedding" style="width:100%;">
              </div>
			  
			  <div class="item">
                <img src="../deallo-craft-house/images/cover-art/vintageCover.jpg" alt="Vintage" style="width:100%;">
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
		  
		</div>
		<!--end of column-->
	
	</div>
	<!--end of row-->

    <!-- logged in user information -->
      
	<div class="row" style="padding-right: 15px;">
		<div class="col-lg-3 col-md-3">
    <br>
    <div class="well" style="background-color: white; ">

      <h3 align="center">Advertisement</h3>

      <!-- <p>
      <img src="images/cat.png" alt="Cat Icon" class="center-block img-responsive" style="max-width: 200px; max-height: 200px;"/>
      </p> -->
     
      <div class="ads" style="border-radius: 50px;">
        <img src="images/ads/ad1.png" class="img-responsive"/>
      </div>
      
    </div>
      <div class="well" style="background-color: white; ">

		  <h3 align="center">Shop By Category</h3>

		  <!-- <p>
			<img src="images/cat.png" alt="Cat Icon" class="center-block img-responsive" style="max-width: 200px; max-height: 200px;"/>
		  </p> -->
		 
		  <div class="list-group categories" style="border-radius: 50px;">
        <div class="category-list-group">
  			<a href="pages/products/clothingAcc.php" class="list-group-item">Clothing &amp; Accessories</a>
  			<a href="pages/products/jewelry.php" class="list-group-item">Jewelry</a>
  			<a href="pages/products/craftSupplies.php" class="list-group-item">Craft Supplies</a>
  			<a href="pages/products/bedding.php" class="list-group-item">Bedding &amp; Room Decor</a>
  			<a href="pages/products/softToys.php" class="list-group-item">Soft Toys</a>
  			<a href="pages/products/vintage.php" class="list-group-item">Vintage Art</a>
  			<a href="pages/products/wedding.php" class="list-group-item">Wedding Accessories</a>
  			<a href="pages/myProducts.php" class="list-group-item">Sellers Center</a>
        </div>
		  </div>

		</div>
    
	</div>
    <!-- /.col-lg-3 .col-md-3-->
    <div class="col-lg-9 col-md-9">
    <div class="row">
    <br>
    <div class="well" style="background-color: white;">
    <div class="welcome_heading" align="center">
    <img src="images/watercolor.png" class="img-responsive" style="max-width: 100px; max-height: 100px;"/>
    <h2> Share your creativity with others: <a href="pages/addproducts.php" class="btn btn-danger my-cart-btn">Add an item for sell</a></h2>

    </div>
    </div>
    </div>
    </div>
		<!--Products Diplay-->
		<div class="col-lg-9 col-md-9" class="products">
		<div class="row">
    
      <h3> &nbsp; Bedding & Room Decor </h3>
    
      
			  <?php
			  
				  //Fetch the data from the database
				  $stmt = $dbh->prepare('SELECT * FROM product WHERE category= "Bedding & Room Decor" LIMIT 4 OFFSET 0');
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
					
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

					  <br/>
							  <div class="well well-lg" style="background-color: white;">

								 <img src="images/product_images/<?php echo $row['image']; ?>" alt="Product Image" align="middle" class="img-responsive mx-auto d-block" width="200" height="200" />

								<div class="card-body">
								  <h5 class="card-title">
									<a href="pages/products.php"><?php echo $name ?></a>
								  </h5>
								  <p class="product-price">
									  <?php echo "RM $price  &nbsp &nbsp"; ?>
								  </p>
								  
								  <hr class="divider-owner"/>
								  <p><span class="glyphicon glyphicon-user"></span>&nbsp; &nbsp;<?php echo $row['product_owner']; ?></p>
							  </div>
							</div>
					</div>
					
				<?php
					} //end of while loop
				?>
				</div>

				
				<?php	
				}
        ?>
            <div class="row">
            <h2> &nbsp; Homemade Snacks </h2>
        <?php
        
          //Fetch the data from the database
          $stmt = $dbh->prepare('SELECT * FROM product WHERE category= "Food" LIMIT 4 OFFSET 0');
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
          
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

            <br/>
                <div class="well well-lg" style="background-color: white;">

                 <img src="images/product_images/<?php echo $row['image']; ?>" alt="Product Image" align="middle" class="img-responsive mx-auto d-block" width="200" height="200" />

                <div class="card-body">
                  <h5 class="card-title">
                  <a href="pages/products.php" ><?php echo $name ?></a>
                  </h5>
                  <p class="product-price">
                    <?php echo "RM $price  &nbsp &nbsp"; ?>
                  </p>
                  
                  <hr class="divider-owner"/>
                  <p><span class="glyphicon glyphicon-user"></span>&nbsp; &nbsp;<?php echo $row['product_owner']; ?></p>
                </div>
              </div>
          </div>
          
        <?php
          } //end of while loop
        ?>
        </div>

        
        <?php 
        }

     //end of row count > 0
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
		<!-- /.col-lg-9 -->
	</div>
	<!-- /.row -->
  </div>
  <!-- /.container-fluid -->

    <!-- Footer -->
    <footer>
      <div class="container">
        <p class="m-0 text-center">Copyright &copy; Deallo's Craft House</p>
      </div>
      <!-- /.container -->
    </footer>

	<!-- Bootstrap core JavaScript -->
	<!--   <script src="../js/bootstrap.min.js"></script> -->
	  <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../js/cart.js"></script>	

  </body>

</html>