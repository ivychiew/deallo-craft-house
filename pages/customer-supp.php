<?php include '../includes/sessions.php' ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="Deallo Customer Support" />
	<meta name="author" content="Tay Guan Yun, Selena Yap" />
	
	<title>Deallo Craft House - Customer Support Page</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/products.css"/>
	<link rel="icon" type="image/png" href="../images/DealloLogo-favicon.png">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 
    elements and media queries --> 
    <!-- WARNING: Respond.js doesn't work if you view the 
    page via file:// --> 
    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script> 
    <script src="js/respond.min.js"></script> 
    <![endif]--> 
    
</head>

<!-- <body class="container-fluid" data-ng-app="myApp"> -->
<body class="data-ng-app">
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

    <?php  if (isset($_SESSION['username'])) : ?>
    <ul class="nav navbar-nav"><!--unordered list start -->
    <li class="dropdown">
              <a href="pages/products.php" class="dropdown-toggle" data-toggle="dropdown" style="color: #577B84">Welcome <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php">Edit Profile</a></li>
                <li class="divider"></li>
                <li><a class="nav-link" href="../index.php?logout='1'">Sign Out</a></li>
                 <li class="divider"></li>
                <li><a href="customer-supp.php">Questions?</a></li>
              </ul>
            </li>
       <?php endif ?>
     
      <li class="dropdown">
              <a href="pages/products.php" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="pages/products.php">All Products</a></li>
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
<!--End of Nav Bar-->
<div class="container"> 
  <div class="row"> 
    <div class="col-md-12">
	     <div class="header">
        <h1>Customer Support</h1>
		      <h5> Welcome to the Customer Support Page. Please tell us your problem and we will reply 
		        as soon as possible.</h5> 
	     </div>
    </div>
  </div>

  <div class="row"> 
    <div class="col-md-12">
	
	<form method="GET" class="form form-horizontal" action="./report.php">
		<div>
			<label class="control-label">Comment/Inquiry:</label>
			<textarea name="comment" rows="5" cols="40" class="form-control"></textarea>
		</div>
		<br/>
		
		<div>
            <button type="submit" name="submit" class="btn btn-success" a href="customer-supp2.php">Submit</button>
		</div>
	</form>
	 </div>
  </div>
    <br/>
	
  <div class="row"> 
  <div class="col-md-12"> 
	
		<h2>Frequent Asked Questions (FAQ)</h2>
        <br/>
		
    <ol type="1">
			<li>How to purchase products</li>
				
				
			<li>How to avoid from buying the wrong products which you did not expect</li>
				<p>Always double check your shopping basket before checking out to payment.</p>
			
			<li>How to deal safely on Deallo</li>
				<p>You can always contact the seller or check on the reviews given by other customers before adding the products
				into your basket.</p>
			
			<li>Which payment should I choose?</li>
				<p>Paypal is highly recommended as it provides safe and secure transaction process for your payment.</p>
			
			<li>Getting Scammed?</li>
				<p>You may submit a report regarding the scammer or call our 24/7 hotline, 03-8888 9999 for help.</p>
    </ol>

      <br/>
      
    <h2>HAPPY SHOPPING</h2>   
    
    <br/>
  </div>
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
