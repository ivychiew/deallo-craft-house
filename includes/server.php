<?php
	session_start();

	//Variable declaration
	$username = ""; 
	$email = ""; 
	$errors = array(); 
	$_SESSION['success'] = "";

	//connect to database
	$dbi = mysqli_connect('localhost', 'root', '' , 'deallo_udb'); 
	
//Start of User Registration
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
        
        //Every new user has a default profile image
        $templateImagePath="../images/adminProfile.png";
        $surname = strrev($surname);

		$query = "INSERT INTO user (username, email, password, surname, color, profile_image)
				  VALUES('$username', '$email', '$password_1','$surname','$color','$templateImagePath')";
		mysqli_query($dbi, $query);

		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: ..\index.php');
	}

}
//End of User Registration

//Start of User Login

	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($dbi, $_POST['username']);
		$password = mysqli_real_escape_string($dbi, $_POST['password']);

		//if username field is empty
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {

			$query = "SELECT * FROM user WHERE username='$username' OR email='$username' AND password='$password'";
			$results = mysqli_query($dbi, $query);
			
			$queryExist = "SELECT * FROM user WHERE username='$username' OR email='$username'";
			$resultsExist = mysqli_query($dbi, $queryExist);
			
			//Checks if username or email exists in database
			if (mysqli_num_rows($resultsExist) == 1) {
				
				//Checks if username and password is correct
				if (mysqli_num_rows($results) == 1) {
				$row=mysqli_fetch_row($results);
				
				$_SESSION['welcomeName'] = $row[1];
				
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: ..\index.php');
				}else {
					array_push($errors, "Wrong username/password combination");
				}
			}else{
				array_push($errors, "Username/email not registered. Please sign-up");
			}
		}
	}
?>
