<?php
include "../includes/sessions.php";
include "../includes/product_config.php";

$angka = substr(uniqid(rand(), true), 7, 7);
$order = preg_replace("/[^0-9]/", "",$angka);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>

    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/test.css">

    <style>
        /*Styles for the Red Numbered Cart Image */
        .badge-notify{
            background:red;
            position:relative;
            top: -15px;
            right: 1px;
        }
       
    </style>
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
              <a href="pages/products.php" class="dropdown-toggle" data-toggle="dropdown" style="color: #577B84">Welcome <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="pages/profile.php">Edit Profile</a></li>
                <li class="divider"></li>
                <li><a class="nav-link" href="../index.php?logout='1'">Sign Out</a></li>
                 <li class="divider"></li>
                <li><a href="pages/customer-supp.php">Questions?</a></li>
              </ul>
            </li>
       <?php endif ?>
     
      <li class="dropdown">
		  <a href="pages/products.php" class="dropdown-toggle" data-toggle="dropdown">Products <span class="caret"></span></a>
		  
		  <ul class="dropdown-menu">
			<li><a href="../products.php">All Products</a></li>
			<li class="divider"></li>
			<li><a href="clothingAcc.php">Clothing &amp; Accessories</a></li>
			<li class="divider"></li>
			<li><a href="jewelry.php">Jewelry</a></li>
			<li class="divider"></li>
			<li><a href="craftSupplies.php">Craft Supplies</a></li>
			<li class="divider"></li>
			<li><a href="bedding.php">Bedding &amp; Room Decor</a></li>
			<li class="divider"></li>
			<li><a href="softToys.php">Soft Toys</a></li>
			<li class="divider"></li>
			<li><a href="vintage.php">Vintage Art</a></li>
			<li class="divider"></li>
			<li><a href="wedding.php">Wedding Accessories</a></li>
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

  <!--Products Container Start--> 
   <div class="row" id="products">
      <?php
        $stmt = $DB_con->prepare("SELECT * FROM product_tbl");
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
        ?>
          <div class="col-md-3">
              <div class="well h-100" style="background-color: white;">
                 <img src="../images/product_images/<?php echo $row['productPic']; ?>" class="img-responsive mx-auto d-block" width="200px" height="200px" />

              <div class="caption text-center">
                <h4><?php echo $row['productName'] ?></h4>
                <p><strong>Price</strong>: $<?php echo $row['productPrice'] ?><br/></p>

                <!-- Add to Cart Button -->
                <span>
                    <a class="btn btn-danger my-cart-btn" 
                    data-id="<?php echo $row['productID'] ?>" 
                    data-name="<?php echo $row['productName'] ?>" 
                    data-summary="<?php echo $row['productDescription'] ?>" 
                    data-price="<?php echo $row['productPrice'] ?>" data-quantity="<?php echo $row['productQuantity'] ?>" data-image="../images/product_images/<?php echo $row['productPic'] ?>">Add to Cart</a> 
                <!--End of Add to Cart Button-->
                <!-- Pop up Details Modal Button -->
                    <a class="btn btn-warning" 
                    data-toggle="modal" 
                    data-target="#myModal-<?php echo $row['productID'] ?>">Details</a>
                <!--End of Details Modal Button-->
                </span>
              </div>
            </div>
          </div>
           <!--Pop Up Modal-->
              <div class="modal fade" 
              id="myModal-<?php echo $row['productID'] ?>" 
              tabindex="-<?php echo $row['productID'] ?>" 
              role="dialog" 
              aria-labelledby="myModalLabel-<?php echo $row['productID'] ?>">

              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel-<?php echo $row['productID'] ?>"><?php echo $row['productName'] ?></h4>
                  </div>
                  <div class="modal-body">
                    <img src="../images/product_images/<?php echo $row['productPic']; ?>" style="height:300px; width:300px;"/>
                    <hr>
                    <strong>Price</strong>: $<?php echo $row['productPrice'] ?><br/>
                    <?php echo $row['productDescription'] ?>
                  </div>
                </div>
              </div>
            </div>
            <!--End of Modal-->
        <?php
            }
        }
        ?>
        </div>
        <!--Products End-->
    </div> <!--Container End--> 
</div>  

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.mycart.min.js"></script>
    <script src="../js/jquery.mycart.js"></script>
    <script src="../js/cart.js"></script>
    <script>
    function shoppingcart(allid,allquantity,allprice)
    {
      var myorder = "<?php echo $order ?>";
       $.post('order.php',{ui:'8', id:allid, aq:allquantity, ap:allprice, shopping:'shopping', order:myorder});
    }
    </script>
    
</body>
</html>