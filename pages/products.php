<!--Include User Session Script-->
<?php include '../includes/sessions.php' ?>
<!--Include Delete Products Config-->
<?php include '../includes/products_delete.php' ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Deallo Product Category Page" />
	<meta name="keyword" content="HTML, CSS, Javascript" />
	<meta name="author" content="" />
	<title>Deallo All Products</title>
    
    <link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
    
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
				  <a href="" class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo $_SESSION['username'] ?> <b class="caret"></b></a>
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

	<div class="page-header">
		<br>
    	<h1 class="h2">All Products
    		<a class="btn btn-default" href="addproducts.php"> 
    			<span class="glyphicon glyphicon-plus"></span> &nbsp; Create a new product 
    		</a>
    		<a class="btn btn-default" href="myProducts.php"> 
    			<span class="glyphicon glyphicon-book"></span> &nbsp; My Products
    		</a>
    	</h1> 
    </div>
    
	<br />

<div class="row" id="products">
<?php
	
    	//Fetch the data from the database
    	$stmt = $DB_con->prepare('SELECT productID, productName, productPrice, productPic, productDescription, product_owner FROM product_tbl ORDER BY productID DESC');
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
   <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
      <div class="well" style="background-color: white;">
        <img src="../images/product_images/<?php echo $row['productPic']; ?>" align="middle" class="img-responsive mx-auto d-block" width="200px" height="200px" />

          <div class="well-body">
            <h4 class="well-title">
              <span id="myBtn"><?php echo $productName ?></span>
            </h4>

          <!--Modal Box-->
          <div class="container">
                <div id="myModal" class="modal">
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                      <img src="../images/product_images/<?php echo $row['productPic']; ?>" align="middle" class="img-responsive mx-auto d-block" width="200px" height="200px" />
                      <h3><?php echo $productName ?></h3>
                      <br>
                      <h4><?php echo "RM $productPrice  &nbsp &nbsp"; ?></h4>
                      <p><?php echo $productDescription; ?></p>
                      
                       <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">Select Colour
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">HTML</a></li>
                          <li><a href="#">CSS</a></li>
                          <li><a href="#">JavaScript</a></li>
                        </ul>
                      </div>
                      
                        <button class="btn btn-info" href="#">Add to cart</button>
                        </div>
                      </div>
                    </div>
                  </div>
          <!--Modal Box end-->
                  <h5>
                    <strong class="product-price">
                      <?php echo "RM $productPrice"; ?>
                    </strong>
                  </h5>

                <div class="col-sm-4card-text"><?php echo $productDescription; ?></div>
   
				 <hr class="divider-owner"/>
					<p><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $row['product_owner']; ?></p>
				 
                  <span> <!--Edit Product Button-->
                  <a class="btn btn-info" href="#" title="Add to Cart" onclick="return confirm('Add to Cart?')">
                      <span class="glyphicon glyphicon-cart"></span> Add to Cart &nbsp;</a>
                 </span>
                <br/>
              </div> <!-- End of Well Body-->
          </div>
        </div>

			<?php
		}
	}
	else
	{
		?>

		<!--If Empty Data, Show no data found-->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}
	
?>
</div>	

	<ul class="pagination">
	  <li class="active"><a href="#">1</a></li>
	  <li><a href="#">2</a></li>
	  <li><a href="#">3</a></li>
	  <li><a href="#">4</a></li>
	  <li><a href="#">5</a></li>
	</ul>
</div>

<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Deallo's Craft House</p>
  </div>
<!-- /.container -->
</footer>

	<!-- Bootstrap core JavaScript -->
	<!--   <script src="../js/bootstrap.min.js"></script> -->
	  <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>