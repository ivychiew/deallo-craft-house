<?php include_once '..\includes\server.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Deallo Craft House - Login</title>
	<link rel="stylesheet" type="text/css" href="..\styles\login_styles.css"/>
    <link rel="icon" type="image/png" href="images/DealloLogo-favicon.png"/>
    <script src="../functions/facebookapi.js"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="629649200313-68ffuflofdj0emikqshht7lgq003jcg5.apps.googleusercontent.com">
	<script>function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}</script>
   
</head>
<body class="bg">

	<div class="header">
        <img src="../images/DealloLogo-white.png" width="60" height="50" id="login_logo"/>
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('..\includes\errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" />
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password"/>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		
		<div class="g-signin2" data-onsuccess="onSignIn"></div>
        
        <div
    class="fb-login-button"
    data-max-rows="1"
    data-size="<medium, large>"
    data-button-type="continue_with"
    data-width="<100% or px>"
    data-scope="<comma separated list of permissions, e.g. public_profile, email>"
></div>

        <div id="status">
        </div>
        
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
        <p>
			<a href="forgotPassword.php">Forgot password?</a>
		</p>
        <br/>
        <p>        
            &copy; Deallo Craft House
        </p>
	</form>


</body>
</html>