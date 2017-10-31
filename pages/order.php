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
            <script>location.href="products2.php"</script>
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

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
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
        <p class="text-right"><a href="products2.php" class="btn btn-default">Back to homepage</a> <a href="?del=1" class="btn btn-danger">Cancel</a></p>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
 }   
?>