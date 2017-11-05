<?php include '..\includes\server.php' ?>
<?php include '..\includes\errors.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Deallo Craft House - Login</title>
	<link rel="stylesheet" type="text/css" href="..\styles\login_styles.css"/>
    <link rel="icon" type="image/png" href="../images/DealloLogo-favicon.png"/>
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
    
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

<div class="container"> 
	
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
			   console.log('Logged in and authenticated');
			   setElements(true);
			   testAPI();
		   }else{
			   console.log('NOT Logged in and authenticated');
			   setElements(false);
		   }
	   }
	   function checkLoginState() {
		  FB.getLoginStatus(function(response) {
			statusChangeCallback(response);
		  });
		}
	
		function testAPI() {
			console.log('Welcome to Deallo! Fetching your information.... ');
			FB.api('/me?fields=name,email', function(response) {
			  if(response && !response.error){
				console.log(response);
				console.log('Successful login for: ' + response.name);  
				buildProfile(response);
				document.getElementById('username').value = response.email;
			  }
			});
		}
		
		function setElements(isLoggedIn){
			if(isLoggedIn){
				document.getElementById('profile').style.display='block';
				
			}else{
				document.getElementById('profile').style.display='none';
			}
		}
	
		function buildProfile(user){
			let profile = `
				<ul class="list-group">
					<li class="list-group-item">Username: ${user.name}</li>
					<li class="list-group-item">Email: ${user.email}</li>
				</ul>
			`;
		
		document.getElementById('profile').innerHTML=profile;
		
		console.log(user.name);
	}

	   
	</script>
	<!--END Facebook SDK for Javascript-->
	<div class="row"> 
		<div class="col-md-12"> 
			<div class="header">
				<p>  <img src="../images/DealloLogo-white.png" width="50" height="40" alt="login Deallo logo" id="login_logo"/></p>
				<h2>Deallo Craft House</h2>

			</div>
		</div>
	</div>

	<div class="form-group text-center">
	<form method="post" action="login.php">
		<div class="row"> 
		
			<div class="col-md-12"> 
			<input type="text" id="username" name="username" placeholder="username"/>
			</div>
		</div>
		
		<div class="row"> 
			<div class="col-md-12">
				<input type="password" name="password" placeholder="password"/>
			</div>
		</div>
		<div class="row"> 
			<div class="col-md-12 text-center">
				<button type="submit" class="btn" name="login_user">Login</button>
			</div>
		</div>
		<br>
		<div class="row"> 
			<div class="col-md-6 text-center">
				<p class="registered-text">
				&nbsp; &nbsp; Not registered? <a class="sign-up" href="register.php"> Sign up</a>
				</p>
			</div>
			<div class="col-md-6 pull-right">
			<p><a href="forgotPassword.php"> Forgot password?</a>
			</p>
			</div>
		</div>
		<div class="row"> 
			<div class="col-md-12 text-center">
				<h4> Or </h4>
			</div>
		</div>
		
		<div class="row">
			<div id="profile">PROFILE</div>
		</div>

		<div class="row fb"> 
			<div class="col-md-12 text-center"> 
				<fb:login-button 
			  scope="public_profile,email"
			  onlogin="checkLoginState();">
			</fb:login-button>
			</div>
		</div>

		<br/><br/>
		
	</form>
	</div>
</div>

</body>
</html>