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

    <title>Deallo Craft House - Product Page</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/footer.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/buttons.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/products.css"/>
</head>
   
<body>

<?php include '../templates/navbar.php' ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <br/>
            <img src="../images/cover-art/meetCover.jpg" class="img-responsive"/>
        </div>
        <!--end of column-->
    </div>

      <div class="row" style="padding-right: 15px;">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
      <br>
      <div class="category">
        <h3 align="center">Shop By Category</h3>
        <div class="list-group categories" style="padding-left: 50px;" align >
            <div class="list-group">
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

       <!-- </div> -->

        <div class="ads" style="border-radius: 50px;">
            <img src="../images/ads/ad1.png" class="img-responsive"/>
          </div>


      </div>
      <br>
    <!--end of row-->

      <div class="page-header">
      
          <h1 class="h2">My Products
            <a class="btn btn-default" href="addproducts.php"> 
              <span class="glyphicon glyphicon-plus"></span> &nbsp; Create a new product 
            </a>
            <!-- <a class="btn btn-default" href="editproducts.php"> 
              <span class="glyphicon glyphicon-plus"></span> &nbsp; Edit Products
            </a> -->
          </h1> 
        </div>

      <br/>

    <div class="row" id="products">
        <?php

            //Fetch the data from the database
            $stmt = $dbh->prepare("SELECT * FROM product WHERE product_owner =:owner ORDER BY id DESC");

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
      <div class="col-lg-2 col-md-2">
              <div class="well" style="background-color: white;">

                  <img src="../images/product_images/<?php echo $row['image']; ?>" class="img-responsive mx-auto d-block" width="100px" height="100px" />
                  <div class="text-center">
                    <h5><?php echo $row['name'] ?></h5>
                    <p><strong>Price</strong>: RM<?php echo $row['price'] ?><br/></p>
                        <!--Edit Product Button-->
                        <span> 
                          <a class="btn btn-default" href="editform.php?edit_id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('Are you sure?')">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                          </a> 

                          <!--Delete Product Button-->
                          <a class="btn btn-link" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('Are you sure ?')">
                            <span class="glyphicon glyphicon-remove-circle"></span> Delete
                          </a>
                        </span>
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
            <div class="col-lg-12 col-mg-12 col-sm-12 col-xs-12">
              <div class="alert alert-warning">
                  <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
                </div>
            </div>
            <?php
      }

    ?>
    </div>  
    </div>
</div>


	<!-- Bootstrap core JavaScript -->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

<?php include "../js/cart.js" ?>
<?php include '../templates/footer.php' ?>
    
</html>