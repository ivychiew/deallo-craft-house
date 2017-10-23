<!--Include User Session Script-->
<?php include '../includes/sessions.php' ?>
<!--Include Delete Products Config-->
<?php include '../includes/products_delete.php' ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Sales Page</title>

    <!-- custom stylesheet -->
    <link rel="stylesheet" href="../styles/products_css.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.js"></script>

 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet=" href="styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../styles/test.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/products.css"/>
    </head>
   

<body>
  <!-- Navigation -->
 <div class="navbar navbar-default navbar-inverse nav-fixed-top" role="navigation">
  
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" rel="home" href="../index.php">Deallo's Craft House</a>
  </div>
  
  <div class="collapse navbar-collapse">

    
    <div class="col-sm-3 col-md-3 navbar-right">
      <form class="navbar-form" role="search">
      <div class="input-group ">
        <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
      </form>
    </div>

   
    <ul class="nav navbar-nav"><!--unordered list start -->
    <li class="dropdown">
     <?php  if (isset($_SESSION['username'])) : ?>
              <a href="products.php" class="dropdown-toggle" data-toggle="dropdown" style="color: #577B84">Welcome <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php">Edit Profile</a></li>
                <li class="divider"></li>
                <li><a class="nav-link" href="index.php?logout='1'">Sign Out</a></li>
                 <li class="divider"></li>
                <li><a href="customer-supp.php">Questions?</a></li>
              </ul>
            </li>
       <?php endif ?>
     
      <li class="dropdown">
              <a href="products.php" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="products.php">All Products</a></li>
                <li class="divider"></li>
                <li><a href="#">Clothing</a></li>
                <li class="divider"></li>
                <li><a href="#">Accessories</a></li>
                <li class="divider"></li>
                <li><a href="#">Food</a></li>
                <li class="divider"></li>
                <li><a href="#">Furniture</a></li>
              </ul>
      </li>
      <li><a href="#"> <span class="glyphicon glyphicon-shopping-cart"></span> &nbsp; Cart</a></li>
    </ul>
  </div>
</div>

<div class="container">

  <div class="page-header">
    <br>
      <h1 class="h2">My Sales</h1> 
    </div>
    
  <br/>

	<div class="row">
		<canvas id="myChart" width="400" height="100"></canvas>
       <div class="list-group">
            <a href="pages/cloth_acce.php" class="list-group-item">Clothing and Accessories</a>
            <a href="pages/jewelry.php" class="list-group-item">Jewellery</a>
            <a href="pages/craft.php" class="list-group-item">Craft Supplies</a>
            <a href="pages/bedding.php" class="list-group-item">Room Decor</a>
            <a href="pages/soft_toy.php" class="list-group-item">Toys</a>
            <a href="pages/vintage.php" class="list-group-item">Vintage Art</a>
            <a href="pages/wedding.php" class="list-group-item">Wedding Accessories</a>
          </div>

	</div>  
</div>


<!-- Latest compiled and minified JavaScript -->
<script src="../js/bootstrap.min.js"></script>
<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(0, 51, 102, 0.8)',
                'rgba(0, 0, 0, 1)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(0,51,102,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

<script type='text/javascript' src='../js/buttonToggle.js'></script>

</body>
</html>