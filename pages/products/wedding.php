<?php include "../../includes/sessions.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content="Deallo Product Category Page" />
	<meta name="keyword" content="HTML, CSS, Javascript" />
	<meta name="author" content="Selena Yap, Tay Guan Yun" />
	
	<title>Deallo Product - Wedding Accessories</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="../../styles/footer.css"/>
	
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
    
<div class="container-fluid">

	<div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 coverImage">
            <img src="../../images/cover-art/weddingCover.png" alt="Wedding art cover art" height="100%" class="img-responsive" width="100%"/>
        </div>
    </div>
	<hr/>
    
 </div>

<div class="container">
	<div class="row">
	
    
	<div class="row">
	
		<!--Category List-->
		<div class="list-group col-lg-3 col-md-3 col-sm-5 col-xs-6">
			<a href="clothingAcc.php" class="list-group-item">Clothing &amp; Accessories</a>
			<a href="jewelry.php" class="list-group-item">Jewelry</a>
			<a href="craftSupplies.php" class="list-group-item">Craft Supplies</a>
			<a href="bedding.php" class="list-group-item">Bedding &amp; Room Decor</a>
			<a href="softToys.php" class="list-group-item">Soft Toys</a>
			<a href="vintage.php" class="list-group-item">Vintage Art</a>
			<a href="#" class="list-group-item">Wedding Accessories</a>
			<a href="../myProducts.php" class="list-group-item">Sellers Center</a>
		</div>
		<br/>

	  <?php 
		include "../../includes/product_config.php";

		//Connect to database
		$conn = mysqli_connect("localhost", "root", "", "deallo_udb");
		if(mysqli_connect_errno())
		{
			echo "Failed to connect";
		}
		else
		{
			$category = "wedding";
			$query = mysqli_query($conn, "SELECT * FROM product WHERE category = '$category'") or die(mysqli_error($conn));
			$numrows = mysqli_num_rows($query);
		}
		
		if($numrows <= 0)
		{ echo '<div class="alert alert-danger col-lg-9 col-md-9 col-sm-7 col-xs-5">
				  <strong>Error: </strong> No items found.
				</div>'; }
		else
		{	
			while($row = mysqli_fetch_array($query))
			{
				//$category = $row['productCategory'];
				$name = $row['name'];
				$picture = $row['image'];
				$price = $row['price'];
				$productOwner = $row['product_owner'];
		?> 
		
		<!--Print out product details -->
		<div class="col-lg-3 col-md-3 col-sm-7 col-xs-6">
			<div class="well well-lg">
				<!--Print out product picture -->
				<img src="../../images/product_images/<?php echo $picture; ?>" class="img-responsive mx-auto d-block center-block" width="200" height="200"/>
					<!--Print out product name -->
					<div class="card-body">
					  <h3 class="card-title">
						<a href="pages/products.php"><?php echo $name; ?></a>
					  </h3>
						<!--Print out product price -->
					  <h4 class="product-price">
						  <?php echo "RM $price &nbsp &nbsp"; ?>
					  </h4>
					  <hr class="divider-owner"/>
					  <p><span class="glyphicon glyphicon-user"></span>&nbsp; &nbsp;<?php echo "$productOwner"; ?></p>
				  </div>
			</div>
		</div>
		
	<?php
            } //end of while loop
        } // end of else
		//Disconnect to database
        mysqli_close($conn);
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
<?php include "../../templates/footer.php" ?>

</html>
