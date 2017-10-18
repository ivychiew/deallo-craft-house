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
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css.min">


    <!-- custom stylesheet -->
    <link rel="stylesheet" href="../styles/product_modal.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
   <!--  <script src="jquery-1.11.3-jquery.min.js"></script> -->
    </head>
   

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
         
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <?php  if (isset($_SESSION['username'])) : ?>
         
             <li class="nav-item">
               <a class="nav-link" href="../index.php?logout='1'" style="color: red;">Sign out</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="profile.php">Edit Profile</a>
             </li>

             <?php endif ?>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Shopping Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

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
  
              <div class="card h-100">
                 <img src="../images/product_images/<?php echo $row['productPic']; ?>" align="middle" class="img-responsive mx-auto d-block" width="200px" height="200px" />

                <div class="card-body">
                  <h4 class="card-title">
                    <span id="myBtn"><?php echo $productName ?></span>
                  </h4>

                 <!--Modal Box-->
              <div class="container">
                <div class="card"> 

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


<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type='text/javascript' src='../js/buttonToggle.js'></script>
<script type='text/javascript' src='../js/modal.js'></script>
</body>
</html>