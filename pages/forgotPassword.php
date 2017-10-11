<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

if (isset($_POST['submit'])){

$surname = isset($_POST['surname'])? $_POST['surname'] : '';
$color = isset($_POST['color'])? $_POST['color'] : '';
$email = isset($_POST['email'])? $_POST['email'] : '';
    
//Spambot detector
if(!empty($_POST['honeyPot']))
{
    echo "Authentication Error: You're not human.";
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
           echo "RECORD EXIST <br/>" ;
            while($row = mysqli_fetch_assoc($result)) {
                echo "username: " . $row["username"]. " - Password: " . $row["password"]. "<br>";
            //header("Location:../index.php");

            }
        }
        else{
            echo "NO RECORD FOUND";
        }   
    }
}
?>


<!DOCTYPE html> 
<html lang="en">
<head>
    <title>Deallo Forgotten Password</title>
    
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css.min">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <link href="../styles/style.css" rel="stylesheet" type="text/css">
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
    
<body data-ng-app="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-fixed-top">
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

            <?php  if (isset($_SESSION['username'])) : ?>
            <!-- <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p> -->
           <!--  <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p> -->
         
             <li class="nav-item">
               <a class="nav-link" href="../index.php?logout='1'" style="color: red;">Sign out</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="pages/profile.php">Edit Profile</a>
             </li>

             <?php endif ?>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Products</a>
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
    
    <div class="container">

        <h1 id="dangTagline" align="center">Dang! Forgot your password?</h1>

        <form method="post" name="forgotPassForm" class="form form-vertical" action="forgotPassword.php" data-ng-show="!successPassword">
            
            <br/>
            <input type="text" class="form-control" name="surname" placeholder="What is your surname backwords?"/>
            
            <br/>
            <input type="text" class="form-control" name="color" placeholder="What is your favourite color?"/>
            
            <br/>
            <input type="email" class="form-control" name="email" placeholder="Enter email here"/>
            
            <br/>
            <input type="text" name="honeyPot" class="honeyPot" class="form-control" value="" placeholder="If you see this leave this form field blank and invest in CSS support."/>
            
            
            <br/>
            <p>
                <button type="submit" name="submit" class="btn btn-success">Reset my password</button>
            </p>
        </form>
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

