<!-- Navigation -->
 <div class="navbar navbar-custom nav-fixed-top" role="navigation">
  
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" rel="home" href="../index.php">Deallo's Craft House</a>
  </div>
  
  <div class="collapse navbar-collapse">
  <ul>
    <!--Search-->
    <div class="col-sm-3 col-md-3">
      <form class="navbar-form" role="search" method="GET" action="pages/searchpage.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search here!" name="searchTerm" id="searchTerm" />
        <div class="input-group-btn">
          <button class="btn btn-default" name="search_submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
      </form>
    </div>

   
    <ul class="nav navbar-nav navbar-right" style="padding-right:10%"><!--unordered list start -->
    <li class="dropdown">
          <a href="../products.php" class="dropdown-toggle" data-toggle="dropdown">Cateogries <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="../products.php">All Products</a></li>
            <li class="divider"></li>
            <li><a href="clothingAcc.php">Clothing &amp; Accessories</a></li>
            <li class="divider"></li>
            <li><a href="jewelry.php">Jewelery</a></li>
            <li class="divider"></li>
            <li><a href="craftSupplies.php">Craft Supplies</a></li>
            <li class="divider"></li>
            <li><a href="bedding.php">Bedding &amp; Room Decor</a></li>
            <li class="divider"></li>
            <li><a href="softToys.php">Soft Toys</a></li>
            <li class="divider"></li>
            <li><a href="vintage.php">Vintage Art</a></li>
            <li class="divider"></li>
            <li><a href="wedding.php">Wedding Accessories</a></li>
            <li class="divider"></li>
            <li><a href="food.php">Homemade Food</a></li>

          </ul>
      </li>
		<li class="dropdown">
		 <?php  if (isset($_SESSION['username'])) : ?>
              <a class="dropdown-toggle" data-toggle="dropdown">
             <!--  Welcome <?php echo $_SESSION['welcomeName'] ?> <b class="caret"></b></a> -->
              <?php echo $_SESSION['username'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="../profile.php">Edit Profile</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Sell</li>
                <li><a href="../addproducts.php">Add an item for sell</a></li>
                <li><a href="../myProducts.php">My Products</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Questions?</li>
                <li><a href="../customer-supp.php">Customer Support</a></li>
                 <li class="divider"></li>
                <li><a class="nav-link" href="../../index.php?logout='1'">Sign Out</a></li>
                
                
              </ul>
        </li>
       <?php endif ?>
 
       <li class="dropdown">
          <a href="products.php" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart glyphicon-2x my-cart-icon">  <span class="badge badge-notify my-cart-badge"></span>
            </span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="../order.php">View Cart Summary</a></li>
          </ul>
      </li>
     <li>
        <span class="navbar-text navbar-right">
            <a class="nav-link" href="../index.php?logout='1'"><span class="glyphicon glyphicon-log-out glyphicon-2x"></span></a>
        </span>
      </li>
    </ul>
  </div>
</div>
<!--End of Nav Bar-->