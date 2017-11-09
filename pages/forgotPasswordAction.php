<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "deallo_udb";

    if (isset($_POST['submit'])){

    $surname = isset($_POST['surname'])? $_POST['surname'] : '';
    $color = isset($_POST['color'])? $_POST['color'] : '';
    $email = isset($_POST['email'])? $_POST['email'] : '';

    //Spambot detector
    if(!empty($_POST['honeyPot']))
    {
        echo "Authentication Error: You're not human.";
    }

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{

            $surname = strrev($surname);

            $sql = "SELECT * FROM user WHERE email = '$email' AND surname='$surname' AND color = '$color'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                header("Location:editPassword.php");
            }
            else{
                echo "NO RECORD FOUND";
            }   
        }
    }
?>