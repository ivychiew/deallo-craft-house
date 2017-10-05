<html> 
<head> 
	<title> Add Data </title> 
</head>

<body> 
<?php

include_once("..\includes\server.php");

if(isset($_POST['product_submit'])) { 
	$name = $_POST['product_name'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$category = $_POST['category'];
	$pdetails = $_POST['product_details'];
	$pimage = $_POST['product_image'];

	//checking empty fields 
	if(empty($name) || empty($price) || empty($quantity) || empty($category) || empty($pdetails) || empty($pimage)) {
	if(empty($name)) {
		 echo "<font color='red'>Name field is empty.</font><br/>";
    }
        
    if(empty($price)) {
         echo "<font color='red'>Price field is empty.</font><br/>";
    }
        
    if(empty($quantity)) {
         echo "<font color='red'>Quantity field is empty.</font><br/>";
    }

    if(empty($category)) {
         echo "<font color='red'>Category field is empty.</font><br/>";
    }
       
    if(empty($pdetails)) {
         echo "<font color='red'>Detail field is empty.</font><br/>";
    }
       

    if(empty($pimage)) {
         echo "<font color='red'>Image field is empty.</font><br/>";
    }
       
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}  else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO products(product_name,price,quantity,category,product_details,product_image) VALUES('$name','$price','$category','pdetails','pimage')");

        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='product.php'>View Result</a>";
}
}
?>
</body>
</html>
