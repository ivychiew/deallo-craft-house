<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

if (isset($_POST['submit'])){

$surname = isset($_POST['surname'])? $_POST['surname'] : '';
$color = isset($_POST['color'])? $_POST['color'] : '';
$email = isset($_POST['email'])? $_POST['email'] : '';
    
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
            <p>
                <button type="submit" name="submit" class="btn btn-success">Reset my password</button>
            </p>
        </form>
        
        <p>Password: <?php $row["password"]; ?></p>

<!--
        data-ng-click="successPassword=!successPassword"
        <div data-ng-show="successPassword">
            <h4>SUBMITTED SUCCESSFULLY!</h4>
            <p><a href="login.php">Back to Login</a></p>
        </div>
-->
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

