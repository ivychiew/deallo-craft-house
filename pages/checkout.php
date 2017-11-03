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
        $stmt = $dbh->prepare("DELETE FROM shopping WHERE userID=8");
        $stmt->bindParam(1, $del);
        if($stmt->execute()){
            ?>
            <script>location.href="checkout.php"</script>
            <?php
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Cart</title>

    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/test.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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

        <br>
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-left"> Your Cart
        <a href="?del=1" class="btn btn-danger pull-right">Clear Cart</a></h2>
        </div>
    </div>
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
                $stmt = $dbh->prepare("SELECT * FROM shopping a, product_tbl b where a.id=b.id and a.userID = 8");
                if ($stmt->execute()) {
                  while ($row = $stmt->fetch()) {
                ?>
                <tr>
                    <td width="120"><img src="../images/product_images/<?php echo $row['productPic'] ?>" style="width:100px"/></td>
                    <td></td>
                    <td><strong><?php echo $row['productName'] ?></strong></td>
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
                $stmt2 = $dbh->prepare("SELECT sum(amount_price) as ap2 FROM shopping where userID = 8");
                $stmt2->execute();
                $row2 = $stmt2->fetch();
                ?>
                <tr>
                    <th colspan="2">Total</th>
                    <th colspan="2"><?php echo $row2['ap2'] ?></th>
                </tr>
               
            </tfoot>
        </table>
        <p class="text-right"><a href="products.php" class="btn btn-default">Back to homepage</a>&nbsp &nbsp<a href="#"" class="btn btn-warning">Checkout</a> </p>

    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php
 }   
?>