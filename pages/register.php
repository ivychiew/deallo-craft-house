<?php  include_once '..\includes\server.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="..\styles\login_styles.css"/>
    <link rel="icon" type="image/png" href="..\images/DealloLogo-favicon.png"/>
     <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body class="bg">
<div class="container" style="width:100%;"> 
<div class="row"> 
		<div class="col-md-12"> 
			<div class="header">
			<h2>Register</h2>
		</div>
	</div>
</div>
 <div class="form-group text-center">
 <form method="post" action="register.php">
		<?php include('..\includes\errors.php'); ?>

		<div class="row"> 
			<div class="col-md-12"> 
			<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>"/>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12"> 	
			<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>"/>
		</div>
		</div>
		<div class="row"> 
			<div class="col-md-6"> 
				<input type="password" placeholder="Password" name="password_1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
			</div>
	
			<div class="col-md-6"> 
			<input type="password" placeholder="Confirm Password" name="password_2"/>
		</div>
		</div>
		<hr>
         <strong><p id="securityQlabel">Security Questions: </p></strong>
        <div class="row"> 
			<div class="col-md-7"> 
       
       
			<label>Type your surname backwards:</label>
			<input type="text" name="surname" id="surname"/>
		</div>
		
        
        <div class="col-md-5">
			<label>Your favourite color:</label>
			<input type="text" name="color" id="color"/>
		</div>
        </div>
		
			<button type="submit" class="btn" name="reg_user" style="width: 300px;">Register</button>
		</div>
        
		<p id="alreadyMember">
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</div>
</body>
</html>