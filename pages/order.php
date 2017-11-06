<?php
include "config.php";
include "../includes/sessions.php";
include "../includes/product_config.php";
if(isset($_POST['shopping'])){
    $user = $_POST['ui'];
    $idpro = $_POST['id'];
    $aq = $_POST['aq'];
    $ap = $_POST['ap'];
    $order = $_POST['order'];
    $stmt = $dbh->prepare("INSERT INTO shopping VALUES (?,?,?,?,?)");
    $stmt->bindParam(1, $user);
    $stmt->bindParam(2, $idpro);
    $stmt->bindParam(3, $aq);
    $stmt->bindParam(4, $ap);
    $stmt->bindParam(5, $order);
    $stmt->execute();
} else{
    if(isset($_GET['del'])){
        $del = $_GET['del'];
        $stmt = $dbh->prepare("DELETE FROM shopping WHERE id_user=1");
        $stmt->bindParam(1, $del);
        if($stmt->execute()){
            ?>
            <script>location.href="order.php"</script>
            <?php
        }
    }
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
	
    <title>Deallo Craft House - Order Cart</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!--Custom CSS-->
    <link rel="stylesheet" href="../styles/test.css">

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
    <a class="navbar-brand" rel="home" href="../index.php">Deallo's Craft House</a>
  </div>
  
  <div class="collapse navbar-collapse">

 
    <div class="col-sm-3 col-md-3 navbar-right">
      <form class="navbar-form" role="search">
      <div class="input-group ">
        <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
      </form>
    </div>

   
    <ul class="nav navbar-nav"><!--unordered list start -->
    <li class="dropdown">
     <?php  if (isset($_SESSION['username'])) : ?>
              <a href="products.php" class="dropdown-toggle" data-toggle="dropdown" style="color: #577B84">Welcome <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php">Edit Profile</a></li>
                <li class="divider"></li>
                <li><a class="nav-link" href="index.php?logout='1'">Sign Out</a></li>
                 <li class="divider"></li>
                <li><a href="customer-supp.php">Questions?</a></li>
                <li class="divider"></li>
                <li><a href="order.php">Your Cart</a></li>
              </ul>
            </li>
       <?php endif ?>
     
      <li class="dropdown">
              <a href="products.php" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="products.php">All Products</a></li>
                <li class="divider"></li>
                <li><a href="#">Clothing</a></li>
                <li class="divider"></li>
                <li><a href="#">Accessories</a></li>
                <li class="divider"></li>
                <li><a href="#">Food</a></li>
                <li class="divider"></li>
                <li><a href="#">Furniture</a></li>
              </ul>
      </li>
      <li>
        <span class="navbar-text navbar-right"><span class="glyphicon glyphicon-shopping-cart glyphicon-2x my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></></span>
      </li>
    </ul>
  </div>
</div>
<!--End of Nav Bar-->
    <div class="container">
        <h1>Your Cart</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $dbh->prepare("SELECT * FROM shopping a, product b where a.id=b.id and a.id_user = 1");
                if ($stmt->execute()) {
                  while ($row = $stmt->fetch()) {
                ?>
                <tr>
                    <td width="120"><img src="../images/product_images/<?php echo $row['image'] ?>" style="width:100px"/></td>
                    <td><strong><?php echo $row['name'] ?></strong></td>
                    <td width="80"><?php echo $row['amount_quantity'] ?></td>
                    <td width="80"><?php echo $row['amount_price'] ?></td>
                </tr>
                <?php
                  }
                }
                ?>
            </tbody>
            <tfoot>
                <?php
                $stmt2 = $dbh->prepare("SELECT sum(amount_price) as ap2 FROM shopping where id_user = 1");
                $stmt2->execute();
                $row2 = $stmt2->fetch();
                ?>
                <tr>
                    <th colspan="2">Total</th>
                    <th colspan="2"><?php echo $row2['ap2'] ?></th>
                </tr>
                <tr>
                    <th colspan="2">Total (including discount)</th>
                    <th colspan="2"><?php echo $row2['ap2']*0.99 ?></th>
                </tr>
            </tfoot>
        </table>
        <p class="text-right"><a href="products.php" class="btn btn-default">Back to homepage</a> <a href="?del=1" class="btn btn-danger">Remove All Items</a></p>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
  </body>
</html>
<?php
 }   
?>