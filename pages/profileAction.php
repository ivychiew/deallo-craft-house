<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";
$sql = null;

$username1=$_POST['username1'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//MyGuests is TABLE NAME
//$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

if($password1 <> $password2)
{
    echo "Your passwords do not match!";
}
else{
    
    //$username1=$_SESSION['username1'];
    $sql = "UPDATE users SET password='$password1' WHERE username='$username1'";
    echo "Password Updated Successfully!";
}

if (mysqli_query($conn, $sql)){
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>