<?php
	session_start();

	//variable declaration.
	$username = ""; 
	$email = ""; 
	$errors = array(); 
	$_SESSION['success'] = "";

	//connect to database.
	$db = mysqli_connect('localhost', 'root', '' , 'registration'); 

	//user registration.
	if (isset($_POST['reg_user'])){
		//receive all input values from the form.
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);

		//input password
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

		//re-enter password
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

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
		header('location: ../index.php');
	}

}

//...


// Login User 

	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

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
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: ../index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>
