<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Deallo Product Search Page" />
	<meta name="keyword" content="HTML, CSS, Javascript" />
	<meta name="author" content="Tay Guan Yun,Selena Yap"/>
	
	<title>Search Result Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet=" href="../styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
<<<<<<< HEAD
    <link rel="stylesheet" type="text/css" href="../styles/footer.css"/>
=======
	<link rel="stylesheet" type="text/css" href="../styles/buttons.css"/>
>>>>>>> 664c4c42f28a070f400837ab1b3f1a8e127a5e20
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
	
    <?php include '../templates/navbar.php' ?>

    <div class="container-fluid">

        <?php

            $searchTerm = '';
            $searchTerm = $_GET['searchTerm'];

            //If not set
            if(empty($searchTerm) || $searchTerm === NULL)
            {	
                echo "Search bar is empty. Please key in a keyword."; 
            }
            else
            {
                //Connect to database
                $conn = mysqli_connect("localhost", "root", "", "deallo_udb");
                if(mysqli_connect_errno())
                {
                    echo "Failed to connect";
                }
                else
                {
                    $query = mysqli_query($conn, "SELECT * FROM product WHERE name LIKE '%$searchTerm%'") or die(mysqli_error());
                    $numrows = mysqli_num_rows($query);

                }
            if($numrows == 0)
            {
                echo "<h3 class='text-center'>We were unable to find results for " . $searchTerm . "</h3>";
            }
            else
            {	
                echo "<h2>Search Results for: " . $searchTerm . "</h2>";
                echo "<hr/>";
                while($row = mysqli_fetch_array($query))
                {
                    $category = $row['category'];
                    $name = $row['name'];
                    $picture = $row['image'];
                    $price = $row['price'];
                    $productOwner = $row['product_owner'];

               ?>     

        <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12 mb-4">
          <br/>
                  <div class="well">
                      <!--Print out product picture -->
                     <img src="../images/product_images/<?php echo $row['image']; ?>" align="middle" class="img-responsive mx-auto d-block" width="200px" height="200px" />

                    <!--Print out product name -->
                    <div class="card-body">
                      <h3 class="card-title">
                        <a href="products.php"><?php echo $name ?></a>
                      </h3>
                      <!--Print out product price -->
                      <h4 class="product-price">
                          <?php echo "RM $price  &nbsp &nbsp"; ?>
                      </h4>
                      <hr/>
                      <!--Print out product owner -->
                      <h4 class="product-owner">
                          <?php echo "$productOwner &nbsp"; ?>
                      </h4>
                  </div>
                </div>
              </div>

        <?php
                }
            }

            //Disconnect to database
            mysqli_close($conn);
            }
        ?>
    </div>
    
    <?php include '../templates/footer.php' ?>	
	
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
