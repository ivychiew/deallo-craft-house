<?php

    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'product_config.php';
    
    if(isset($_POST['btnsave']))
    {
        $productname = $_POST['product_name'];// product name
        $productprice = $_POST['product_price'];// product price
        $productdesc = $_POST['product_description']; //product description
        $productcategory = $_POST['product_category'];
        
        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];
        
        
        if(empty($productname)){
            $errMSG = "Please Enter Your Product Name.";
        }
        else if(empty($productprice)){
            $errMSG = "Please Enter the Price of the Product.";
        }
        else if(empty($imgFile)){
            $errMSG = "Please Select Image File.";
        }
        else if(empty($productdesc)){
            $errMSG = "Please enter a Product Description";
        }
        else if(empty($productcategory)){
            $errMSG = "Please select a category";
        }
        // else if(empty())
        else
        {
            $upload_dir = '../images/product_images/'; // upload directory
    
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
        
            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        
            // rename uploading image
            $productpic = rand(1000,1000000).".".$imgExt;
                
            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){           
                // Check file size '5MB'
                if($imgSize < 5000000)              {
                    move_uploaded_file($tmp_dir,$upload_dir.$productpic);
                }
                else{
                    $errMSG = "Sorry, your file is too large.";
                }
            }
            else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
            }
        }
        
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('INSERT INTO product_tbl(productName, productPrice,productPic,productDescription,productCategory) VALUES(:pname, :pprice, :ppic, :pdesc, :pcat)');
            $stmt->bindParam(':pname',$productname);
            $stmt->bindParam(':pprice',$productprice);
            $stmt->bindParam(':ppic',$productpic);
            $stmt->bindParam(':pdesc',$productdesc);
            $stmt->bindParam(':pcat',$productcategory);
            
            if($stmt->execute())
            {
                $successMSG = "new record succesfully inserted ...";
                header("refresh:5;products.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "error while inserting....";
            }
        }
    }
?>