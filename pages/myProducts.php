<?php
include "../includes/sessions.php";
include "../includes/product_config.php";
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
	<meta name="keyword" content="HTML, CSS, Javascript" />
    <meta name="author" content=""/>

    <title>Product Page</title>
 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/footer.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/products.css"/>
	<link rel="icon" type="image/png" href="../images/DealloLogo-favicon.png"/>
	
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
<!-- Navigation -->

<?php include '../templates/navbar.php' ?>

 

<div class="container">

  <div class="page-header">
    <br>
      <h1 class="h2">My Products
        <a class="btn btn-default" href="addproducts.php"> 
          <span class="glyphicon glyphicon-plus"></span> &nbsp; Create a new product 
        </a>
        <a class="btn btn-default" href="editproducts.php"> 
          <span class="glyphicon glyphicon-plus"></span> &nbsp; Edit Products
        </a>
      </h1> 
    </div>
    
  <br/>

<div class="row">
     <?php
        $stmt = $dbh->prepare("SELECT * FROM product");
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
        ?>
          <div class="col-md-4">
          <div class="well h-100" style="background-color: white;">
            
              <img src="../images/product_images/<?php echo $row['image']; ?>" class="img-responsive mx-auto d-block" width="200px" height="200px" />
              <div class="text-center">
                <h4><?php echo $row['name'] ?></h4>
                <p><strong>Price</strong>: $<?php echo $row['price'] ?><br/></p>
                <p>
                    <button type="button" class="btn btn-info my-cart-btn" href="editform.php?edit_id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('Are you sure?')> <span class=" glyphicon glyphicon-edit"></span> Edit</button> 
                    <button type="button" class="btn btn-danger my-cart-btn" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('Are you sure ?')"> <span class="glyphicon glyphicon-remove-circle"></span> Delete</button> 
                </p>
              </div>
            
          </div>
          </div>
            
        <?php
            }
        }
        ?>
        </div>
  
 
</div>  
</div>
       
    <!-- Footer -->
	<footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Deallo's Craft House</p>
      </div>
      <!-- /.container -->
    </footer>


	<!-- Latest compiled and minified JavaScript -->
	

	<script type='text/javascript' src='../js/buttonToggle.js'></script>
	<!-- Bootstrap core JavaScript -->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>

  <script src="../js/bootstrap.min.js"></script>
  <script type='text/javascript' src='../js/buttonToggle.js'></script>
  <?php include '../templates/footer.php' ?>
</html>