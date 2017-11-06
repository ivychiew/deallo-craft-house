<?php  include_once '..\includes\server.php' ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
	<meta name="keyword" content="HTML, CSS, Javascript" />
    <meta name="author" content="Vivien Chiew,Selena Yap"/>
	
	<title>Deallo Craft House - Register</title>
	
	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="..\styles\login_styles.css"/>
	<link rel="icon" type="image/png" href="../images/DealloLogo-favicon.png"/>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 
    elements and media queries --> 
    <!-- WARNING: Respond.js doesn't work if you view the 
    page via file:// --> 
    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script> 
    <script src="js/respond.min.js"></script> 
    <![endif]--> 
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
        
		<p id="alreadyMember">
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
	
	<br/>
	
</body>
</html>