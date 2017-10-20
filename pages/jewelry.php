<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Deallo Product Category Page" />
	<meta name="keyword" content="HTML, CSS, Javascript" />
	<meta name="author" content="Tay Guan Yun" />
	<title>Search Result Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login_style.css">
	<!--<script type="text/javascript" src="script.js></script>-->
	

</head>

<body class="container">

	<div class="header">
        <h1>Search Result</h1>
	</div>
	
	</br>
	
	<form name="productsearch"   action="./searchpage.php" method="GET">
		<div class="row">
			<div class="col-xs-6 col-md-4">
				<div class="input-group">
					<input type="text" name="kw" class="form-control" placeholder="Search" value='<?php $_GET['k']; ?>'/>
						<div class="input-group-btn">
							<button class="btn btn-primary" type="submit">
							<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
				</div>
			</div>
		</div>
	</form>
	<hr />
	<?php

		//Connect to database
		$conn = mysqli_connect("localhost", "root", "", "products");
		if(mysqli_connect_errno())
		{
			echo "Failed to connect";
		}
		echo "Here are your search results";
		
		$k = 'jewelry';
		$query = mysqli_query($conn, "SELECT * FROM product_tbl WHERE productCategory LIKE '%$k%'") or die(mysqli_error());
		$numrows = mysqli_num_rows($query);
		
		if($numrows == 0)
		{
			echo "No such items founded";
		}
		else
		{	
			while($row = mysqli_fetch_array($query))
			{
				$category = $row['productCategory'];
				$name = $row['productName'];
				$picture = $row['productPic'];
				$price = $row['productPrice'];
				
				$output .= '<h3>' .$name. '</h3>
							<p>'.$picture. '</p>
							<p>' .$price. '</p>';
			}
		}
		print("$output");
		//Disconnect to database
		mysqli_close($conn);
	?>
	
</body>

</html>
