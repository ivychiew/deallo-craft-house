<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Deallo Customer Support" />
	<meta name="keyword" content="HTML, CSS, Javascript" />
	<meta name="author" content="Tay Guan Yun" />
	<title>Customer Support Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login_style.css">
	<!--<script type="text/javascript" src="script.js></script>-->
	

</head>

<body class="container">

	<div class="header">
        <h1>Customer Support</h1>
		<h5> Welcome to the Customer Support Page. Please tell us your problem and we will reply 
		as soon as possible.</h5>
	</div>
	
	<form method="post" class="form form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div>
			<label class="control-label">Email address</label>
			<input type="text" id="email" name="email" class="form-control">
		</div>
		
		<div>
			<label class="control-label">Comment/Inquiry:</label>
			<textarea name="comment" rows="5" cols="40" class="form-control"></textarea>
		</div>
		<br/>
		
		<div>
            <button type="submit" name="submit" class="btn btn-success" a href="customer-supp2.php">Submit</button>
		</div>
	</form>
	
    <br/>
	
	<p>
		<h2>Frequent Asked Questions (FAQ)</h2>
        <br/>
		
    <ol type="1">
			<li>How to purchase products</li>
				<p>You need to have an account to purchase the products. Please sign up here  (there is a link to sign up page)</p>
				
			<li>How to avoid from buying the wrong products which you did not expect</li>
				<p>Always double check your shopping basket before checking out to payment.</p>
			
			<li>How to deal safely on Deallo</li>
				<p>You can always contact the seller or check on the reviews given by other customers before adding the products
				into your basket.</p>
			
			<li>Which payment should I choose?</li>
				<p>Paypal is highly recommended as it provides safe and secure transaction process for your payment.</p>
			
			<li>Getting Scammed?</li>
				<p>You may submit a report regarding the scammer or call our 24/7 hotline, 03-8888 9999 for help.</p>
			
			<br/>
			
		<h2>HAPPY SHOPPING</h2>
			
    </ol>
</body>





</html>
