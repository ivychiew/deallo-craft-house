<?php
    error_reporting( ~E_NOTICE );
    
    require_once '../includes/product_config.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $dbh->prepare('SELECT name, price, image, category, summary FROM product WHERE id =:pid');
        $stmt_edit->execute(array(':pid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: myProducts.php");
    }
    
    
    if(isset($_POST['btn_save_updates']))
    {
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $category = $_POST['product_category']; 
        $summary = $_POST['product_description'];
            
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
                    unlink($upload_dir.$edit_row['image']);
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
            $image = $edit_row['image']; // old image from database
        }   
                        
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $dbh->prepare('UPDATE product
                                         SET name=:pname, 
                                             price=:pprice, 
                                             image=:ppic,
                                             category=:pcat,
                                             summary=:pdesc
                                       WHERE id=:pid');
            $stmt->bindParam(':pname',$name);
            $stmt->bindParam(':pprice',$price);
            $stmt->bindParam(':ppic',$image);
            $stmt->bindParam(':pcat',$category);
            $stmt->bindParam(':pdesc',$summary);
            $stmt->bindParam(':pid',$id);
          
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='myProducts.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }
        
        }
        
                        
    }
    
?>