<!--Include User Session Script-->
<?php include '../includes/sessions.php' ?>
<!--Include Delete Products Config-->
<?php include '../includes/products_delete.php' ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product Page</title>

<!--Bootstrap-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <!-- custom stylesheet -->
    <link rel="stylesheet" href="../styles/product_modal.css">
    <link rel="stylesheet" href="../styles/test.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <!--  <script src="jquery-1.11.3-jquery.min.js"></script> -->
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
    
    <?php  if (isset($_SESSION['username'])) : ?>
    <ul class="nav navbar-nav"><!--    unordered list start -->
    <li class="dropdown">
              <a href="pages/products.php" class="dropdown-toggle" data-toggle="dropdown" style="color: #577B84">Welcome <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php">Edit Profile</a></li>
                <li class="divider"></li>
                <li><a class="nav-link" href="index.php?logout='1'">Sign Out</a></li>
              </ul>
            </li>
       <?php endif ?>
     
      <li><a href="#"> <span class="glyphicon glyphicon-shopping-cart"></span> &nbsp; Cart</a></li>
      <li><a href="customer-supp.php">Questions?</a></li>
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
    		<a class="btn btn-default" href="editproducts.php"> 
    			<span class="glyphicon glyphicon-plus"></span> &nbsp; Edit Products
    		</a>
    	</h1> 
    </div>
    
	<br />

<div class="row" id="products">
<?php
	
    	//Fetch the data from the database
    	$stmt = $DB_con->prepare('SELECT productID, productName, productPrice, productPic, productDescription FROM product_tbl ORDER BY productID DESC');
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
  
              <div class="well h-100">
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
                      
                    </div>
                    <div class="modal-footer">

                      <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">Select Colour
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">HTML</a></li>
                          <li><a href="#">CSS</a></li>
                          <li><a href="#">JavaScript</a></li>
                        </ul>
                      </div>
                      <div class="cart">
                           <button class="btn btn-info" href="#">Add to cart</button>
                      </div>
                    </div>
                  </div>
                </div>
               
              </div>
          <!--Modal Box end-->

                  <h5>
                    <span class="product-price">
                      <?php echo "RM $productPrice  &nbsp &nbsp"; ?>
                    </span>
                  </h5>

                <div class="col-sm-4card-text"><?php echo $productDescription; ?></div>
                <br>
                <div class="col-xs-3">
                      <div class="cart">
                           <button class="btn btn-info" href="#">Add to cart</button>
                           
                      </div>
                </div>
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
</div>

<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Deallo's Craft House</p>
  </div>
<!-- /.container -->
</footer>

<!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type='text/javascript' src='../js/buttonToggle.js'></script>
<script type='text/javascript' src='../js/modal.js'></script>
</body>
</html>