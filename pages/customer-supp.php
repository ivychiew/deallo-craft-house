<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="Deallo Customer Support" />
	<meta name="author" content="Tay Guan Yun, Selena Yap" />
	<title>Customer Support Page</title>
	
	<!--BootStrap CSS -->
	
    <link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/products.css"/>
    
</head>

<body class="container-fluid" data-ng-app="myApp">
	
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
    

    <ul class="nav navbar-nav"><!--    unordered list start -->
      <li><a href="#"> <span class="glyphicon glyphicon-shopping-cart"></span> &nbsp; Cart</a></li>

      <li><a class="nav-link" href="../index.php?logout='1'">Sign Out</a></li>
      <li><a href="#">Questions?</a></li>
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
   
      <button type="button" class="btn btn-default navbar-btn" style="list-style-type: none;">
          <?php  if (isset($_SESSION['username'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="pages/profile.php">
                <span>Welcome <?php echo $_SESSION['username'] ?></span>
              </a>
             </li>
          <?php endif ?>
      </button>
   </ul><!--  unordered list end -->

    <div class="col-sm-3 col-md-3 pull-right">
      <form class="navbar-form" role="search">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
      </form>
    </div>
    
  </div>
</div> 
<!-- end of Navbar -->
 
	<div class="header">
        <h1>Customer Support</h1>
		<h5> Welcome to the Customer Support Page. Please tell us your problem and we will reply 
		as soon as possible.</h5>
         
	</div>
	
	<form method="GET" class="form form-horizontal" action="./report.php">
		<div>
			<label class="control-label">Email address</label>
			<input type="email" id="email" name="email" class="form-control">
		</div>
		
		<div>
			<label class="control-label">Comment/Inquiry:</label>
			<textarea name="comment" rows="5" cols="40" class="form-control"></textarea>
		</div>
		<br/>
		
		<div>
            <button type="submit" name="submit" class="btn btn-success" a href="customer-supp2.php">Submit</button>
		</div>
	</form>
	
    <br/>
	
	<p>
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
			
			<br/>
			
		<h2>HAPPY SHOPPING</h2>		
    </ol>
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
