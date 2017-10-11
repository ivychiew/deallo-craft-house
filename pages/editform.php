<?php include "../includes/editproducts_config.php" ?>
<?php include "../includes/sessions.php" ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Product</title>

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


<div class="container">

    <div class="page-header">
        <br>
        <h1 class="h2">Update Product. <a class="btn btn-default" href="products.php"> Return to product page</a></h1>
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
        <td><input class="form-control" type="text" name="product_name" value="<?php echo $productName; ?>" required /></td>
    </tr>
    
    <tr>
        <td><label class="control-label">Price</label></td>
        <td><input class="form-control" type="text" name="product_price" value="<?php echo $productPrice; ?>" required /></td>
    </tr>
    
    <tr>
        <td><label class="control-label">Product Image</label></td>
        <td>
            <p><img src="../images/product_images/<?php echo $productPic; ?>" height="150" width="150" /></p>
            <input class="input-group" type="file" name="product_image" accept="image/*" />
        </td>
    </tr>

    <tr>
        <td><label class="control-label">Description</label></td>
        <td><input class="form-control" type="text" name="product_description" value="<?php echo $productDescription; ?>" required /></td>
    </tr>
    

    <tr>
        <td><label class="control-label">Select Category</label></td>
        <td>
        <select name="product_category" value="<?php echo $productCategory ?>"/>
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
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="products.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>

</div>
</body>
</html>