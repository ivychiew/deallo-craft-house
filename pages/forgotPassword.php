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
    <link href="../styles/style.css" rel="stylesheet" type="text/css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 
    elements and media queries --> 
    <!-- WARNING: Respond.js doesn't work if you view the 
    page via file:// --> 
    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script> 
    <script src="js/respond.min.js"></script> 
    <![endif]--> 

    
</head>
    
<body data-ng-app="">
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
    <ul class="nav navbar-nav"><!--    unordered list start -->
      <li><a href="#"> <span class="glyphicon glyphicon-shopping-cart"></span> &nbsp; Cart</a></li>

      <li><a class="nav-link" href="../index.php?logout='1'">Sign Out</a></li>
      <li><a href="#">Questions?</a></li>
      <li class="dropdown">
              <a href="products.php" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="products.php">All Products</a></li>
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

   </ul><!--  unordered list end -->

    <div class="col-sm-3 col-md-3 pull-right">
      <form class="navbar-form" role="search">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
      </form>
    </div>
    
  </div>
</div>
    
    <div class="container">

        <h1 id="dangTagline" align="center">Dang! Forgot your password?</h1>

        <form method="post" name="forgotPassForm" class="form form-vertical" action="forgotPassword.php" data-ng-show="!successPassword">
            
            <br/>
            <input type="text" class="form-control" name="surname" placeholder="What is your surname backwords?"/>
            
            <br/>
            <input type="text" class="form-control" name="color" placeholder="What is your favourite color?"/>
            
            <br/>
            <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email" placeholder="Enter email here"/>
            
            <br/>
            <input type="text" name="honeyPot" class="honeyPot" class="form-control" value="" placeholder="If you see this leave this form field blank and invest in CSS support."/>
            
            
            <br/>
            <p>
                <button type="submit" name="submit" class="btn btn-success">Reset my password</button>
            </p>
        </form>
        
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "deallo";

            if (isset($_POST['submit'])){

                $surname = isset($_POST['surname'])? $_POST['surname'] : '';
                $color = isset($_POST['color'])? $_POST['color'] : '';
                $email = isset($_POST['email'])? $_POST['email'] : '';

                //Spambot detector
                if(!empty($_POST['honeyPot']))
                {
                    echo "Authentication Error: You're not human. We see you.";
                }

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                else{

                    $sql = "SELECT * FROM users WHERE email = '$email' AND surname='$surname' AND color = '$color'";

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {

                        header("Location:editPassword.php");
                    }
                    else{
                        echo "<h2>NO RECORD FOUND</h2>";
                        echo "<p>Maybe you've mispelled something? Try again.</p>";
                    }   
                }
            }
        ?>
        
    </div>
</body>

    <!-- jQuery – required for Bootstrap's JavaScript plugins) --> 
    <script src="../js/jquery.min.js"></script> 
    <!-- All Bootstrap  plug-ins  file --> 
    <script src="../js/bootstrap.min.js"></script> 
    <!-- Basic AngularJS --> 
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <!-- AngularJS - Routing --> 
    <script src="../js/angular-route.min.js"></script>
    
</html>

