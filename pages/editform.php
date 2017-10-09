<?php
    error_reporting( ~E_NOTICE );
    
    require_once '../includes/product_config.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT productName, productPrice, productPic FROM product_tbl WHERE productID =:pid');
        $stmt_edit->execute(array(':pid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: products.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    {
        $productname = $_POST['product_name'];
        $productprice = $_POST['product_price'];
        // $productcategory = $_POST['product_category']; 
            
        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];
                    
        if($imgFile)
        {
            $upload_dir = '../images/product_images/'; // upload directory  
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $userpic = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$edit_row['productPic']);
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else
                {
                    $errMSG = "Sorry, your file is too large it should be less then 5MB";
                }
            }
            else
            {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
            }   
        }
        else
        {
            // if no image selected the old image remain as it is.
            $productpic = $edit_row['productPic']; // old image from database
        }   
                        
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE product_tbl 
                                         SET productName=:pname, 
                                             productPrice=:pprice, 
                                             productPic=:ppic
                                             -- productCategory=pcat 
                                       WHERE productID=:pid');
            $stmt->bindParam(':pname',$productname);
            $stmt->bindParam(':pprice',$productprice);
            $stmt->bindParam(':ppic',$productpic);
            $stmt->bindParam(':pid',$id);
            // $stmt->bindParam(':pcat',$productcategory);
            
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='products.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }
        
        }
        
                        
    }
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload, Insert, Update, Delete an Image using PHP MySQL - Coding Cage</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="jquery-1.11.3-jquery.min.js"></script>
</head>
<body>




<div class="container">


    <div class="page-header">
        <h1 class="h2">update profile. <a class="btn btn-default" href="index.php"> all members </a></h1>
    </div>

<div class="clearfix"></div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
    
    
    <?php
    if(isset($errMSG)){
        ?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
    }
    ?>
   
    
    <table class="table table-bordered table-responsive">
    
    <tr>
        <td><label class="control-label">Product Name.</label></td>
        <td><input class="form-control" type="text" name="product_name" value="<?php echo $productName; ?>" required /></td>
    </tr>
    
    <tr>
        <td><label class="control-label">Price.</label></td>
        <td><input class="form-control" type="text" name="product_price" value="<?php echo $productPrice; ?>" required /></td>
    </tr>
    
    <tr>
        <td><label class="control-label">Product Img.</label></td>
        <td>
            <p><img src="../images/product_images/<?php echo $productPic; ?>" height="150" width="150" /></p>
            <input class="input-group" type="file" name="product_image" accept="image/*" />
        </td>
    </tr>

    <tr>
        <td><label class="control-label">Select Category</label></td>
        <td>
        <select name="product_category" value="<?php echo $productcategory ?>"/>
        <option>...</option>
        <option>Food</option>
        <option>Furniture</option>
        <option>Jewelry</option>
        <option>Clothes</option>
        <option>Souvenirs</option>
        <option>Gifts</option>
        </select>
        
        </td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>

</div>
</body>
</html>