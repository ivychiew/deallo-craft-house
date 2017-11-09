<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Deallo Product Category Page" />
	<meta name="keyword" content="HTML, CSS, Javascript" />
	<meta name="author" content="Tay Guan Yun" />
	
	<title>Deallo Craft House - Customer Support Page</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/products.css"/>
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

<body class="container-fluid" data-ng-app="myApp">

    <?php include '../templates/navbar.php' ?>	
 
	<div class="header">
        <h1>Product Category</h1>
		<h5>Search for your beloved product here in this search box.</h5>
	</div>
	
	<br/>
	
	<!--This is the search bar. Users will type in the keyword of the product. -->
	<form name="productsearch"  method="GET" action="./searchpage.php">
		<div class="row">
			<div class="col-xs-6 col-md-4">
				<div class="input-group">
					<input type="text" name="kw" pattern="[^'\x22]+" class="form-control" placeholder="Search" id="txtSearch"/>
						<div class="input-group-btn">
							<button class="btn btn-primary" type="submit">
							<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
				</div>
			</div>
		</div>
	</form>
	
	<p>
		<h2>List of Product Categories</h2>
        <br/>
		
    <ol type="1">
		<li><a href="./cloth_acce.php">Clothing &amp; Accessories</a></li>
		<li><a href="./jewelry.php">Jewelry</a></li>
		<li><a href="./craft.php">Craft Supply</a></li>
		<li><a href="./bedding.php">Bedding / Room Decoration</a></li>
		<li><a href="./soft_toy.php">Soft Toys</a></li>
		<li><a href="./vintage.php">Vintage Arts</a></li>
		<li><a href="./wedding.php">Wedding</a></li>
			
    </ol>
    
    <?php include '../templates/footer.php' ?>	

</body>

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

</html>
