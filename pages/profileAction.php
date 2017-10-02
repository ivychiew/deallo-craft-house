<?php
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "register";

$username = $_POST['username'];
$password1 = $_POST['$password'];
$confirmPassword = $_POST['passwordTwice'];
$email = $_POST['email'];
$cityCountry = $_POST['cityCountry'];
$bio = $_POST['bio'];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//MyGuests is TABLE NAME
//$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

if($password1 <> $confirmPassword )
{
    echo "Your passwords do not match!";
}else
{
    $sqlpassword = UPDATE users SET password=$password1,email=$email,cityCountry=$cityCounty, bio=$bio WHERE username=$username;

}

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>