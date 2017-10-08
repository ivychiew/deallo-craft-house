<?php
session_start();

    if(isset($_POST['submitform']))
    {
        $dir="upload/";
        $image=$_FILES['uploadfile']['name'];
        $temp_name=$_FILES['uploadfile']['tmp_name'];

        if($image!="")
        {
            if(file_exists($dir.$image))
            {
                $image= time().'_'.$image;
            }

            $fdir= $dir.$image;
            move_uploaded_file($temp_name, $fdir);
        }

            $query="insert IGNORE into 'images' ('id','file') values ('','$image')";
            mysqli_query($con,$query) or die(mysqli_error($con));

            echo "File Uploaded Suucessfully!";
    }
?>

<!DOCTYPE html> 
<html>
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
	
    <title>Deallo User Profile</title>
	<!-- Custom styles for this template -->
	<link href="..\styles\profile.css" rel="stylesheet" type="text/css">
	<link href="..\styles\bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="..\styles\bootstrap\bootstrap.css" rel="stylesheet" type="text/css">
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 
    elements and media queries --> 
    <!-- WARNING: Respond.js doesn't work if you view the 
    page via file:// --> 
    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script> 
    <script src="js/respond.min.js"></script> 
    <![endif]--> 
</head>
        
	<body class="container-fluid" data-ng-app="myApp">
	
	    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
         
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <!--If user is logged in, display this section of the navbar--> 
            <?php  if (isset($_SESSION['username'])) : ?>
            <!-- <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p> -->
           <!--  <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p> -->
                <li class="nav-item">
                  <a class="nav-link" href="index.php?logout='1'">Sign out</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/profile.php">Profile</a>
                </li>
             <?php endif ?>
             

            <li class="nav-item">
              <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Shopping Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	
	
    <!-- Page Content -->

        <div class="well text-center col-md-12 col-lg-12" data-ng-controller="myCtrl">
            <h1>PROFILE</h1>

            <div id="profileDetails" data-ng-model="profileDetails" data-ng-show="!showEdit">
                <img src="../images/DealloLogo.png" alt="profilePicture" class="img-circle" height="200" width="200"/>
                <h2>Username</h2>
                <h3 class="label label-success"><span class="glyphicon glyphicon-envelope"></span> Verified with e-mail</h3>
                <br/><br/>
                <p>Kuching, Sarawak</p>

                <a href="#">News <span class="badge">5</span></a><br>
                <a href="#">Comments <span class="badge">10</span></a><br>
                <a href="#">Updates <span class="badge">2</span></a>
                <br/><br/>
                <p><button type="button" class="btn btn-primary" data-ng-click="showEdit=!showEdit">Edit Profile<span class="glyphicon glyphicon-pencil"></span></button></p>
            </div>
            
            <div id="EditProfileDetails" data-ng-model="EditProfileDetails" data-ng-show="showEdit">
                
                <img src="../images/DealloLogo.png" alt="profilePicture" class="img-circle" height="200" width="200"/>
                <h2>EDIT PROFILE</h2>
                <h3 class="label label-success"><span class="glyphicon glyphicon-envelope"></span> Verified with e-mail</h3>
                <br/><br/>
                
                <form action="profileAction.php" name="profileAction" id="profileAction" method="post" class="form-vertical" novalidate>
                    
                    <div class="form-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        
                        <h3><?php $username ?></h3>
                        
                        <input type="text" name="username1" id="username1" class="form-control" placeholder="Username" size="10"/>
                        
                        <input type="text" name="password1" id="password1" class="form-control" placeholder="Password" size="10"/>
                       
                        <input type="password2" name="password2" class="form-control" placeholder="Password, again" size="10" max="10"/>
                        
                        <br/>
                        <label class="control-label">Profile Picture </label>
                        <input class="input-group" type="file" name="uploadfile" accept="image/*" />
                        
                        <br/><br/>
                        <p>
                            <button type="submit" class="btn btn-primary" form="profileAction" data-ng-click="showEdit=!showEdit" name="submitForm">DONE EDITING<span class="glyphicon glyphicon-pencil"></span></button>
                        </p>
                    </div>

                </form>
            </div>
        
		
	 <!-- Footer -->
	<footer class="py-5 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; Deallo's Craft House</p>
		</div>
		<!-- /.container -->
	</footer>
	
	</div>

	
    <!-- jQuery – required for Bootstrap's JavaScript plugins) --> 
    <script src="../js/jquery.min.js"></script> 
    <!-- All Bootstrap  plug-ins  file --> 
    <script src="../js/bootstrap.min.js"></script> 
    <!-- Basic AngularJS --> 
    <script src="../js/angular.min.js"></script> 
    <!-- AngularJS - Routing --> 
    <script src="../js/angular-route.min.js"></script>
    <!-- App Script --> 
    <script src="../js/dealloApp.js"></script>
	
		</body>
	
</html>