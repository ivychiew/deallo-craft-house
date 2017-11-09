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
    <link rel="stylesheet" href="../styles/test.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/buttons.css">
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

<?php include "../templates/navbar_index.php" ?>
    <!-- Page Content -->
    <div class="container-fluid"" >
       <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <br>
           <img src="../images/cover-art/meetCover.jpg" class="img-responsive"/>
        </div>
        <!--end of column-->
      </div>
  <!--end of row-->

  <div class="row" style="padding-right: 15px;">
    <div class="col-lg-3 col-md-3">
    <br>
    <div class="well" style="background-color: white; ">
     
      <div class="ads" style="border-radius: 50px;">
        <img src="../images/ads/ad1.png" class="img-responsive"/>
      </div>
      
    </div>
      <div class="well" style="background-color: white; ">

      <h3 align="center">Shop By Category</h3>
     
      <div class="list-group categories" style="border-radius: 50px;">
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
    
  </div>
    <!-- /.col-lg-3 .col-md-3-->
   
    <!--Products Diplay-->
    <div class="col-lg-9 col-md-9" class="products">
    <div class="row">
    
      <h3> &nbsp; All Products </h3>
    
      
        <?php
        
          //Fetch the data from the database
          $stmt = $dbh->prepare('SELECT * FROM product');
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
          
           <div class="row" id="products">
     <?php
        $stmt = $dbh->prepare("SELECT * FROM product");
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
        ?>
          <div class="col-md-4">
          <div class="well h-100" style="background-color: white;">
            
              <img src="../images/product_images/<?php echo $row['image']; ?>" class="img-responsive mx-auto d-block" width="200px" height="200px" />
              <div class="text-center">
                <h4><?php echo $row['name'] ?></h4>
                <p><strong>Price</strong>: $<?php echo $row['price'] ?><br/></p>
                <p>
                    <button type="button" class="btn btn-danger my-cart-btn" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-summary="<?php echo $row['summary'] ?>" data-price="<?php echo $row['price'] ?>" data-quantity="<?php echo $row['quantity'] ?>" data-image="assets/images/<?php echo $row['image'] ?>">Add to Cart</button> 
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal-<?php echo $row['id'] ?>">Details</button>
                </p>
              </div>
            
          </div>
          </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal-<?php echo $row['id'] ?>" tabindex="-<?php echo $row['id'] ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['id'] ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel-<?php echo $row['id'] ?>"><?php echo $row['name'] ?></h4>
                  </div>
                  <div class="modal-body">
                    <img src="assets/images/<?php echo $row['image'] ?>" style="width:100%"/><br/>
                    <strong>Price</strong>: $<?php echo $row['price'] ?><br/>
                    <?php echo $row['summary'] ?>
                  </div>
                </div>
              </div>
            </div>
        <?php
            }
        }
        ?>
        </div>
          
        <?php
          } //end of while loop
        ?>
        </div>
        <?php 
        }
        ?>
        
        
      

        
        <?php 
        

     //end of row count > 0
      
        ?>
        <!--If Empty Data, Show no data found-->
          <!-- <div class="col-xs-12">
            <div class="alert alert-warning">
              <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
          </div> -->
      <!--   <?php
          
         
        ?>  -->
    </div>
    <!-- /.col-lg-9 -->
  </div>
  <!-- /.row -->
  </div>
  <!-- /.container-fluid -->

  <!-- footer -->
  <?php include '../templates/footer_index.php' ?>
  <!--   footer -->
  <!-- Bootstrap core JavaScript -->
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--Custom Javascript-->
  <script src="../js/cart.js"></script> 

  </body>

</html>