<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";
$sql = null;

$errors = array(); 
    
// Create connection
$dbi = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$dbi) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])){
    
    //Assign local variables values from form
    $username1 = mysqli_real_escape_string($dbi, $_POST['username1']);
    $password1 = mysqli_real_escape_string($dbi, $_POST['password1']);
    $password2 = mysqli_real_escape_string($dbi, $_POST['password2']);

    //form validation: ensure that the form is correctly filled 
//    if (empty($username1)) { array_push($errors, "Username is required"); }
//    if (empty($password1)) { array_push($errors, "Password is required");}
//    if (empty($password2)) { array_push($errors, "Second password is also, required"); }
//    if ($password1 <> $password2) { array_push($errors, "Your passwords do not match!"); }
    
    if (empty($username1)) { echo "Username is required";}
    if (empty($password1)) { echo "Password is required";}
    if (empty($password2)) { echo "Second password is also, required";}
    if ($password1 <> $password2) {echo "Your passwords do not match!"; }

    //Register users provided the form is error free
//    if (count($errors) == 0){

         $queryUsername = "SELECT * FROM users WHERE username = '$username1'";
        
        $resultUsername = mysqli_query($dbi, $queryUsername);
        
        if (mysqli_num_rows($resultUsername) > 0) {
            $sql = "UPDATE users SET password='$password1' WHERE username='$username1'";
            
            mysqli_query($dbi, $sql);

            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Password updated successfully')
            window.location.href='profile.php';
            </SCRIPT>");
            echo "USERNAME MATCHES RECORDS";
            header('location:../index.php');
        }
        else{
            echo "USERNAME MATCHES NO RECORDS";
            //array_push($errors, "Username error!");
        }    
    //}

}

mysqli_close($dbi);

?>