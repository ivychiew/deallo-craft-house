<?php include "../includes/addproduct_cofig.php" ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add new product</title>

<!--Bootstrap-->
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css.min">


    <!-- custom stylesheet -->
    <link rel="stylesheet" href="style.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="jquery-1.11.3-jquery.min.js"></script>
    </head>
<body>

<div class="container">


	<div class="page-header">
	<br>
    	<h1 class="h2">Add a New Product. <a class="btn btn-default" href="products.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View All </a></h1>
    	
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Product Name:</label></td>
        <td><input class="form-control" type="text" name="product_name" placeholder="Enter product name" value="<?php echo $productname; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Price (RM):</label></td>
        <td><input class="form-control" type="text" name="product_price" placeholder="$" value="<?php echo $product_price; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Product Image</label></td>
      <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>


    <tr>
    	<td><label class="control-label">Product Description:</label></td>
        <td><input class="form-control" type="text" name="product_description" placeholder="Enter Product Description" value="<?php echo $productdesc; ?>" /></td>
    </tr>
    
    
    
    <tr> 
    	<td><label class="control-label">Select Category</label></td>
    	<td>
    	<select name="product_category" value="<?php echo $productcategory ?>"/>
    	<option>...</option>
    	<option>Food</option>
    	<option>Furniture</option>
    	<option>Jewelry</option>
    	<option>Clothes</option>
    	<option>Souvenirs</option>
    	<option>Gifts</option>
    	</select>
    	
    	</td>

    </tr>

    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Uploaded!
        </button>
        </td>
    </tr>

    
    </table>
    
</form>

   
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>