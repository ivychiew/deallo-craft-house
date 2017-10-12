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
    $bio=$_POST['bio'];
    $country=$_POST['country'];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //1- If got username
    if(!empty($username1)){
        
        //2- If got password
        if(!empty($password1) && !empty($password2))
        {
            //Checks if passwords are identical
            if($password1 <> $password2){
                echo "Your passwords do not match!";
            }else{      //If password match
        
                //Update the password
                $sql = "UPDATE users SET password='$password1' WHERE username='$username1'";

                if (mysqli_query($conn, $sql)){
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Password updated successfully')
                    </SCRIPT>");
                }else{
                    echo "Error updating password: " . mysqli_error($conn);
                }
            } 
        }
        
        //3-If got bio
        if(!empty($bio)){
            $sqlBio = "UPDATE users SET bio='$bio' WHERE username='$username1'";
            mysqli_query($conn, $sqlBio);
        }
        
        //4-If got country
        if(!empty($country)){
            $sqlCountry = "UPDATE users SET country='$country' WHERE username='$username1'";
            mysqli_query($conn, $sqlCountry);
        }

        //5- Profile Picture upload
        if(isset($_FILES['user_image']["name"])){
            $imgFile = $_FILES['user_image']['name'];
            $tmp_dir = $_FILES['user_image']['tmp_name'];
            $imgSize = $_FILES['user_image']['size'];


            $upload_dir = '../images'; //set upload directory

            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            // rename uploading image
            $profilePic = rand(1000,1000000).".".$imgExt;

            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){           
                // Check file size '5MB'
                if($imgSize < 5000000){
                    //moves an uploaded file to a database images
                    move_uploaded_file($tmp_dir,$upload_dir.$profilePic);
                }else{
                    $errMSG = "Sorry, your file is too large.";
                }
            }
            else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
            }

            //Replace exiting image in database with current Image
            //????

            $insertImage = "UPDATE users SET profile_image = '$imgFile' WHERE username='$username1'";

            if ($result = mysqli_query($conn, $insertImage)) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('SUCCESS IMAGE')
                </SCRIPT>");
                
                while($row = mysqli_fetch_object($result)){
                    echo '<div><img src="'. $row->images_path . '" border=0></div>';
                    $path = dirname("localhost/deallo-craft-house/images/profile.jpg");  
                    echo $path;
                }
                
                    
            
            }else{
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('NOT SUCESS IMAGE')
                </SCRIPT>");
            }
        }else{ //if file not set
            echo $_FILES["thumbnailPic"]["error"];
        }
        //3- Profile Picture upload END
        
    }else{  //if no username
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('LOL WHERE IS YOUR USERNAME')
        window.location.href='profile.php';
        </SCRIPT>");
    }

    

    mysqli_close($conn);

?>

<html>
    
    <body>
        <h3><a href="profile.php">Back to profile page!</a></h3>
        
    </body>
    
</html>