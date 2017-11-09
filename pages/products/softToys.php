<?php include '../../includes/sessions.php' ?>
<?php include '../../includes/product_config.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content="Deallo Product Category Page"/>
	<meta name="keyword" content="HTML, CSS, Javascript"/>
	<meta name="author" content="Selena Yap, Tay Guan Yun"/>
	
	<title>Deallo Product - Bedding and Room Decor</title>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="../../styles/footer.css"/>
    <link rel="stylesheet" type="text/css" href="../../styles/buttons.css"/> 
	
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
<?php include "../../templates/navbar_product_pages.php" ?>
<div class="container">

	<div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 coverImage">
            <img src="../../images/cover-art/toysCover.jpg" alt="Bedding decor cover art" height="100%" class="img-responsive" width="100%"/>
        </div>
    </div>
	<hr/>
    
 

    
	<div class="row">
	
		<!--Category List-->
		<div class="list-group col-lg-3 col-md-3 col-sm-5 col-xs-6">
    <br>
			<a href="clothingAcc.php" class="list-group-item">Clothing &amp; Accessories</a>
			<a href="jewelry.php" class="list-group-item">Jewelry</a>
			<a href="craftSupplies.php" class="list-group-item">Craft Supplies</a>
			<a href="bedding.php" class="list-group-item">Bedding &amp; Room Decor</a>
			<a href="softToys.php" class="list-group-item">Soft Toys</a>
			<a href="vintage.php" class="list-group-item">Vintage Art</a>
			<a href="wedding.php" class="list-group-item">Wedding Accessories</a>
			<a href="../myProducts.php" class="list-group-item">Sellers Center</a>
		</div>
		<br/>

	 
		<!--Print out product details -->
	<div class="row" id="products" >
     <?php
        $stmt = $dbh->prepare('SELECT * FROM product WHERE category= "Soft Toys" LIMIT 4 OFFSET 0');
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
        ?>
          <div class="col-md-2">
          <div class="well" style="background-color: white;">
            
              <img src="../../images/product_images/<?php echo $row['image']; ?>" class="img-responsive mx-auto d-block" width="100px" height="100px" />
              <div class="text-center">
                <h5><?php echo $row['name'] ?></h5>
                <p><strong>Price</strong>: RM<?php echo $row['price'] ?><br/></p>
                <p>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal-<?php echo $row['id'] ?>">Details</button>
                </p>
              </div>
            
          </div>
          </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal-<?php echo $row['id'] ?>" tabindex="-<?php echo $row['id'] ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['id'] ?>">
            <!--Modal Dialog-->
              <div class="modal-dialog" role="document">
              <!--Modal Content-->
                <div class="modal-content">
                  <!--Modal Body-->
                  <div class="modal-body">
                    <div class="row"> 
                      <div class="col-md-6 product_img">
                      <img src="../../images/product_images/<?php echo $row['image'] ?>" class="img-responsive"/> 
                      </div>
                       
                       <div class="col-md-6 product_content">
                       <h3>  RM<?php echo $row['price'] ?><br/></h3>
                       <h3><?php echo $row['name'] ?></h3>
                       <p>Product ID: <span><?php echo $row['id'] ?></span></p>
                       <div class="well">
                       <h5><?php echo $row['summary'] ?></h5>
                       </div>
                       <br>
                       
                          
                        <div class="row">
                          <div class="col-md-4 col-sm-6 col-xs-12">

                                <select class="form-control" name="select">
                                    <option value="" selected="">Color</option>
                                    <option value="black">Black</option>
                                    <option value="white">White</option>
                                    <option value="gold">Gold</option>
                                    <option value="rose gold">Rose Gold</option>
                                </select>
                            </div>
                            <!-- end col -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <select class="form-control" name="select">
                                    <option value="">Size</option>
                                    <option value="">XS</option>
                                    <option value="">S</option>
                                    <option value="">M</option>
                                    <option value="">L</option>
                                </select>
                            </div>
                            <!-- end col -->
                            <div class="col-md-4 col-sm-12">
                                
                                    <input type="number" name="quantity" min="1" max="99" placeholder="Quantity" style="width: 100px; height: 30px;">
                                
                            </div>
                            <!-- end col -->
                          </div>
                       <div class="space-ten"></div>
                        
                    <button type="button" class="btn btn-md btn-default my-cart-btn" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-summary="<?php echo $row['summary'] ?>" data-price="<?php echo $row['price'] ?>" data-quantity="<?php echo $row['quantity'] ?>" data-image="../images/product_images/<?php echo $row['image'] ?>">Add to Cart</button> 
                    </div></div>
                  </div>
                  </div>
                </div>
                </div>

        <?php
            }
        }
        ?>
        </div>
	
	</div>
	
	</div>
	
	</div>
	</div>
    
	<!-- Bootstrap core JavaScript -->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</body>
 <?php include "../../templates/footer_products.php" ?>

</html>
