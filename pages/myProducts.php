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

    <!-- custom stylesheet -->
    <link rel="stylesheet" href="../styles/products_css.css">

 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/products.css"/>
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

<div class="container">

  <div class="page-header">
    <br>
      <h1 class="h2">My Products
        <a class="btn btn-default" href="addproducts.php"> 
          <span class="glyphicon glyphicon-plus"></span> &nbsp; Create a new product 
        </a>
        <a class="btn btn-default" href="products.php"> 
          <span class="glyphicon glyphicon-chevron-left"></span> &nbsp; Back to products page
        </a>
      </h1> 
    </div>
    
  <br />

<div class="row" id="products">
<?php

	//Fetch the data from the database
      $stmt = $DB_con->prepare("SELECT productID, productName, productPrice, productPic, productDescription,product_owner FROM product_tbl WHERE product_owner =:owner ORDER BY productID DESC ");
	  
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
    <div class="col-md-3">
      <div class="well" style="background-color: white;">
        <img src="../images/product_images/<?php echo $row['productPic']; ?>" align="middle" class="img-responsive mx-auto d-block" width="200px" height="200px" />

          <div class="well-body">
            <h4 class="well-title">
              <span id="myBtn"><?php echo $productName ?></span>
            </h4>

                  <h5>
                    <span class="product-price">
                      <?php echo "RM $productPrice  &nbsp &nbsp"; ?>
                    </span>
                  </h5>

                <div class="col-sm-4card-text"><?php echo $productDescription; ?></div>
                 <br>
                  <span> <!--Edit Product Button-->
                  <a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['productID']; ?>" title="click for edit" onclick="return confirm('Are you sure?')">
                      <span class="glyphicon glyphicon-edit"></span> Edit &nbsp;</a>
                 <!--Delete Product Button-->
                  <a class="btn btn-danger" href="?delete_id=<?php echo $row['productID']; ?>" title="click for delete" onclick="return confirm('Are you sure ?')">
                 <span class="glyphicon glyphicon-remove-circle"></span> Delete  </a>

                 </span>
                 </span>
                <br>
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
<script src="../js/bootstrap.min.js"></script>
<script type='text/javascript' src='../js/buttonToggle.js'></script>

</body>
</html>