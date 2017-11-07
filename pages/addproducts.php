<?php include "..\includes\addproducts_config.php" ?>
<?php include "..\includes\sessions.php" ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <title>Deallo Craft House - Add new product</title>

  <!--Nav and Footer Stylesheet--> 

	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css">
    <link rel="stylesheet" type="text/css" href="../styles/products.css">
    <link rel="stylesheet" href="style.css">
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
    
<div class="container" style="padding-bottom: 20px; ">


  <div class="page-header">
  <br>
      <h1 class="h2">Add a New Product. <a class="btn btn-default" href="products.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View All </a></h1>
      
    </div>
    

  <?php
  if(isset($errMSG)){
      ?>
            <div class="alert alert-danger">
              <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
  }
  else if(isset($successMSG)){
    ?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
  }
  ?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
      
  <table class="table table-bordered table-responsive">
  
    <tr>
      <td><label class="control-label">Product Name:</label></td>
        <td><input class="form-control" type="text" name="product_name" placeholder="Enter product name" value="<?php echo $productname; ?>" /></td>
    </tr>
    
    <tr>
      <td><label class="control-label">Price (RM):</label></td>
        <td><input class="form-control" type="text" name="product_price" placeholder="$" value="<?php echo $productprice; ?>" /></td>
    </tr>
    
    <tr>
      <td><label class="control-label">Product Image</label></td>
      <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>


    <tr>
      <td><label class="control-label">Product Description:</label></td>
        <td><input class="form-control" type="text" name="product_description" placeholder="Enter Product Description" value="<?php echo $productdesc; ?>" /></td>
    </tr>
  
    <tr> 
      <td><label class="control-label">Select Category</label></td>
      <td>
            <select name="product_category" value="<?php echo $producategory ?>">
                <option>...</option>
                <option>Clothing &amp; Accessories</option>
                <option>Jewelry</option>
                <option>Craft Supplies</option>
                <option>Bedding &amp; Room Decor</option>
                <option>Soft Toys</option>
                <option>Vintage Art</option>
                <option>Wedding Accessories</option>
                <option>Food</option>
            </select>
      </td>
    </tr>
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Uploaded!
        </button>
        </td>
    </tr>
    </table>
    
</form>


</div>

   <!-- Footer -->
  <footer class="navbar-fixed-bottom py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Deallo's Craft House</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Latest compiled and minified JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="jquery-1.11.3-jquery.min.js"></script>

</body>
</html>