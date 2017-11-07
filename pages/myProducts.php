<?php
include "../includes/sessions.php";
include "../includes/product_config.php";
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
	<meta name="keyword" content="HTML, CSS, Javascript" />
    <meta name="author" content=""/>

    <title>Product Page</title>
 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
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
              <a href="products.php" class="dropdown-toggle" data-toggle="dropdown" style="color: #577B84">Welcome <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
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
		  <a href="pages/products.php" class="dropdown-toggle" data-toggle="dropdown">Products <span class="caret"></span></a>
		  
		  <ul class="dropdown-menu">
			<li><a href="products.php">All Products</a></li>
			<li class="divider"></li>
			<li><a href="products/clothingAcc.php">Clothing &amp; Accessories</a></li>
			<li class="divider"></li>
			<li><a href="products/jewelry.php">Jewelry</a></li>
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
      <li><a href="#"> <span class="glyphicon glyphicon-shopping-cart"></span> &nbsp; Cart</a></li>
    </ul>
  </div>
</div>
<!--End of Nav Bar-->

<div class="container">

  <div class="page-header">
    <br>
      <h1 class="h2">My Products
        <a class="btn btn-default" href="addproducts.php"> 
          <span class="glyphicon glyphicon-plus"></span> &nbsp; Create a new product 
        </a>
        <a class="btn btn-default" href="editproducts.php"> 
          <span class="glyphicon glyphicon-plus"></span> &nbsp; Edit Products
        </a>
      </h1> 
    </div>
    
  <br/>

<div class="row" id="products">
<?php

	//Fetch the data from the database
      $stmt = $dbh->prepare("SELECT * FROM product");
	  
	  $stmt->bindParam(":owner", $_SESSION['username']);
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
    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-3 mb-4">
              <div class="card h-100">
                 <img src="../images/product_images/<?php echo $row['image']; ?>" align="middle" class="img-responsive mx-auto d-block" width="200px" height="200px" />
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $name ?></a>
                  </h4>
                  <h5>
                    <span class="product-price">
                      <?php echo "RM $price  &nbsp &nbsp"; ?>
                    </span>
                  </h5>
                <div class="col-sm-4card-text"><p><?php echo $summary; ?></p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="editButton">
                        <p> <!--Edit Product Button-->
                          <button class="btn btn-info" href="editform.php?edit_id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('Are you sure?')">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                          </button> 

                          <!--Delete Product Button-->
                          <button class="btn btn-danger" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('Are you sure ?')">
                            <span class="glyphicon glyphicon-remove-circle"></span> Delete
                          </button>
                        </p>
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
       
    <!-- Footer -->
	<footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Deallo's Craft House</p>
      </div>
      <!-- /.container -->
    </footer>

	<script type='text/javascript' src='../js/buttonToggle.js'></script>
	<!-- Bootstrap core JavaScript -->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>