<?php
include "config.php";
include "../includes/sessions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content=""/>
	<meta name="keyword" content="HTML, CSS, Javascript" />
    <meta name="author" content=""/>
	
    <title>Deallo Craft House - Transaction History</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!--Custom CSS-->
    <link rel="stylesheet" href="../styles/test.css">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
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
 <div class="navbar navbar-custom nav-fixed-top" role="navigation">
  
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" rel="home" href="#">Deallo's Craft House</a>
  </div>
  
  <div class="collapse navbar-collapse">

    <!--Search-->
    <div class="col-sm-3 col-md-3 navbar-right">
      <form class="navbar-form" role="search" method="GET" action="searchpage.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="searchTerm" id="searchTerm"/>
        <div class="input-group-btn">
          <button class="btn btn-default" name="search_submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
      </form>
    </div>

    <ul class="nav navbar-nav"><!--unordered list start -->
		<li class="dropdown">
		 <?php  if (isset($_SESSION['username'])) : ?>
              <a class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo $_SESSION['welcomeName'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php">Edit Profile</a></li>
                <li class="divider"></li>
                <li><a class="nav-link" href="../index.php?logout='1'">Sign Out</a></li>
                 <li class="divider"></li>
                <li><a href="customer-supp.php">Questions?</a></li>
              </ul>
        </li>
       <?php endif ?>
     <li><a class="nav-link" href="../index.php?logout='1'">Sign Out</a></li>
      <li class="dropdown">
          <a href="products.php" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="products.php">All Products</a></li>
            <li class="divider"></li>
            <li><a href="products/clothingAcc.php">Clothing &amp; Accessories</a></li>
            <li class="divider"></li>
            <li><a href="products/jewelry.php">Jewelery</a></li>
            <li class="divider"></li>
            <li><a href="products/craftSupplies.php">Craft Supplies</a></li>
            <li class="divider"></li>
            <li><a href="products/bedding.php">Bedding &amp; Room Decor</a></li>
            <li class="divider"></li>
            <li><a href="products/softToys.php">Soft Toys</a></li>
            <li class="divider"></li>
            <li><a href="products/vintage.php">Vintage Art</a></li>
            <li class="divider"></li>
            <li><a href="products/wedding.php">Wedding Accessories</a></li>
          </ul>
      </li>
     <li>
        <span class="navbar-text navbar-right">
            <span class="glyphicon glyphicon-shopping-cart glyphicon-2x my-cart-icon">  <span class="badge badge-notify my-cart-badge"></span>
            </span>
        </span>
      </li>
    </ul>
  </div>
</div>

 <div class="container">
 <div class="page-header">
    <h1 class="h2">Transaction History</h1> 
 </div>
    
  <br/>

   <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	   <table class="table table-striped table-responsive">
	  <tr>
		   <td>Payment ID</td>
		   <td>Item Name</td>
           <td>Transaction ID</td>
           <td>Amount</td>
           <td>Currency</td>
           <td>Payment Status</td>
           <td>Date</td>
           <td>Time</td>
           
	   </tr>
		 <?php
			$stmt = $dbh->prepare("SELECT * FROM product");
			if ($stmt->execute()) {
				while ($row = $stmt->fetch()) {
			?>
			  <tr class="success">
				<td><?php echo $row['payment_id'] ?></td>
				<td><?php echo $row['item_name'] ?></td>
                  <td><?php echo $row['txn_id'] ?></td>
                  <td><?php echo $row['payment_gross'] ?></td>
                  <td><?php echo $row['currency'] ?></td>
                  <td><?php echo $row['payment_status'] ?></td>
                  <td><?php echo $row['date'] ?></td>
                  <td><?php echo $row['time'] ?></td>
			  </tr>
			<?php
				}
			}
			?>
			
		</table>
	</div> 
	</div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.mycart.min.js"></script>

</body>
</html>
