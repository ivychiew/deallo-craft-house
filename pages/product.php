<?php
//including the database connection file
include_once("..\includes\server.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated

 // using mysqli_query instead
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Product Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Category</td>
            <td>Details</td>

        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        $query = mysqli_query($dbi2, "SELECT * FROM products ORDER BY id");
$dbi2 = mysqli_connect('localhost', 'root', '' , 'products');
        while($res = mysqli_fetch_array($query))

        {     
            echo "<tr>";
            echo "<td>".$res['product_name']."</td>";
            echo "<td>".$res['price']."</td>";
            echo "<td>".$res['quantity']."</td>";    
            echo "<td>".$res['category']."</td>";
            echo "<td>".$res['product_details']."</td>";
            echo "<td>".$res['product_image']."</td>";
            // echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
</body>
</html>