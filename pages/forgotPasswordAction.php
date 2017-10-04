<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$email = isset($_POST['email'])? $_POST['email'] : '';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    $email = isset($_POST['email']);
    
    mail("100066109@students.swinburne.edu.my","Deallo user forgot password, here is the e-mail",$email);
    
}