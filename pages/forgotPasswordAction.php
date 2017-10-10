<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$surname = isset($_POST['surname'])? $_POST['surname'] : '';
$color = isset($_POST['color'])? $_POST['color'] : '';
$email = isset($_POST['email'])? $_POST['email'] : '';

if (isset($_POST['submit'])){

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{

        $sql = "SELECT password FROM users WHERE email = '$email' AND surname='$surname' AND color = '$color'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            print ("Welcome back, friend!");
        }else{
            echo "NULL RECORD";
        }

    //    mail("100066109@students.swinburne.edu.my","Deallo user forgot password, here is the e-mail",$email);

    }

}else{
    echo "Submit button is not set";
}