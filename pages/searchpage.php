<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Deallo Product Search Page" />
	<meta name="keyword" content="HTML, CSS, Javascript" />
	<meta name="author" content=""/>
	
	<title>Search Result Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
	<link rel="icon" type="image/png" href="../images/DealloLogo-favicon.png"/>
	
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
    <a class="navbar-brand" rel="home" href="../index.php">Deallo's Craft House</a>
  </div>
  
  <div class="collapse navbar-collapse">

    <!--Search-->
    <div class="col-sm-3 col-md-3 navbar-right">
      <form class="navbar-form" role="search" method="GET" action="#">
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
		 <?php  if(isset($_SESSION['username'])) : ?>
				  <a href="pages/products.php" class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo $_SESSION['welcomeName'] ?> <b class="caret"></b></a>
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
    
<div class="container-fluid">
    
    <?php
	
        $searchTerm = '';
        $searchTerm = $_GET['searchTerm'];

        //If not set
		if(empty($searchTerm) || $searchTerm === NULL)
		{	
            echo "Search bar is empty. Please key in a keyword."; 
		}
		else
		{
            //Connect to database
            $conn = mysqli_connect("localhost", "root", "", "deallo");
            if(mysqli_connect_errno())
            {
                echo "Failed to connect";
            }
            else
            {

                $query = mysqli_query($conn, "SELECT * FROM product_tbl WHERE productName LIKE '%$searchTerm%'") or die(mysqli_error());
                $numrows = mysqli_num_rows($query);
		
            }
		if($numrows == 0)
		{
			echo "<h3 class='text-center'>We were unable to find results for " . $searchTerm . "</h3>";
		}
		else
		{	
            echo "<h2>Search Results for: " . $searchTerm . "</h2>";
            echo "<hr/>";
            while($row = mysqli_fetch_array($query))
			{
				$category = $row['productCategory'];
				$name = $row['productName'];
				$picture = $row['productPic'];
				$price = $row['productPrice'];
                $productOwner = $row['productOwner'];
                
           ?>     

    <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12 mb-4">
      <br/>
              <div class="well well-lg">
                  <!--Print out product picture -->
                 <img src="../images/product_images/<?php echo $row['productPic']; ?>" align="middle" class="img-responsive mx-auto d-block" width="200px" height="200px" />

                <!--Print out product name -->
                <div class="card-body">
                  <h3 class="card-title">
                    <a href="pages/products.php"><?php echo $name ?></a>
                  </h3>
                  <!--Print out product price -->
                  <h4 class="product-price">
                      <?php echo "RM $price  &nbsp &nbsp"; ?>
                  </h4>
                  <hr/>
                  <!--Print out product owner -->
                  <h4 class="product-owner">
                      <?php echo "$productOwner &nbsp"; ?>
                  </h4>
              </div>
            </div>
          </div>

    <?php
			}
		}
            
		//Disconnect to database
		
        mysqli_close($conn);
		}
	?>
</div>
    
    <!-- Footer -->
    <footer>
      <div class="container-fluid">
        <p class="m-0 text-center">Copyright &copy; Deallo's Craft House</p>
      </div>
      <!-- /.container -->
    </footer>


	
    <!-- jQuery – required for Bootstrap's JavaScript plugins) --> 
    <script src="../js/jquery.min.js"></script> 
    <!-- All Bootstrap  plug-ins  file --> 
    <script src="../js/bootstrap.min.js"></script> 
    <!-- Basic AngularJS --> 
    <script src="../js/angular.min.js"></script> 
    <!-- AngularJS - Routing --> 
    <script src="../js/angular-route.min.js"></script>
    <!-- App Script --> 
    <script src="../js/dealloApp.js"></script>
	
</body>

</html>
