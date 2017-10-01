<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Deallo User Profile</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    
<link href="style.css" rel="stylesheet" type="text/css">
</head>
    <body class="row">
        <div class="well text-center">
        <h1>PROFILE</h1>
            <div id="profileDetails">
                <img src="../images/beebo.jfif" alt="profilePicture" class="img-circle"/>
                <h2>Username</h2>
                <h3 class="label label-success"><span class="glyphicon glyphicon-envelope"></span> Verified with e-mail</h3>
                <p>Kuching, Sarawak</p>

                <a href="#">News <span class="badge">5</span></a><br>
                <a href="#">Comments <span class="badge">10</span></a><br>
                <a href="#">Updates <span class="badge">2</span></a>
                <br/><br/>
                <p><button type="button" class="btn btn-primary" >Edit Profile <span class="glyphicon glyphicon-pencil"></span></button></p>

            </div>
        </div>
    </body>
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
</html>