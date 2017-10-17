<!DOCTYPE html> 
<html lang="en">
<head>
    <title>Deallo Forgotten Password</title>
    
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css.min">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    
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
    
<body>
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

             <li class="nav-item">
               <a class="nav-link" href="../index.php?logout='1'" style="color: red;">Sign out</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="pages/profile.php">Edit Profile</a>
             </li>

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
        
    <style>h2{text-align:center;} img{margin: auto; display: block;}
        .coverImg{
            display: block;
            width: 100%;
            position: relative;
            overflow: hidden;
            height: 50%;
        }
        .meetTagline{
            text-align: center;
            font-family: sunValleyFont;
        }
        .meetTagline > h1{font-size: 70px;}
        .meetTagline > p{font-size: 20px;}
        @font-face {
            font-family: sunValleyFont;
            src: url("../styles/fonts/sun_valley.ttf");
        }
        #companyName{
            text-align: center;
        }
    </style>
    <br/><br/>
    
    <div class="container-fluid">
        <div class="row">
            
            <h1 id="companyName" class="col-md-12 col-sm-12 col-lg-12"> --- DEALLO CRAFT HOUSE --- </h1>
        </div>
        
        <br/>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 meetTagline">
                <h1>Meet Our Team</h1>
                <p>BRINGING THE BEST DEALS TO YOU LO</p>
            </div>
        </div>
        <div class="row">
            <img src="../images/team.jpg" class="coverImg"/>
        </div>
        
        <br/><br/>
        
    </div>
    
    <div class="container">
        <div class="row">

                <section class="col-md-4 col-sm-4 col-lg-4">
                    <img src="../images/adminProfile.png" class="img-rounded"/>
                    <h2>Viv</h2>
                    <p>Vivien is the project leader in the development team for Deallo Craft House. She specializes in backend integration as well as the scripting used in our webpage.</p>
                </section>

                <section class="col-md-4 col-sm-4 col-lg-4">
                    <img src="../images/adminProfile.png" class="img-rounded"/>
                    <h2>Sel</h2>
                    <p>Selena is a scrum member of our team who is responsible for the overall design and user experience of this web application.</p>
                </section>

                <section class="col-md-4 col-sm-4 col-lg-4">
                    <img src="../images/adminProfile.png" class="img-rounded"/>
                    <h2>Tay</h2>
                    <p>Tay is also a scrum member who's main duties lie with promoting the ease of use of our application.</p>
                </section>
        
            </div>
        </div>
    
        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Deallo's Craft House</p>
            </div>
        <!-- /.container -->
        </footer>
    
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