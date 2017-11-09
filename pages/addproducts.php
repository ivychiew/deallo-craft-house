<?php include "..\includes\addproducts_config.php" ?>
<?php include "..\includes\sessions.php" ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <title>Deallo Craft House - Add new product</title>

  <!--Nav and Footer Stylesheet--> 

	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css">
    <link rel="stylesheet" type="text/css" href="../styles/products.css">
    <link rel="stylesheet" type="text/css" href="../styles/footer.css">
	<link rel="stylesheet" type="text/css" href="../styles/buttons.css"/>
    <link rel="stylesheet" href="style.css">
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
<?php include '../templates/navbar.php' ?>
<div class="container" style="padding-bottom: 20px; ">


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
        <td><input class="form-control" type="text" name="product_price" placeholder="$" value="<?php echo $productprice; ?>" /></td>
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
            <select name="product_category" value="<?php echo $producategory ?>">
                <option>...</option>
                <option>Clothing &amp; Accessories</option>
                <option>Jewelry</option>
                <option>Craft Supplies</option>
                <option>Bedding &amp; Room Decor</option>
                <option>Soft Toys</option>
                <option>Vintage Art</option>
                <option>Wedding Accessories</option>
                <option>Food</option>
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
    <script src="../js/bootstrap.min.js"></script>
    <script src="jquery-1.11.3-jquery.min.js"></script>

</body>
<?php include '../templates/footer.php' ?>
</html>