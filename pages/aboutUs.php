<!DOCTYPE html> 
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
	<meta name="keyword" content="HTML, CSS, Javascript" />
    <meta name="author" content="Selena Yap"/>
	
    <title>Deallo Craft House - About Us </title>
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
    <a class="navbar-brand" rel="home" href="#">Deallo's Craft House</a>
  </div>
  
  <div class="collapse navbar-collapse">

    <!--Search-->
    <div class="col-sm-3 col-md-3 navbar-right">
      <form class="navbar-form" role="search" method="GET" action="searchpage.php">
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
                <li><a href="profile.php">Edit Profile</a></li>
                <li class="divider"></li>
                <li><a class="nav-link" href="../index.php?logout='1'">Sign Out</a></li>
                 <li class="divider"></li>
                <li><a href="customer-supp.php">Questions?</a></li>
              </ul>
        </li>
       <?php endif ?>
     <li><a class="nav-link" href="../index.php?logout='1'">Sign Out</a></li>
      <li class="dropdown">
          <a href="products.php" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="products.php">All Products</a></li>
            <li class="divider"></li>
            <li><a href="products/clothingAcc.php">Clothing &amp; Accessories</a></li>
            <li class="divider"></li>
            <li><a href="products/jewelry.php">Jewelery</a></li>
            <li class="divider"></li>
            <li><a href="products/craftSupplies.php">Craft Supplies</a></li>
            <li class="divider"></li>
            <li><a href="products/bedding.php">Bedding &amp; Room Decor</a></li>
            <li class="divider"></li>
            <li><a href="products/softToys.php">Soft Toys</a></li>
            <li class="divider"></li>
            <li><a href="products/vintage.php">Vintage Art</a></li>
            <li class="divider"></li>
            <li><a href="products/wedding.php">Wedding Accessories</a></li>
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
        

    <br/><br/>
    
    <div class="container-fluid">
        <div class="row">
            <div class=" col-lg-12 col-md-12 col-sm-12 meetTagline text-center">
                <h1>Meet Our Team</h1>
                <p>BRINGING THE BEST DEALS TO YOU LO</p>
            </div>
        </div>
        <div class="row">
            <img src="../images/team.jpg" class="coverImg col-lg-12 col-md- col-sm-12 col-xs-12"/>
        </div>
        
        <br/><br/>
        
    </div>
    
    <div class="container">
        <div class="row">

                <section class="col-lg-4 col-md-4 col-sm-4 col-lg-4">
                    <img src="../images/adminProfile.png" class="img-rounded"/>
                    <h2>Viv</h2>
                    <p>Vivien is the project leader in the development team for Deallo Craft House. She specializes in backend integration as well as the scripting used in our webpage.</p>
                </section>

                <section class="col-lg-4 col-md-4 col-sm-4 col-lg-4">
                    <img src="../images/adminProfile.png" class="img-rounded"/>
                    <h2>Sel</h2>
                    <p>Selena is a scrum member of our team who is responsible for the overall design and user experience of this web application.</p>
                </section>

                <section class="col-lg-4 col-md-4 col-sm-4 col-lg-4">
                    <img src="../images/adminProfile.png" class="img-rounded"/>
                    <h2>Tay</h2>
                    <p>Tay is also a scrum member who's main duties lie with promoting the ease of use of our application.</p>
                </section>
        
            </div>
        </div>
		
		<br/><br/>
    
        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Deallo's Craft House</p>
            </div>
        <!-- /.container -->
        </footer>
    
</body>

	<!-- Bootstrap core JavaScript -->
    <!-- jQuery library -->
    <script src="../js/jquery.min.js"></script> 
    <!-- All Bootstrap  plug-ins  file --> 
    <script src="../js/bootstrap.min.js"></script> 
    <!-- Basic AngularJS --> 
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <!-- AngularJS - Routing --> 
    <script src="../js/angular-route.min.js"></script>
    
</html>