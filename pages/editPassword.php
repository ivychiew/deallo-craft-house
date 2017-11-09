<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
	<meta name="keyword" content="HTML, CSS, Javascript" />
    <meta name="author" content="Selena Yap"/>
    
	<title>Deallo Craft House - Edit Password</title>
  <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!--Custom CSS-->
    <link href="../styles/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../styles/test.css">
    <link rel="stylesheet" href="../styles/footer.css">
	<link rel="stylesheet" href="../styles/buttons.css">
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
<?php include "../templates/navbar.php" ?>
    <div class="container-fluid">
        <br/><br/>
        
        <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
            
            
        <div class="col-lg-4 col-md-4 col-sm-4">
            <img src="../images/editPasswordIcon.png" class="col-lg-6 col-md-6 col-sm-6" alt="editPasswordIcon"/>
            <h2 id="dangTagline" class="col-lg-6 col-md-6 col-sm-6" align="center">EDIT PASSWORD</h2>
        </div>
        
        
        <form method="post" class="form form-vertical col-lg-6 col-md-6 col-sm-6" action="editPassword.php">
            
<!--        <?php include('..\includes\errors.php'); ?>-->
            
            <div class="form-group col-lg-6 col-md-6 col-sm-6">
              <input type="text" name="username1" id="username1" class="form-control" placeholder="Username" size="10"/>
            </div>
            
            <div class="form-group col-lg-6 col-md-6 col-sm-6">
                <input type="text" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="password1" class="form-control" placeholder="Password" size="10"/>
            </div>
            
            <div class="form-group col-lg-6 col-md-6 col-sm-6">
                <input type="password2" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" placeholder="Password, again" size="10" max="10"/>
            </div>
            
            <div class="form-group col-lg-6 col-md-6 col-sm-6">
                <button type="submit" class="btn btn-success" name="submit">RESET PASSWORD<span class="glyphicon glyphicon-pencil"></span></button>
            </div>
        </form>
        
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "deallo_udb";
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
                $queryUsername = "SELECT * FROM user WHERE username = '$username1'";

                $resultUsername = mysqli_query($dbi, $queryUsername);

                if (mysqli_num_rows($resultUsername) > 0) {
                    $sql = "UPDATE user SET password='$password1' WHERE username='$username1'";

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
    </div>
	<?php include "../templates/footer.php" ?>
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

