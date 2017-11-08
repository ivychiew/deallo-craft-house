<!--Include User Session Script-->
<?php include '../includes/sessions.php' ?>
<!--Include Delete Products Config-->
<?php include '../includes/products_delete.php' ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
	<meta name="keyword" content="HTML, CSS, Javascript" />
    <meta name="author" content=""/>

    <title>Deallo Craft House -Edit Product Page</title>
 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/buttons.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/footer.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/products.css"/>
	<link rel="icon" type="image/png" href="../images/DealloLogo-favicon.png">
    
</head>
   

<body>
<?php include '../templates/navbar.php' ?>
<div class="container">

  <div class="page-header">
    <br>
      <h1 class="h2">All Products
        <a class="btn btn-default" href="addproducts.php"> 
          <span class="glyphicon glyphicon-plus"></span> &nbsp; Create a new product 
        </a>
        <a class="btn btn-default" href="myProducts.php"> 
          <span class="glyphicon glyphicon-plus"></span> &nbsp; Edit Products
        </a>
      </h1> 
    </div>
    
  <br />

<div class="row" id="products">
	<?php
	  
		  //Fetch the data from the database
		  $stmt = $dbh->prepare('SELECT id, name, price, image, summary FROM product ORDER BY id DESC');
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
	
    <div class="col-md-3">
      <div class="well" style="background-color: white;">
        <img src="../images/product_images/<?php echo $row['image']; ?>" align="middle" class="img-responsive mx-auto d-block" width="200px" height="200px" />

          <div class="well-body">
            <h4 class="well-title">
              <span id="myBtn"><?php echo $name ?></span>
            </h4>

                  <h5>
                    <span class="product-price">
                      <?php echo "RM $price  &nbsp &nbsp"; ?>
                    </span>
                  </h5>

                <div class="col-sm-4card-text"><?php echo $summary; ?></div>
                 <br>
                        <span> <!--Edit Product Button-->
                          <a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('Are you sure?')">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                          </a> 

                            <!--Delete Product Button-->
                          <a class="btn btn-danger" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('Are you sure ?')">
                            <span class="glyphicon glyphicon-remove-circle"></span> Delete
                          </a>
                        </span>
                <br>
              </div> <!-- End of Well Body-->
          </div>
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

</body>

<?php include '../templates/footer.php' ?>
	<!-- Latest compiled and minified JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
	<script type='text/javascript' src='../js/buttonToggle.js'></script>
	
</html>