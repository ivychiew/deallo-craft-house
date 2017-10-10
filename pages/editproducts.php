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

<!--Bootstrap-->
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css.min">


    <!-- custom stylesheet -->
    <link rel="stylesheet" href="../styles/products_css.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
   <!--  <script src="jquery-1.11.3-jquery.min.js"></script> -->
    </head>
   

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

       

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
         
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <?php  if (isset($_SESSION['username'])) : ?>
            <!-- <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p> -->
           <!--  <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p> -->
         
             <li class="nav-item">
               <a class="nav-link" href="../index.php?logout='1'" style="color: red;">Sign out</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="pages/profile.php">Edit Profile</a>
             </li>

             <?php endif ?>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Shopping Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<div class="container">

	<div class="page-header">
		<br>
    	<h1 class="h2"><a href="products.php">All Products</a>
    		<a class="btn btn-default" href="addproducts.php"> 
    			<span class="glyphicon glyphicon-plus"></span> &nbsp; Create a new product 
    		</a>
    		<a class="btn btn-default" href="editproducts.php"> 
    			<span class="glyphicon glyphicon-plus"></span> &nbsp; Edit Products
    		</a>
    	</h1> 
    </div>
    
	<br />

<div class="row" id="products">
<?php
	
	//Fetch the data from the database
	$stmt = $DB_con->prepare('SELECT productID, productName, productPrice, productPic, productDescription FROM product_tbl ORDER BY productID DESC');
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
			<div class="col-xs-3">

				
				<!--Product Image-->
				<img src="../images/product_images/<?php echo $row['productPic']; ?>" align="middle" class="img-rounded" width="200px" height="200px" />
        <!--Product Name-->
        <h3 class="page-header" align="center"><?php echo $productName ?></h3>
				<!--Product Price-->
				<h5 class="page-header" align="center"><?php echo "RM: $productPrice"; ?></h5>
				<!-- <p id="Description" style="display:none;">
					<?php
					 // echo "$productDescription;" ?>
				</p> -->

				<!--Buttons-->
        <div class="editButton"
				<span> <!--Edit Product Button-->
					<a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['productID']; ?>" title="click for edit" onclick="return confirm('Are you sure?')">
						<span class="glyphicon glyphicon-edit"></span> Edit
					</a> 

						<!--Delete Product Button-->
					<a class="btn btn-danger" href="?delete_id=<?php echo $row['productID']; ?>" title="click for delete" onclick="return confirm('Are you sure ?')">
						<span class="glyphicon glyphicon-remove-circle"></span> Delete
					</a>
				</span>
        </div>

				<!--Add to Cart Button-->
					<!--  <a class="btn btn-info" href="#">
						<span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
					</a> -->
				
					<!--Show Description Button-->
					<!-- <script type='text/javascript' src='../js/buttonToggle.js'></script>
					<a class="btn btn-danger" title="click for more info" onclick="buttonToggle()"> More Info</a>
 -->      
          <hr>
					<br>
		
				
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