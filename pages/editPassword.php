<!DOCTYPE html> 
<html lang="en">
<head>
    <title>Deallo Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css.min">
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

        <br/>
        <h1 id="dangTagline" align="center">EDIT PASSWORD</h1>

        <form method="post" class="form form-vertical" action="editPassword.php">
            
<!--        <?php include('..\includes\errors.php'); ?>-->
            
            <div class="form-group">
              <input type="text" name="username1" id="username1" class="form-control" placeholder="Username" size="10"/>
            </div>
            
            <div class="form-group">
                <input type="text" name="password1" id="password1" class="form-control" placeholder="Password" size="10"/>
            </div>
            
            <div class="form-group">
                <input type="password2" name="password2" class="form-control" placeholder="Password, again" size="10" max="10"/>
            </div>
            
            <p>
                <button type="submit" class="btn btn-success" name="submit">RESET PASSWORD<span class="glyphicon glyphicon-pencil"></span></button>
            </p>
        </form>
        
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "register";
        $sql = null;

        // Create connection
        $dbi = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$dbi) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST['submit'])){

            //Assign local variables values from form
            $username1 = mysqli_real_escape_string($dbi, $_POST['username1']);
            $password1 = mysqli_real_escape_string($dbi, $_POST['password1']);
            $password2 = mysqli_real_escape_string($dbi, $_POST['password2']);

            if (empty($username1)) { 
                echo "<div class=\"alert alert-warning\">" . "Username is required" . "</div>";
            }
            elseif (empty($password1)) {  
                echo "<div class=\"alert alert-warning\">" . "Password is required". "</div>";
            }
            elseif (empty($password2)) {  
                echo "<div class=\"alert alert-warning\">" . "Second password is also, required". "</p>";
            }
            elseif ($password1 != $password2) {  
                echo "<div class=\"alert alert-danger\">" . "Your passwords do not match!". "</div>"; 
            }else {
                $queryUsername = "SELECT * FROM users WHERE username = '$username1'";

                $resultUsername = mysqli_query($dbi, $queryUsername);

                if (mysqli_num_rows($resultUsername) > 0) {
                    $sql = "UPDATE users SET password='$password1' WHERE username='$username1'";

                    mysqli_query($dbi, $sql);

                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Password updated successfully, please login again!');
                    location.href = 'login.php';
                    </SCRIPT>");
                }
                else{
                    echo "USERNAME MATCHES NO RECORDS";
                } 
            }
        }

        mysqli_close($dbi);

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
