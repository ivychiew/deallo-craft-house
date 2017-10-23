<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Rating Page</title>

<!--Bootstrap-->
   <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/products.css"/>

    <!-- Latest compiled and minified JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
   <style>.jumbotron{background-image:url("../images/feedback.jpg"); background-repeat:no-repeat; background-size:cover;}</style>
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
<!--End of Nav Bar-->
<div class="container">

	<div class="container">
	  <div class="jumbotron">
		<h1>Shop Feedback</h1> 
		<p>As customers of our shop, we provide users the ability to give feedback on their experience on transactions. Users who exceed our threshold
		value will be stand a chance to be featured for Recommended Sellers! </p> 
	  </div>
	</div>

	<!-- Media top -->
	<div class="media">
	  <div class="media-left media-top">
		<img src="../images/adminProfile.png" class="media-object" style="width:60px">
	  </div>
	  <div class="media-body">
		<h4 class="media-heading">Media Top</h4>
		<p>Lorem ipsum...</p>
	  </div>
	</div>

	<!-- Media middle -->
	<div class="media">
	  <div class="media-left media-middle">
		<img src="../images/adminProfile.png" class="media-object" style="width:60px">
	  </div>
	  <div class="media-body">
		<h4 class="media-heading">Media Middle</h4>
		<p>Lorem ipsum...</p>
	  </div>
	</div>

	<!-- Media bottom -->
	<div class="media">
	  <div class="media-left media-bottom">
		<img src="../images/adminProfile.png" class="media-object" style="width:60px">
	  </div>
	  <div class="media-body">
		<h4 class="media-heading">Media Bottom</h4>
		<p>Lorem ipsum...</p>
	  </div>
	</div>

</div>


<!-- Latest compiled and minified JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>
</html>