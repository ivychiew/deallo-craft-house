<!DOCTYPE html> 
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
	
    <title>Deallo Craft House</title>
	<!-- Custom styles for this template -->
	<link href="..\styles\bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="..\styles\bootstrap\bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="../images/DealloLogo-favicon.png"/> 
    <link href="..\styles\bootstrap\bootstrap.css" rel="stylesheet" type="text/css">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 
    elements and media queries --> 
    <!-- WARNING: Respond.js doesn't work if you view the 
    page via file:// --> 
    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script> 
    <script src="js/respond.min.js"></script> 
    <![endif]--> 
</head>
        
<body class="container-fluid">

     <!-- Navigation -->
     <div class="navbar navbar-inverse nav-fixed-top" role="navigation">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" rel="home" href="#">Deallo's Craft House</a>
      </div>

      <div class="collapse navbar-collapse">


        <ul class="nav navbar-nav"><!--    unordered list start -->
          <li><a href="#"> <span class="glyphicon glyphicon-shopping-cart"></span> &nbsp; Cart</a></li>

          <li><a class="nav-link" href="index.php?logout='1'">Sign Out</a></li>
          <li><a href="#">Questions?</a></li>
          <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Clothing</a></li>
                     <li class="divider"></li>
                    <li><a href="#">Accessories</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Food</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Furniture</a></li>
                  </ul>
                </li>

          <button type="button" class="btn btn-default navbar-btn" style="list-style-type: none;">
              <?php  if (isset($_SESSION['username'])) : ?>
                <li class="nav-item">
                  <a class="nav-link" href="pages/profile.php">
                    <span>Welcome <?php echo $_SESSION['username'] ?></span>
                  </a>
                 </li>
              <?php endif ?>
          </button>
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

    <!-- end of navbar -->
	

    
    
    
        
    <footer class="py-5 bg-dark">
    <div class="container">
            <p class="m-0 text-center text-white col-md-12 col-sm-12 col-lg-12">Copyright &copy; Deallo's Craft House</p>
      </div>
    </footer>
    
</body>
    
    <!-- jQuery – required for Bootstrap's JavaScript plugins) --> 
    <script src="../js/jquery.min.js"></script> 
    <!-- All Bootstrap  plug-ins  file --> 
    <script src="../js/bootstrap.min.js"></script> 
    <!-- Basic AngularJS --> 
    <script src="../js/angular.min.js"></script> 
    <!-- AngularJS - Routing --> 
    <script src="../js/angular-route.min.js"></script>
    
</html>