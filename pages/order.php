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
    <link rel="stylesheet" href="../styles/buttons.css">
    <link rel="stylesheet" href="../styles/footer.css">
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
 
    <div class="container">
        <h1>Cart</h1>
		<hr/>
        <table class="table table-bordered table-hover table-responsive">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
					<th></th>
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
					<td width="80">
					<button type="button" class="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></td>
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
					<td></td>
                </tr>
                <tr>
                    <th colspan="2">Total (including discount)</th>
                    <th colspan="2"><?php echo $row2['ap2']*0.99 ?></th>
					<td></td>
                </tr>
            </tfoot>
        </table>
        <p class="text-right"><a href="products.php" class="btn btn-default">Back to homepage</a> <a href="?del=1" class="btn btn-link">Remove All Items</a></p>
        <div class="paypal_checkout">
        <!--Vivien's checkout code -->
        <!--    <a href="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8GMC86G5MQXD6" class="btn btn-warning" style="width: 282px;">Checkout</a> -->
            
             <!--Paypal's checkout code -->
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" align="right">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="deallo.seller@domain.com">
                <input type="hidden" name="lc" value="MY">
                <input type="hidden" name="item_name" value="Your Amount of Payment">
                <input type="hidden" name="button_subtype" value="services">
                <input type="hidden" name="no_note" value="0">
                <input type="hidden" name="cn" value="Add special instructions to the seller:">
                <input type="hidden" name="no_shipping" value="2">
                <input type="hidden" name="rm" value="1">
                <input type="hidden" name="return" value="http://www.localhost/deallo-craft-house/pages/successpay.php">
                <input type="hidden" name="currency_code" value="MYR">
                <input type="hidden" name="tax_rate" value="4.000">
                <input type="hidden" name="amount" value="<?php echo $row2['ap2']*0.99 ?>"/>
                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
  </body>
  <?php include "../templates/footer.php" ?>
</html>
<?php
 }   
?>