<?php

if (isset($_POST['product_submit'])){
		//receive all input values from the form.
		$name = mysqli_real_escape_string($dbi, $_POST['product_name']);
		$price = mysqli_real_escape_string($dbi, $_POST['price']);
		$quantity = mysqli_real_escape_string($dbi, $_POST['quantity']);
 	 	$category = mysqli_real_escape_string($dbi, $_POST['category']);
  		$pdetails = mysqli_real_escape_string($dbi, $_POST['product_details']);
  		$pimage = mysqli_real_escape_string($dbi, $_POST['product_image'];
		

	//form validation: esure that the form is correctly filled 
	if (empty($name)) {
			array_push($errors, "product name is required");
		}
	if (empty($price)) {
			array_push($errors, "price is required");
		}

	if (empty($quantity)) {
			array_push($errors, "quantity is required");
		}

	if (empty($category) {
			array_push($errors, "category is required");
		}

	if (empty($pdetails)) {
			array_push($errors, "details is required");
		}

	if (empty($pimage)) {
			array_push($errors, "image is required");
		}
	//Register users provided the form is error free.
	if (count($errors) == 0){

		//encrypt the password before saving in the database

		$query = "INSERT INTO deallo (username, email, password)
				  VALUES('$username', '$email', '$password')";
		mysqli_query($dbi, $query);

		echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='product.php'>View Result</a>";

		// $_SESSION['username'] = $username;
		// $_SESSION['success'] = "You are now logged in";
		// header('location: ..\index.php');
	}

}

?>