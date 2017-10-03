<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

//$username = $_POST['username'];
$password1 = isset($_POST['$password'])? $_POST['$password'] : '';
$password2 = isset($_POST['$password2'])? $_POST['$password2'] : '';
$email = isset($_POST['email'])? $_POST['email'] : '';
//$cityCountry = $_POST['cityCountry'];
//$bio = $_POST['bio'];


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
//    echo $password1;
//    echo $password2;
}
else{
//    $sql = "UPDATE users SET password='$password1',email='$email',cityCountry='$cityCounty', bio='$bio' WHERE username='$username'";

    $sql = "UPDATE users SET email='testerSUCCESS' WHERE id=2";
}

if (mysqli_query($conn, $sql)){
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>