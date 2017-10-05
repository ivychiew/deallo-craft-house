<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";
$sql = null;

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
elseif (isset($_SESSION['user'])) {
    
    $username=$_SESSION['username'];
    $sql = "UPDATE users SET password=$password1 WHERE username=$username";
    } else {
        echo "Session expired, please login again!";
    }


if (mysqli_query($conn, $sql)){
    echo "Record updated successfully";
    echo $password1;
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>