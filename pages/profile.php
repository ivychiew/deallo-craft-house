<?php

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
    <title>Deallo User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <link href="../css/style.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 
    elements and media queries --> 
    <!-- WARNING: Respond.js doesn't work if you view the 
    page via file:// --> 
    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script> 
    <script src="js/respond.min.js"></script> 
    <![endif]--> 
</head>
    
    <body class="container" data-ng-app="myApp">
        <div class="well text-center row" data-ng-controller="myCtrl">
            <h1>PROFILE</h1>

            <div id="profileDetails" data-ng-model="profileDetails" data-ng-show="!showEdit">
                <img src="../images/DealloLogo.png" alt="profilePicture" class="img-circle" height="200px" width="200px"/>
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
                
                <img src="../images/DealloLogo.png" alt="profilePicture" class="img-circle" height="200px" width="200px"/>
                <h2>EDIT PROFILE</h2>
                <h3 class="label label-success"><span class="glyphicon glyphicon-envelope"></span> Verified with e-mail</h3>
                <br/><br/>
                
                <form action="profileAction.php" name="profileAction" id="profileAction" method="post" class="form-vertical" novalidate>
                    
                    <div class="form-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        
                        <h3><?php $username ?></h3>
                        
                        <input type="text" name="password1" id="password1" class="form-control" placeholder="Password" size="10" max="10">
                       
                        <input type="password2" name="password2" class="form-control" placeholder="Password, again" size="10" max="10">
                        
                        <br/>
                        <label class="control-label">Profile Picture </label>
                        <input class="input-group" type="file" name="uploadfile" accept="image/*" />
                        
<!--
                        <input type="email" name="email" class="form-control" placeholder="E-mail address" size="20" max="20">
                        
                        <input type="cityCountry" name="cityCountry" class="form-control" placeholder="City,Country" size="10" max="10">

                        <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Describe yourself here..."></textarea>
-->

                        <br/><br/>
                        <p>
                            <button type="submit" class="btn btn-primary" form="profileAction" data-ng-click="showEdit=!showEdit" name="submitForm">DONE EDITING<span class="glyphicon glyphicon-pencil"></span></button>
                        </p>
                    </div>
 
                
                </form>
            </div>
        </div>
    </body>
    
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
</html>