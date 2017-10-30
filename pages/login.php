<?php include_once '..\includes\server.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Deallo Craft House - Login</title>
	<link rel="stylesheet" type="text/css" href="..\styles\login_styles.css"/>
    <link rel="icon" type="image/png" href="images/DealloLogo-favicon.png"/>
    
	<script src="https://apis.google.com/js/platform.js" async defer></script>
   
</head>
<body class="bg">

	<!--START Facebook SDK for Javascript-->
	<script>
	window.fbAsyncInit = function() {
		FB.init({
		  appId      : '187019978535195',
		  cookie     : true,
		  xfbml      : true,
		  version    : 'v2.10'
		});
		  
		FB.getLoginStatus(function(response) {
			statusChangeCallback(response);
		});   
		  
	  };

	  (function(d, s, id){
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement(s); js.id = id;
		 js.src = "https://connect.facebook.net/en_US/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	   
	   function statusChangeCallback(response){
		   if(response.status === 'connected'){
			   console.log('Logged in and authenricated');
		   }else{
			   console.log('NOT Logged in and authenricated');
		   }
	   }
	   function checkLoginState() {
		  FB.getLoginStatus(function(response) {
			statusChangeCallback(response);
		  });
		}

	   
	</script>
	<!--END Facebook SDK for Javascript-->

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
		
		<!--<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="true" data-auto-logout-link="false" data-use-continue-as="true"></div>-->
        
		<fb:login-button 
		  scope="public_profile,email"
		  onlogin="checkLoginState();">
		</fb:login-button>

		<br/><br/>
		
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