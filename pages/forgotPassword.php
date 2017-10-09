<!DOCTYPE html> 
<html>
<head>
    <title>Deallo Forgotten Password</title>
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
    
<body data-ng-app="">
    <div class="container">

        <h1 id="dangTagline" align="center">Dang! Forgot your password?</h1>

        <form method="post" form="forgotPassForm" class="form form-vertical" action="forgotPasswordAction.php" data-ng-show="!successPassword">
            
            <br/>
            <input type="question1" class="form-control" name="question1" placeholder="What is your surname backwords?"/>
            
            <br/>
            <input type="question2" class="form-control" name="question2" placeholder="What is your favourite color?"/>
            
            <br/>
            <input type="email" class="form-control" name="email" placeholder="Enter email here"/>
            
            <br/>
            <p>
                <button type="submit" class="btn btn-success" form="forgotPassForm" data-ng-click="successPassword=!successPassword">Reset my password</button>
            </p>
        </form>

        <div data-ng-show="successPassword">
            <h4>SUBMITTED SUCCESSFULLY!</h4>
            <p><a href="../login.php">Back to Login</a></p>
        </div>
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

