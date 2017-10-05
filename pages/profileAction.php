<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";
$sql = null;

//Assign local variables values from form
$username1=$_POST['username1'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Checks if passwords are identical
if($password1 <> $password2)
{
    echo "Your passwords do not match!";
}
else{
    $sql = "UPDATE users SET password='$password1' WHERE username='$username1'";
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Password updated successfully')
    window.location.href='profile.php';
    </SCRIPT>");
    }

if (mysqli_query($conn, $sql)){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Password updated successfully')
    window.location.href='profile.php';
    </SCRIPT>");
    
} else{
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>

<html>
    
    <body>
        <h3><a href="profile.php">Back to profile page!</a></h3>
        
    </body>
    
</html>