<?php
	session_start();

	//variable declaration.
	$username = ""; 
	$email = ""; 
	$errors = array(); 
	$_SESSION['success'] = "";

	//connect to database.
	$dbi = mysqli_connect('localhost', 'root', '' , 'register'); 
	$dbi2 = mysqli_connect('localhost', 'root', '' , 'products');
	// $mysqli = mysqli_connect('localhost', 'root', '', 'products');
	//user registration.
	if (isset($_POST['reg_user'])){
		//receive all input values from the form.
		$username = mysqli_real_escape_string($dbi, $_POST['username']);
		$email = mysqli_real_escape_string($dbi, $_POST['email']);

		//input password
		$password_1 = mysqli_real_escape_string($dbi, $_POST['password_1']);

		//re-enter password
		$password_2 = mysqli_real_escape_string($dbi, $_POST['password_2']);

	//form validation: esure that the form is correctly filled 
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required");}
	if (empty($password_1)) {array_push($errors, "Password is required"); }
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match!");
	}

	//Register users provided the form is error free.
	if (count($errors) == 0){

		//encrypt the password before saving in the database
		$password = md5($password_1); 

		$query = "INSERT INTO users (username, email, password)
				  VALUES('$username', '$email', '$password')";
		mysqli_query($dbi, $query);

		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: ..\index.php');
	}

}

//...


// Login User + Encryption

	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($dbi, $_POST['username']);
		$password = mysqli_real_escape_string($dbi, $_POST['password']);

		//password encryption
		$algorithm = "2a";
		$length = "12";

		//Start the salt by specifying the algorithm and length
		$salt = "$" . $algorithm . "$" . $length . "$";

		//Add on random salt and make base64 adjusted for bcrypt's version
		$salt .= substr( str_replace( "+", ".", base64_encode( mcrypt_create_iv( 128, MCRYPT_DEV_URANDOM ) ) ), 0, 22 );

		//Encrypt with your generated salt
		$encrypt = crypt( $password, $salt );



		//if field is empty
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		//if field is not empty
		if (count($errors) == 0) {

			//fetch data from db
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($dbi, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

//Product Insert
	if (isset($_POST['product_submit'])){
		//receive all input values from the form.
		$name = mysqli_real_escape_string($dbi2, $_POST['product_name']);
		$price = mysqli_real_escape_string($dbi2, $_POST['price']);
		$quantity = mysqli_real_escape_string($dbi2, $_POST['quantity']);
 	 	$category = mysqli_real_escape_string($dbi2, $_POST['category']);
  		$pdetails = mysqli_real_escape_string($dbi2, $_POST['product_details']);
  		$pimage = mysqli_real_escape_string($dbi2, $_POST['product_image']);
		

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

	if (empty($category)) {
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

		$query = "INSERT INTO products (username, email, password)
				  VALUES('$username', '$email', '$password')";
		mysqli_query($dbi2, $query);

		echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='product.php'>View Result</a>";

		// $_SESSION['username'] = $username;
		// $_SESSION['success'] = "You are now logged in";
		// header('location: ..\index.php');
	}

}
//   if(isset($_POST['product_submit'])) { 
//   $name = $_POST['product_name'];
//   $price = $_POST['price'];
//   $quantity = $_POST['quantity'];
//   $category = $_POST['category'];
//   $pdetails = $_POST['product_details'];
//   $pimage = $_POST['product_image'];

//   //checking empty fields 
//   if(empty($name) || empty($price) || empty($quantity) || empty($category) || empty($pdetails) || empty($pimage)) {
//   if(empty($name)) {
//      echo "<font color='red'>Name field is empty.</font><br/>";
//     }
        
//     if(empty($price)) {
//          echo "<font color='red'>Price field is empty.</font><br/>";
//     }
        
//     if(empty($quantity)) {
//          echo "<font color='red'>Quantity field is empty.</font><br/>";
//     }

//     if(empty($category)) {
//          echo "<font color='red'>Category field is empty.</font><br/>";
//     }
       
//     if(empty($pdetails)) {
//          echo "<font color='red'>Detail field is empty.</font><br/>";
//     }
       

//     if(empty($pimage)) {
//          echo "<font color='red'>Image field is empty.</font><br/>";
//     }
       
//         //link to the previous page
//         echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
//   }  else { 
//         // if all the fields are filled (not empty)             
//         //insert data to database
//         $result = mysqli_query($mysqli, "INSERT INTO products(product_name,price,quantity,category,product_details,product_image) VALUES('$name','$price','$category','pdetails','pimage')");

//         echo "<font color='green'>Data added successfully.";
//         echo "<br/><a href='product.php'>View Result</a>";
// }
// }

?>
