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

<?php include '../templates/navbar.php' ?>
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
                    $stmt = $dbh->prepare("SELECT * FROM payments");
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
    <?php include '../templates/footer.php' ?>
</body>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.mycart.min.js"></script>
</html>
