<?php

session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register";
    $sql = null;

    $username1= '';
    $password1='';
    $password2='';
    $email='';
    $bio='';
    $country='';
    $address='';
    $phoneNumber='';
    $fullPathName='';


    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['submitForm'])){

        //Assign local variables values from form
        $username1 = mysqli_real_escape_string($conn, $_POST['username1']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
        $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $bio = mysqli_real_escape_string($conn, $_POST['bio']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);

    //1- If got username
    if(!empty($username1)){
        
        //2- If got password
        if(!empty($password1) && !empty($password2))
        {
            //Checks if passwords are identical
            if($password1 <> $password2){
                echo "Your passwords do not match!";
            }else{      //If password match
        
                //Update the password
                $sql = "UPDATE users SET password='$password1' WHERE username='$username1'";

                if (mysqli_query($conn, $sql)){
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Password updated successfully')
                    </SCRIPT>");
                }else{
                    echo "Error updating password: " . mysqli_error($conn);
                }
            } 
        }
        
        //3-If got bio
        if(!empty($bio)){
            $sqlBio = "UPDATE users SET bio='$bio' WHERE username='$username1'";
            mysqli_query($conn, $sqlBio);
        }
        
        //4-If got country
        if(!empty($country)){
            $sqlCountry = "UPDATE users SET country='$country' WHERE username='$username1'";
            mysqli_query($conn, $sqlCountry);
        }
        
        //5 - If got Email
        if(!empty($email)){
            $sqlEmail = "UPDATE users SET email='$email' WHERE username='$username1'";
            mysqli_query($conn, $sqlEmail);
        }

        //5- Profile Picture upload
        if(!empty($_FILES['user_image']["name"])){
            $imgFile = $_FILES['user_image']['name'];
            $tmp_dir = $_FILES['user_image']['tmp_name'];
            $imgSize = $_FILES['user_image']['size'];


            $upload_dir = '../images/profile_images'; //set upload directory

            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            
            $path = dirname("localhost/deallo-craft-house/images/profile_image");
            
            // rename uploading image
            $profilePic = $imgFile;

            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){           
                // Check file size '5MB'
                if($imgSize < 5000000){
                    //moves an uploaded file to a database images
                    move_uploaded_file($tmp_dir,$upload_dir.$profilePic);
                }else{
                    $errMSG = "Sorry, your file is too large.";
                }
            }
            else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
            }

            $insertImage = "UPDATE users SET profile_image = '$imgFile' WHERE username='$username1'";
            
            if ($result = mysqli_query($conn, $insertImage)) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('SUCCESS IMAGE')
                window.location.href='profile.php';
                </SCRIPT>");
                       
            }else{
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('NOT SUCESS IMAGE')
                window.location.href='profile.php';
                </SCRIPT>");
            }
        }
        //5- Profile Picture upload END
    
        
    }else{  //if no username
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Enter your username to change details!')

        </SCRIPT>");
    }
        
}

?>


<!DOCTYPE html> 
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
	
    <title>Deallo User Profile</title>
	<!-- Custom styles for this template -->
	<!-- <link href="..\styles\bootstrap\bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="..\styles\bootstrap\bootstrap.css" rel="stylesheet" type="text/css"/> -->
    <link rel="icon" type="image/png" href="../images/DealloLogo-favicon.png"/>

	<!--Nav and Footer Stylesheet--> 
    <link rel="stylesheet" href="../styles/test.css"/>
	<link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
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
        
<!-- <body class="container-fluid" data-ng-app="myApp"> -->
<body data-ng-app="myApp">
	
<!-- Navigation -->
 <div class="navbar navbar-default navbar-inverse nav-fixed-top" role="navigation">
  
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" rel="home" href="../index.php">Deallo's Craft House</a>
  </div>
  
  <div class="collapse navbar-collapse">

    
    <div class="col-sm-3 col-md-3 navbar-right">
      <form class="navbar-form" role="search">
      <div class="input-group ">
        <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
      </form>
    </div>

    <?php  if (isset($_SESSION['username'])) : ?>
    <ul class="nav navbar-nav"><!--unordered list start -->
    <li class="dropdown">
              <a href="pages/products.php" class="dropdown-toggle" data-toggle="dropdown" style="color: #577B84">Welcome <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="pages/profile.php">Edit Profile</a></li>
                <li class="divider"></li>
                <li><a class="nav-link" href="index.php?logout='1'">Sign Out</a></li>
                 <li class="divider"></li>
                <li><a href="customer-supp.php">Questions?</a></li>
              </ul>
            </li>
       <?php endif ?>
     
      <li class="dropdown">
              <a href="pages/products.php" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="pages/products.php">All Products</a></li>
                <li class="divider"></li>
                <li><a href="#">Clothing</a></li>
                <li class="divider"></li>
                <li><a href="#">Accessories</a></li>
                <li class="divider"></li>
                <li><a href="#">Food</a></li>
                <li class="divider"></li>
                <li><a href="#">Furniture</a></li>
              </ul>
      </li>
      <li><a href="#"> <span class="glyphicon glyphicon-shopping-cart"></span> &nbsp; Cart</a></li>
    </ul>
  </div>
</div>
<!--End of Nav Bar-->
	
<div class="container">
<!-- Page Content -->
   <div class="row well text-center" data-ng-controller="myCtrl">
    <div class="col-md-6 col-lg-6 col-sm-6">
      <div class="well">
            <!--HERE-->
            <?php           
            if (isset($_SESSION['username'])){ 
                $sessionUser= $_SESSION['username'];
            }          
            $queryImage = "SELECT profile_image FROM users WHERE username='$sessionUser'";

              $resultImage = mysqli_query($conn,$queryImage);
              
                mysqli_num_rows($resultImage) == 1;
                $row = mysqli_fetch_assoc($resultImage);
  
                    $last = $row['profile_image'];
              
              //If profile pic never set, template image used
              if($last == "../images/adminProfile.png"){
                  $fullPath = $last;  
              }else{
                  //If custom picture set
                    $fullPath = "../images/profile_images" . $last;  
                  }

            ?>

                    
                <img src="<?php echo $fullPath ?>" alt="Profile_Picture" height="200" width="200" class="img-circle"/>
                    
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                    <?php  if (isset($_SESSION['username'])) : ?>
                    <h4>Username: <?php echo $_SESSION['username']; ?></h4>
                    <?php endif ?>
                    </div>
                </div>
                </div>
            </div>

            <div id="profileDetails" data-ng-model="profileDetails" data-ng-show="!showEdit" class="col-md-6">
                
                <h2><?php echo $_SESSION['username'] = $username1; ?></h2>
                
                <h3 class="label label-success"><span class="glyphicon glyphicon-envelope"></span> Verified with e-mail</h3>
                
                <br/><br/>
                <p>Kuching, Sarawak</p>

                <a href="#">News <span class="badge">5</span></a><br>
                <a href="#">Comments <span class="badge">10</span></a><br>
                <a href="#">Updates <span class="badge">2</span></a>
                <br/><br/>
                <p><button type="button" class="btn btn-primary" data-ng-click="showEdit=!showEdit">Edit Profile <span class="glyphicon glyphicon-pencil"></span></button></p>
            </div>
            
            <div id="EditProfileDetails" data-ng-model="EditProfileDetails" data-ng-show="showEdit" class="col-md-6 col-lg-6 col-sm-6">
                
                <h2>EDIT PROFILE</h2>
                <h3 class="label label-success"><span class="glyphicon glyphicon-envelope"></span> Verified with e-mail</h3>
                <br/><br/>
                
                <form action="profile.php" id="profileAction" method="post" class="form-vertical" enctype="multipart/form-data" novalidate>
                    
                    <div class="form-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
   
                        <input type="text" name="username1" id="username1" class="form-control" placeholder="Username" size="10"/>
                        
                        <br/>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="text" name="password1" id="password1" class="form-control" placeholder="Password" size="10"/>
                       
                        <br/>
                        <input type="password2" name="password2" class="form-control" placeholder="Password, again" size="10" max="10"/>
                        
                        <br/>
                        <input type="email" name="email" class="form-control" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" size="10"/>
                        
                        <br/>
                        <input type="text" name="country" class="form-control" placeholder="Country" size="10" max="10"/>
                        
                        <br/>
                        <input type="text" name="address" class="form-control" placeholder="Address" size="10">
                        
                        <br/>
                        <input type="text" name="phoneNumber" class="form-control" placeholder="Phone Number (Without dashes)" size="10" max="11"/>
                        
                        <br/>
                        <div class="form-group">
                            <textarea class="form-control" name="bio" rows="5" id="bio" placeholder="About Me"></textarea>
                        </div>

                        <label class="control-label">Profile Picture </label>
                        <input class="input-group" type="file" name="user_image" accept="image/*" />
                        
                        <p>
                            <button type="submit" class="btn btn-primary" data-ng-click="showEdit=!showEdit" name="submitForm">DONE EDITING<span class="glyphicon glyphicon-pencil"></span></button>
                        </p>
                    </div>

                </form>
                <br/>
            </div>
        </div>
</div>

	 <!-- Footer -->
<footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Deallo's Craft House</p>
      </div>
      <!-- /.container -->
    </footer>

	
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