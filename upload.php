<?php
          session_start();
          $email = $_SESSION["first"];

          $conn = mysqli_connect('localhost', 'root', '', 'aqi'); // Conecting to database.

             
            if(isset($_POST["upload"])){// Cheking if the upload button is clicked or not
            $filename = $_FILES["image"]["name"];// Storing the image in a file by getting POST
            
            $extension = pathinfo($filename, PATHINFO_EXTENSION);// To know the extension of the file.
            $allowedTypes = array("jpg","gif","png"); // We are showing how many extension we can take from the user.

            $tempName = $_FILES["image"]["tmp_name"]; // temp varible to store while fetching data from pc inside the funtion.
            $targetPath = "uploads/".$filename; 

            if(in_array($extension, $allowedTypes)){ // Checking the extension of users are similar to the extension we proided or not.
                  
                if(move_uploaded_file($tempName, $targetPath)){ //Here, we are moving the file to target folder "Uploads"..
                    
                    // Here, we are updating the images to that particular user email.
                    $query = "UPDATE app_users SET images = '$filename' WHERE email = '$email'";

                    if(mysqli_query($conn, $query)){
                      header("refresh: 0; url = requestaqi.php");
                    }
                    else{
                        echo "Somwthing is wrong";
                        header("refresh: 1; url = requestaqi.php");

                    }
                }
                else{
                    echo "Image isn't uploaded.. Please try again.";
                    header("refresh: 1; url = requestaqi.php");

                }

            }
            else
            {
                echo "Your image format is not allowed";
                header("refresh: 1; url = requestaqi.php");

            }

            }

          







?>