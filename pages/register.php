<?php  include_once '..\includes\server.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="..\styles\login_styles.css"/>
</head>
<body class="bg">
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('..\includes\errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>"/>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>"/>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2"/>
		</div>
        
        <h3 id="securityQlabel">Security Questions: </h3>
        <div class="input-group">
			<label>Type your surname backwards:</label>
			<input type="text" name="surname" id="surname"/>
		</div>
        
        <div class="input-group">
			<label>Type your favourite color:</label>
			<input type="text" name="color" id="color"/>
		</div>
        
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>