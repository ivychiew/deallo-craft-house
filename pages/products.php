<?php
include "config.php";
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="keyword" content="HTML, CSS, Javascript" />
    <meta name="author" content=""/>
  
    <title>Deallo Craft House - Shopping Cart</title>
  <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <!--Custom CSS-->
    <link rel="stylesheet" href="..styles/cart_styles.css">
    <link rel="stylesheet" href="../styles/test.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/buttons.css">
    <link rel="stylesheet" href="../styles/product_modal.css">
    <link rel="stylesheet" href="../styles/products_styles.css">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
   <link rel="icon" type="image/png" href="../images/DealloLogo-favicon.png"/>
  
    <style>
        .badge-notify{
            background:red;
            position:relative;
            top: -15px;
            right: 1px;
        }
        .my-cart-icon-affix {
            position: fixed;
            z-index: 999;
        }
    </style>

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


<?php include "../templates/navbar.php" ?>

 <div class="container-fluid">
 <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <br>
           <img src="../images/cover-art/meetCover.jpg" class="img-responsive"/>
        </div>
        <!--end of column-->
      </div>

  <div class="row" style="padding-right: 15px;">
    <div class="col-lg-3 col-md-3">
    <br>
    <div class="category">

      <h3 align="center">Shop By Category</h3>
     
      <div class="list-group categories" style="padding-left: 50px;" align >
        <div class="category-list-group">
        <a href="products/clothingAcc.php" class="list-group-item">Clothing &amp; Accessories</a>
        <a href="products/jewelry.php" class="list-group-item">Jewelry</a>
        <a href="products/craftSupplies.php" class="list-group-item">Craft Supplies</a>
        <a href="products/bedding.php" class="list-group-item">Bedding &amp; Room Decor</a>
        <a href="products/softToys.php" class="list-group-item">Soft Toys</a>
        <a href="products/vintage.php" class="list-group-item">Vintage Art</a>
        <a href="products/wedding.php" class="list-group-item">Wedding Accessories</a>
        <a href="myProducts.php" class="list-group-item">Sellers Center</a>
        </div>
      </div>

    </div>
    <!-- <div class="well">
      -->
      <div class="ads" style="border-radius: 50px;">
        <img src="../images/ads/ad1.png" class="img-responsive"/>
      </div>
      
   <!--  </div> -->
      
    <div class="ads" style="border-radius: 50px;">
        <img src="../images/ads/ad1.png" class="img-responsive"/>
      </div>
      
    
  </div>
  <br>
   <div class="row" id="products" >
     <?php
        $stmt = $dbh->prepare("SELECT * FROM product");
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
        ?>
          <div class="col-md-2">
          <div class="well" style="background-color: white;">
            
              <img src="../images/product_images/<?php echo $row['image']; ?>" class="img-responsive mx-auto d-block" width="100px" height="100px" />
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
                      <img src="../images/product_images/<?php echo $row['image'] ?>" class="img-responsive"/> 
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.mycart.min.js"></script>
    <script>
      <?php include "../js/cart.js" ?>
    </script>
    <?php include "../templates/footer.php" ?>
</body>
</html>