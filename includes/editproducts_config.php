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
		$username = $_POST['product_name'];// user name
		$userjob = $_POST['product_job'];// user email
			
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
										     productPic=:ppic, 
										     -- productDescription=pdescription
								       WHERE productID=:pid');
			$stmt->bindParam(':pname',$productname);
			$stmt->bindParam(':pprice',$productprice);
			$stmt->bindParam(':ppic',$productpic);
			$stmt->bindParam(':pid',$id);
			// $stmt->bindParam(':pdesccription',$productdesc);
				
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