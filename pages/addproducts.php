<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once '../includes/product_config.php';
	
	if(isset($_POST['btnsave']))
	{
		$productname = $_POST['product_name'];// product name
		$productprice = $_POST['product_price'];// product price
		$productdesc = $_POST['product_description']; //product description
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($productname)){
			$errMSG = "Please Enter Your Product Name.";
		}
		else if(empty($productprice)){
			$errMSG = "Please Enter the Price of the Product.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else if(empty($productdesc)){
			$errMSG = "Please enter a Product Description";
		}
		// else if(empty())
		else
		{
			$upload_dir = '../images/product_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$productpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$productpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO product_tbl(productName, productPrice,productPic,productDescription) VALUES(:pname, :pprice, :ppic, :pdesc)');
			$stmt->bindParam(':pname',$productname);
			$stmt->bindParam(':pprice',$productprice);
			$stmt->bindParam(':ppic',$productpic);
			$stmt->bindParam(':pdesc',$productdesc);
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:5;products.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add a new product</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</head>
<body>

<!-- <div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <a class="navbar-brand" href="http://www.codingcage.com" title='Programming Blog'>Coding Cage</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/CRUD">CRUD</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/PDO">PDO</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/jQuery">jQuery</a>
        </div>
 
    </div>
</div> -->

<div class="container">


	<div class="page-header">
	<br>
    	<h1 class="h2">Add a New Product. <a class="btn btn-default" href="products.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View All </a></h1>
    	<hr color="black">
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
    	<select name="category" value="<?php echo $product_description; ?>"/>
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