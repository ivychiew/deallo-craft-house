<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$email = isset($_POST['email'])? $_POST['email'] : '';
$question1 = isset($_POST['$question1'])? $_POST['$question1'] : '';
$question2 = isset($_POST['$question2'])? $_POST['$question2'] : '';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    
    $sql = "SELECT username,surname,color FROM users WHERE $email == email";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        if(surname == $question1){
            $ques1 = true;
        }else{
            $ques1 = false;
        }
        if(color == $question2){
            $ques2 = true;
        }else{
            $ques2 = false;
        }
        
    }
    
    if($ques1 ==false || $ques2 == false){
        echo "The answers provided were in correct. Please try again.";
    }
    
    
    
//    mail("100066109@students.swinburne.edu.my","Deallo user forgot password, here is the e-mail",$email);
    
}