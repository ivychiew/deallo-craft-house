<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: pages/login.php');
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: pages/login.php");
  }

?>
<?php

	require_once '../includes/product_config.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT productPic FROM product_tbl WHERE productID =:pid');
		$stmt_select->execute(array(':pid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("..\images\product_images/".$imgRow['productPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM product_tbl WHERE productID =:pid');
		$stmt_delete->bindParam(':pid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: products.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Products</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

 
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
               <a class="nav-link" href="index.php?logout='1'" style="color: red;">Sign out</a>
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


<!-- <div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <a class="navbar-brand" href="http://www.codingcage.com" title='Programming Blog'>Coding Cage</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/CRUD">CRUD</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/PDO">PDO</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/jQuery">jQuery</a>
        </div>
 
    </div>
</div>
 -->
<div class="container">

	<div class="page-header">
		<br>
    	<h1 class="h2">All Products 
    		<a class="btn btn-default" href="addproducts.php"> 
    			<span class="glyphicon glyphicon-plus"></span> &nbsp; Create a new product 
    		</a>
    	</h1> 
    </div>
    
<br />



<div class="row">
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

				<!--Product Name-->
				<h3 class="page-header" align="center"><?php echo $productName ?></h3>
				<!--Product Image-->
				<img src="../images/product_images/<?php echo $row['productPic']; ?>" align="middle" class="img-rounded" width="250px" height="250px" />
				<!--Product Price-->
				<p class="page-header" align="center"><?php echo $productPrice; ?></p>
				<!--Product Description-->
				<!-- <p align="center"> --><!-- <?php echo $productDescription; ?></p> -->

				<!--Buttons-->

				<span> <!--Edit Product Button-->
					<a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['productID']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')">
						<span class="glyphicon glyphicon-edit"></span> Edit
					</a> 

						<!--Delete Product Button-->
					<a class="btn btn-danger" href="?delete_id=<?php echo $row['productID']; ?>" title="click for delete" onclick="return confirm('Are you sure ?')">
						<span class="glyphicon glyphicon-remove-circle"></span> Delete
					</a>
				</span>

				<!--Add to Cart Button-->
					 <!-- <a class="btn btn-info" href="#">
						<span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
					</a> -->
				
					<!--Show Description Button-->
					<script type='text/javascript' src='../js/buttonToggle.js'></script>
					<a class="btn btn-danger" title="click for more info" onclick="buttonToggle()"> More Info</a>
					
				
				
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
<div class="row">
	<div class="col-xs-3 col-md-3 col-lg-3">
	<br>
		<div id="Description" style="display:none;">
						<?php echo $productDescription; ?>
					</div>
	</div>
</div>
<!--End of container--> 
</div>


<!-- Latest compiled and minified JavaScript -->
<script src="../js/bootstrap.min.js"></script>
<script type='text/javascript' src='../js/buttonToggle.js'></script>

</body>
</html>