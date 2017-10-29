<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Deallo Product Category Page" />
	<meta name="keyword" content="HTML, CSS, Javascript" />
	<meta name="author" content="Tay Guan Yun" />
	<title>Product - Bedding </title>
    
    <link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../styles/test.css"/>
    
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
                <li><a href="pages/products/clothingAcc.php">Clothing &amp; Accessories</a></li>
                <li class="divider"></li>
                <li><a href="pages/products/jewelry">Jewelery</a></li>
                <li class="divider"></li>
                <li><a href="pages/products/craftSupplies.php">Craft Supplies</a></li>
                <li class="divider"></li>
                <li><a href="pages/products/bedding">Bedding &amp; Room Decor</a></li>
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
    
<div class="container">
	<div class="header">
        <h1>Bedding & Room Decorations</h1>
	</div>
	
	<br/>
    
    <div class="row">
        
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <img src="../../images/cover-art/bedroomCover.jpg" alt="bedding cover art" height="100%" class="img-responsive" width="100%"/>
        </div>
		
        <div class="well col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <img src="../../images/vectors/lightbulb.png" alt="Light bulb icon" width="200px" class="img-responsive center-block"/>
			<p class="text-center">Always wash bed linings before using them.</p>
        </div>
        
    </div>
	
    <!--<div class="row">
        <form name="productsearch" action="bedding.php" method="GET">
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="input-group">
                    <input type="text" name="kw" class="form-control" placeholder="Search" value=""/>
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                </div>
            </div>
        </form>
    </div>-->
	<hr/>
    
  
    <!--Print out product details -->
	<div class="row">
		<br>
 
	  <?php 
		include "../../includes/product_config.php";

		//Connect to database
		$conn = mysqli_connect("localhost", "root", "", "deallo");
		if(mysqli_connect_errno())
		{
			echo "Failed to connect";
		}
		else
		{
			$category = "bedding";
			$query = mysqli_query($conn, "SELECT * FROM product_tbl WHERE productCategory = '$category'") or die(mysqli_error($conn));
			$numrows = mysqli_num_rows($query);
		}
		
		if($numrows <= 0)
		{ echo '<div class="alert alert-danger">
				  <strong>Error: </strong> No items found.
				</div>'; }
		else
		{	
			while($row = mysqli_fetch_array($query))
			{
				//$category = $row['productCategory'];
				$name = $row['productName'];
				$picture = $row['productPic'];
				$price = $row['productPrice'];
		?> 
		<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
			<div class="well well-lg">
				<!--Print out product picture -->
				<img src="../../images/product_images/<?php echo $picture; ?>" class="img-responsive mx-auto d-block" width="200px" height="200px"/>
					<!--Print out product name -->
					<div class="card-body">
					  <h3 class="card-title">
						<a href="pages/products.php"><?php echo $name; ?></a>
					  </h3>
						<!--Print out product price -->
					  <h4 class="product-price">
						  <?php echo "RM $price &nbsp &nbsp"; ?>
					  </h4>
				  </div>
			</div>
		</div>
		
	<?php
            } //end of while loop
        } // end of else
		//Disconnect to database
        mysqli_close($conn);
    ?>
		
	</div>



	
	</div>
	
     <!-- Footer -->
	<footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Deallo's Craft House</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- jQuery – required for Bootstrap's JavaScript plugins) --> 
    <script src="../../js/jquery.min.js"></script> 
    <!-- All Bootstrap  plug-ins  file --> 
    <script src="../../js/bootstrap.min.js"></script> 
    <!-- Basic AngularJS --> 
    <script src="../../js/angular.min.js"></script> 
    <!-- AngularJS - Routing --> 
    <script src="../../js/angular-route.min.js"></script>
    <!-- App Script --> 
    <script src="../../js/dealloApp.js"></script>
	
</body>

</html>
