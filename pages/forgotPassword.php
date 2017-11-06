<?php include '..\includes\server.php' ?>
<?php include '..\includes\errors.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
	<meta name="keyword" content="HTML, CSS, Javascript" />
    <meta name="author" content="Selena Yap"/>
	
    <title>Deallo Craft House - Forgot Password</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
	
	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="../styles/login_styles.css"/>
	<link rel="stylesheet" type="text/css" href="../styles/test.css"/>
	<link rel="icon" type="image/png" href="../images/DealloLogo-favicon.png">
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 
    elements and media queries --> 
    <!-- WARNING: Respond.js doesn't work if you view the 
    page via file:// --> 
    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script> 
    <script src="js/respond.min.js"></script> 
    <![endif]--> 
   
</head>
    
<body class="bg forgotbg">

    <div class="container">

    <div class="row"> 
        <div class="col-md-12">
        <h1 id="dangTagline" align="center">Dang! Forgot your password?</h1>
        <br>
        </div>
    </div>

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

