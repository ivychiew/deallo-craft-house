<?php include '../includes/sessions.php' ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="Deallo Customer Support" />
	<meta name="author" content="Tay Guan Yun, Selena Yap" />
	
	<title>Deallo Craft House - Customer Support Page</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/footer.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/products.css"/>
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

<!-- <body class="container-fluid" data-ng-app="myApp"> -->
<body class="data-ng-app">
<!-- Navigation -->
<?php include '../templates/navbar.php' ?>
<!--End of Nav Bar-->

<div class="container"> 
  <div class="row"> 
    <div class="col-md-12">
	     <div class="header">
        <h1>Customer Support</h1>
		      <h5> Welcome to the Customer Support Page. Please tell us your problem and we will reply 
		        as soon as possible.</h5> 
	     </div>
    </div>
  </div>

  <div class="row"> 
    <div class="col-md-12">
	
    	<form method="GET" class="form form-horizontal" action="./report.php">
    		<div>
    			<label class="control-label">Comment/Inquiry:</label>
    			<textarea name="comment" rows="5" cols="40" class="form-control"></textarea>
    		</div>
    		<br/>
    		
    		<div>
                <button type="submit" name="submit" class="btn btn-success" a href="customer-supp2.php">Submit</button>
    		</div>
    	</form>
    	 </div>
      </div>
    <br/>
	
  <div class="row"> 
  <div class="col-md-12"> 
	
		<h2>Frequent Asked Questions (FAQ)</h2>
        <br/>
		
    <ol type="1">
			<li>How to purchase products</li>
				
				
			<li>How to avoid from buying the wrong products which you did not expect</li>
				<p>Always double check your shopping basket before checking out to payment.</p>
			
			<li>How to deal safely on Deallo</li>
				<p>You can always contact the seller or check on the reviews given by other customers before adding the products
				into your basket.</p>
			
			<li>Which payment should I choose?</li>
				<p>Paypal is highly recommended as it provides safe and secure transaction process for your payment.</p>
			
			<li>Getting Scammed?</li>
				<p>You may submit a report regarding the scammer or call our 24/7 hotline, 03-8888 9999 for help.</p>
    </ol>

      <br/>
      
    <h2>HAPPY SHOPPING</h2>   
    
    <br/>
  </div>
</div>
</div>

  

	
    <!-- jQuery – required for Bootstrap's JavaScript plugins) --> 
    <script src="../js/jquery.min.js"></script> 
    <!-- All Bootstrap  plug-ins  file --> 
    <script src="../js/bootstrap.min.js"></script> 
    <!-- Basic AngularJS --> 
    <script src="../js/angular.min.js"></script> 
    <!-- AngularJS - Routing --> 
    <script src="../js/angular-route.min.js"></script>
    <!-- App Script --> 
    <script src="../js/dealloApp.js"></script>
	
</body>


 <?php include '../templates/footer.php' ?>


</html>
