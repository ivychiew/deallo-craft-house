<?php include 'includes/sessions.php' ?>
<?php include 'includes/product_config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
	  <meta name="keyword" content="HTML, CSS, Javascript"/>
    <meta name="author" content="Vivien, Selena"/>
	
    <title>Deallo Craft House - Homepage</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="styles/footer.css"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	  <link rel="icon" type="image/png" href="images/DealloLogo-favicon.png"/>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 
    elements and media queries --> 
    <!-- WARNING: Respond.js doesn't work if you view the 
    page via file:// --> 
    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script> 
    <script src="js/respond.min.js"></script> 
    <![endif]--> 
</head>

<body class="index_bg">
<?php include "templates/navbar_index.php" ?>


<body>
    <!-- Page Content -->
    <div class="container-fluid"" >
	     <div class="row">
	       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	       <br>
	         <?php include 'templates/carousel_slides.php' ?>
		    </div>
    		<!--end of column-->
    	</div>
	<!--end of row-->

	<div class="row" style="padding-right: 15px;">
		<div class="col-lg-3 col-md-3">
    <br>
    <div class="well" style="background-color: white; ">
     
      <div class="ads" style="border-radius: 50px;">
        <img src="images/ads/ad1.png" class="img-responsive"/>
      </div>
      
    </div>
      <div class="well" style="background-color: white; ">

		  <h3 align="center">Shop By Category</h3>
		 
		  <div class="list-group categories" style="border-radius: 50px;">
        <div class="category-list-group">
  			<a href="pages/products/clothingAcc.php" class="list-group-item">Clothing &amp; Accessories</a>
  			<a href="pages/products/jewelry.php" class="list-group-item">Jewelry</a>
  			<a href="pages/products/craftSupplies.php" class="list-group-item">Craft Supplies</a>
  			<a href="pages/products/bedding.php" class="list-group-item">Bedding &amp; Room Decor</a>
  			<a href="pages/products/softToys.php" class="list-group-item">Soft Toys</a>
  			<a href="pages/products/vintage.php" class="list-group-item">Vintage Art</a>
  			<a href="pages/products/wedding.php" class="list-group-item">Wedding Accessories</a>
  			<a href="pages/myProducts.php" class="list-group-item">Sellers Center</a>
        </div>
		  </div>

		</div>
    
	</div>
    <!-- /.col-lg-3 .col-md-3-->
    <div class="col-lg-9 col-md-9">
    <div class="row">
    <br>
    <div class="well" style="background-color: white;">
    <div class="welcome_heading" align="center">
    <img src="images/watercolor.png" class="img-responsive" style="max-width: 100px; max-height: 100px;"/>
    <h2> Share your creativity with others: <a href="pages/addproducts.php" class="btn btn-danger my-cart-btn">Add an item for sell</a></h2>

    </div>
    </div>
    </div>
    </div>
		<!--Products Diplay-->
		<div class="col-lg-9 col-md-9" class="products">
		<div class="row">
    
      <h3> &nbsp; Bedding & Room Decor </h3>
    
      
			  <?php
			  
				  //Fetch the data from the database
				  $stmt = $dbh->prepare('SELECT * FROM product WHERE category= "Bedding & Room Decor" LIMIT 4 OFFSET 0');
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
					
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

					  <br/>
							  <div class="well well-lg" style="background-color: white;">

								 <img src="images/product_images/<?php echo $row['image']; ?>" alt="Product Image" align="middle" class="img-responsive mx-auto d-block" width="200" height="200" />

								<div class="card-body">
								  <h5 class="card-title">
									<a href="pages/products.php"><?php echo $name ?></a>
								  </h5>
								  <p class="product-price">
									  RM <?php echo $price; ?>
								  </p>
								  
								  <hr class="divider-owner"/>
								  <p><span class="glyphicon glyphicon-user"></span>&nbsp; &nbsp;<?php echo $row['product_owner']; ?></p>
							  </div>
							</div>
					</div>
					
				<?php
					} //end of while loop
				?>
				</div>
        <?php 
        }
        ?>
				
				
        <div class="row">
         <h3> &nbsp; Homemade Snacks </h3>
        <?php
        
          //Fetch the data from the database
          $stmt = $dbh->prepare('SELECT * FROM product WHERE category= "Food" LIMIT 4 OFFSET 0');
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
          
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

            <br/>
                <div class="well well-lg" style="background-color: white;">

                 <img src="images/product_images/<?php echo $row['image']; ?>" alt="Product Image" align="middle" class="img-responsive mx-auto d-block" width="200" height="200" />

                <div class="card-body">
                  <h5 class="card-title">
                  <a href="pages/products.php" ><?php echo $name ?></a>
                  </h5>
                  <p class="product-price">
                    <?php echo "RM $price  &nbsp &nbsp"; ?>
                  </p>
                  
                  <hr class="divider-owner"/>
                  <p><span class="glyphicon glyphicon-user"></span>&nbsp; &nbsp;<?php echo $row['product_owner']; ?></p>
                </div>
              </div>
          </div>
          
        <?php
          } //end of while loop
        ?>
        </div>

        
        <?php 
        }

     //end of row count > 0
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
		<!-- /.col-lg-9 -->
	</div>
	<!-- /.row -->
  </div>
  <!-- /.container-fluid -->

  <!-- footer -->
  <?php include 'templates/footer.php' ?>
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