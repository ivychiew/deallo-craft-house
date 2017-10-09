<?php

	require_once '../includes/product_config.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT productPic FROM product_tbl WHERE productID =:pid');
		$stmt_select->execute(array(':pid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("../images/product_images/".$imgRow['productPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM product_tbl WHERE productID =:pid');
		$stmt_delete->bindParam(':pid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: products.php");
	}

?>