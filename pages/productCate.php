<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Deallo Product Category Page" />
	<meta name="keyword" content="HTML, CSS, Javascript" />
	<meta name="author" content="Tay Guan Yun" />
	<title>Customer Support Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login_style.css">
	<!--<script type="text/javascript" src="script.js></script>-->
	

</head>

<body class="container">

	<div class="header">
        <h1>Product Category</h1>
		<h5>Search for your beloved product here in this search box.</h5>
	</div>
	
	</br>
	
	<form name="productsearch"  method="GET" action="./searchpage.php">
		<div class="row">
			<div class="col-xs-6 col-md-4">
				<div class="input-group">
					<input type="text" name="kw" class="form-control" placeholder="Search" id="txtSearch"/>
						<div class="input-group-btn">
							<button class="btn btn-primary" type="submit">
							<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
				</div>
			</div>
		</div>
	</form>
	
	<p>
		<h2>List of Product Categories</h2>
        <br/>
		
    <ol type="1">
		<h2>HAPPY SHOPPING</h2>
			
    </ol>
</body>





</html>
