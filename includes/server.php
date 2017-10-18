<?php
	session_start();

	//variable declaration.
	$username = ""; 
	$email = ""; 
	$errors = array(); 
	$_SESSION['success'] = "";

	//connect to database.
	$dbi = mysqli_connect('localhost', 'root', '' , 'register'); 
	// $dbi2 = mysqli_connect('localhost', 'root', '' , 'products');
	// $mysqli = mysqli_connect('localhost', 'root', '', 'products');
	
    //User Registration
	if (isset($_POST['reg_user'])){
		//receive all input values from the form.
		$username = mysqli_real_escape_string($dbi, $_POST['username']);
		$email = mysqli_real_escape_string($dbi, $_POST['email']);
        $surname = mysqli_real_escape_string($dbi, $_POST['surname']);
        $color = mysqli_real_escape_string($dbi, $_POST['color']);

		//input password
		$password_1 = mysqli_real_escape_string($dbi, $_POST['password_1']);

		//re-enter password
		$password_2 = mysqli_real_escape_string($dbi, $_POST['password_2']);

	//form validation: esure that the form is correctly filled 
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required");}
	if (empty($password_1)) {array_push($errors, "Password is required"); }
    if (empty($surname)) {array_push($errors, "Security Question 1 is required"); }
    if (empty($color)) {array_push($errors, "Security Question 2 is required"); }
        
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match!");
	}

	//Register users provided the form is error free.
	if (count($errors) == 0){

		//encrypt the password before saving in the database
		//$password = md5($password_1); 
        
        //Every new user has a default profile image
        $templateImagePath="../images/adminProfile.png";
        $surname = strrev($surname);

		$query = "INSERT INTO users (username, email, password, surname, color, profile_image)
				  VALUES('$username', '$email', '$password_1','$surname','$color','$templateImagePath')";
		mysqli_query($dbi, $query);

		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: ..\index.php');
	}

}

//...


// Login User - Encryption

	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($dbi, $_POST['username']);
		$password = mysqli_real_escape_string($dbi, $_POST['password']);

//		//password encryption
//		$algorithm = "2a";
//		$length = "12";
//
//		//Start the salt by specifying the algorithm and length
//		$salt = "$" . $algorithm . "$" . $length . "$";
//
//		//Add on random salt and make base64 adjusted for bcrypt's version
//		$salt .= substr( str_replace( "+", ".", base64_encode( mcrypt_create_iv( 128, MCRYPT_DEV_URANDOM ) ) ), 0, 22 );
//
//		//Encrypt with your generated salt
//		$encrypt = crypt( $password, $salt );
//


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
			//$password = md5($password);
            
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($dbi, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: ..\index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
?>
