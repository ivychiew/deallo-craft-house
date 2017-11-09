<?php
	session_start();

	//Variable declaration
	$comment = ""; 
	$username = ""; 
	$errors = array(); 
	$_SESSION['success'] = "";

	//connect to database
	$dbi = mysqli_connect('localhost', 'root', '' , 'deallo_udb'); 
	
	if (isset($_GET['submit'])){
		//receive all input values from the form.
		$username = mysqli_real_escape_string($dbi, $_SESSION['username']);
		$comment = mysqli_real_escape_string($dbi, $_GET['comment']);

    //If comment field is empty, show error
	if (empty($comment)) { 
        array_push($errors, "Comment is required"); 
    }
    //If username field in session is empty, show error
	if (empty($username)) { 
        array_push($errors, "Username is required");
    }

	if (count($errors) == 0){
        
		$query = "INSERT INTO questions (username,comment)
				  VALUES('$username', '$comment')";
		mysqli_query($dbi, $query);

		$_SESSION['success'] = "Comment Success";
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('COMMENT SUCCESSFULLY')
        window.location.href='customer-supp.php';
        </SCRIPT>");
	}else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('ERROR IN SUBMITTING FORM: Comment field is empty')
        window.location.href='customer-supp.php';
        </SCRIPT>");
    }

}
?>