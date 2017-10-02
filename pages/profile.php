<!DOCTYPE html> 
<html>
<head>
    <title>Deallo User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <!--<link href="style.css" rel="stylesheet" type="text/css">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 
    elements and media queries --> 
    <!-- WARNING: Respond.js doesn't work if you view the 
    page via file:// --> 
    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script> 
    <script src="js/respond.min.js"></script> 
    <![endif]--> 
</head>
    
    <body class="row" data-ng-app="myApp">
        <div class="well text-center col-lg-12 col-md-12" data-ng-controller="myCtrl">
        <h1>PROFILE</h1>
            <div id="profileDetails">
                <img src="../images/DealloLogo.png" alt="profilePicture" class="img-circle" height="200px" width="200px"/>
                <h2>Username</h2>
                <h3 class="label label-success"><span class="glyphicon glyphicon-envelope"></span> Verified with e-mail</h3>
                <p>Kuching, Sarawak</p>

                <a href="#">News <span class="badge">5</span></a><br>
                <a href="#">Comments <span class="badge">10</span></a><br>
                <a href="#">Updates <span class="badge">2</span></a>
                <br/><br/>
                <p><button type="button" class="btn btn-primary" data-ng-click="editFunc()">Edit Profile<span class="glyphicon glyphicon-pencil"></span></button></p>

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