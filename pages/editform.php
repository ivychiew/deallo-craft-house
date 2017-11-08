<?php include "../includes/editproducts_config.php" ?>
<?php include "../includes/sessions.php" ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <title>Deallo Craft House -  Edit Product</title>

	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css.min">

	<!--Custom CSS-->
    <link rel="stylesheet" href="../styles/products_css.css">
	<link rel="icon" type="image/png" href="../images/DealloLogo-favicon.png">
	
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

<div class="container">

    <div class="page-header">
        <br>
        <h1 class="h2">Update Product. <a class="btn btn-default" href="myProducts.php"> Return to your product page</a></h1>
    </div>

	<div class="clearfix"></div>

	<form method="post" enctype="multipart/form-data" class="form-horizontal">
    
		<?php
		if(isset($errMSG)){
			?>
			<div class="alert alert-danger">
			  <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
			</div>
			<?php
		}
		?>
	   
		<table class="table table-bordered table-responsive">
		
			<tr>
				<td><label class="control-label">Product Name</label></td>
				<td><input class="form-control" type="text" name="product_name" value="<?php echo $name ?>" required /></td>
			</tr>
			
			<tr>
				<td><label class="control-label">Price</label></td>
				<td><input class="form-control" type="text" name="product_price" value="<?php echo $price ?>" required /></td>
			</tr>
			
			<tr>
				<td><label class="control-label">Product Image</label></td>
				<td>
					<p><img src="../images/product_images/<?php echo $image ?>" height="150" width="150" /></p>
					<input class="input-group" type="file" name="product_image" accept="image/*" />
				</td>
			</tr>

			<tr>
				<td><label class="control-label">Description</label></td>
				<td><input class="form-control" type="text" name="product_description" 
				value="<?php echo $summary ?>" required /></td>
			</tr>
			

			<tr>
				<td><label class="control-label">Select Category</label></td>
				<td>
				<select name="product_category" value="<?php echo $category ?>"/>
				<option>...</option>
				<option>Clothing & Accessories</option>
				<option>Jewelry</option>
				<option>Craft Supplies</option>
				<option>Bedding & Room Decor</option>
				<option>Soft Toys</option>
				<option>Vintage Art</option>
				<option>Wedding Accessories</option>
				</select>
				
				</td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
				<span class="glyphicon glyphicon-save"></span> Update
				</button>
				
				<a class="btn btn-default" href="products.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
				
				</td>
			</tr>
		
		</table>
    
	</form>

</div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>