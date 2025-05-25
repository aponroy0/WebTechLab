

<?php

       
       // This block only runs when someone tries to login deriectly..

      if (!isset($_POST['submit'])) {

        session_start();
          if(!isset($_SESSION["first"])) {
                  header("refresh: 0; url = index.html");
            }
        
      }


        // Storing the cookie to a variable named $bgc.  
        // As we know, cookie is global varibale. It can be accessed through any pages until we you process any delete button.
        // Here, actually we are accesssing the cookie.
        // cookie stores value in form of (key value) pair.
        // It takes a key for each value.
        // It has function called time().
        // If we put time()+86400. That actually means we are adding a day. After one day the cookie will be deleted automatically.
        // Syntax of cookies.
        // setcookies('key', 'value', 'time', 'path').
        // We must set a cookie first like in a php script. Cuase it runs inside the php scope.
        // Then we can access them from any pages.
        // $_COOKIE['EXAMPLE'];            
        $bgc= $_COOKIE['bgcolor'];
        
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request AQI</title>

    <style>
        .aqicontainer {

            width: 100vw;
            height: 160vh;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .cbox {

            box-sizing: border-box;
            border: 2px solid black;
            background-color:white;
            width: 50vw;
            height: 160vh;
            font-family: Arial, sans-serif;
            font-size: small;
            line-height: 1.6;
            padding: 100px;
        }



        .user{

        position:relative;
        left: 405px;
        bottom:65px;
        }
        
        .photo {
         display: flex;
         margin-bottom: 20px;

        }

       .imag {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #000000;

       }



    </style>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Request AQI</title>
    </head>

    <body>

<

        <div class="aqicontainer">

             <!-- 
             Here, we put php code into html code. Like we did in the div. It changes the bg color.
             -->
            <div class="cbox" style="background-color: <?php echo $bgc ?> ";>

            <!-- 
             This div handles the upoload avater section at the top left corner.
             -->
            <div class="useravateer">

            <?php   // This part is for showing  the image..
            
                      $email = $_SESSION["first"];
                      $conn = mysqli_connect('localhost', 'root', '', 'aqi'); // Conecting to database.
                      $query = " SELECT images FROM app_users WHERE email ='$email'"; 

                      $res = mysqli_query($conn, $query);

                      if($res->num_rows>0)
                      {
                        while($row =mysqli_fetch_array($res))
                        {   
                            $filename= $row["images"];
                            $imageUrl ="uploads/".$filename;

                            echo "<div class='photo'>";

                            echo "<img src='$imageUrl' class='imag'>";

                            echo "</div>";
                        }
                      }

            
            ?>
               
                <form action="upload.php" method="post" enctype="multipart/form-data">
                     
                  <input type="file" name="image" id="" style="background-color:rgb(97, 134, 245); color:white;"><br>
                  <input type="submit" style="background-color:rgb(97, 134, 245); color:white;" value="Upload" name="upload" >
                    
                </form>



            </div>
                 
                
            





            <div class="user">
            <?php  // This will show the email and logout at the top right corner..
              
              echo $_SESSION["first"];                
            ?>
            <br>
           <a href="logout.php" target="_self" class="log-out"><button style="margin-left:95px;margin-top:5px;background-color :rgb(97, 134, 245); color:azure">Log out </button></a>

           </div>

                      
                <form action="show.php" id="countryForm" method="post">
                   
                                    <h2>Select Country for AQI</h2>


                    <input type="checkbox" name="Bangladesh" value="Bangladesh"> Bangladesh<br>
                    <input type="checkbox" name="India" value="India"> India<br>
                    <input type="checkbox" name="Ireland" value="Ireland"> Ireland<br>
                    <input type="checkbox" name="Spain" value="Spain"> Spain<br>
                    <input type="checkbox" name="USA" value="United States of America"> United States of America<br>
                    <input type="checkbox" name="Japan" value="Japan"> Japan<br>
                    <input type="checkbox" name="Italy" value="Italy"> Italy<br>
                    <input type="checkbox" name="England" value="England"> England<br>
                    <input type="checkbox" name="France" value="France"> France<br>
                    <input type="checkbox" name="Portugal" value="Portugal"> Portugal<br>
                    <input type="checkbox" name="China" value="China"> China<br>
                    <input type="checkbox" name="SouthKorea" value="South Korea"> South Korea<br>
                    <input type="checkbox" name="Germany" value="Germany"> Germany<br>
                    <input type="checkbox" name="Netherland" value="Netherland"> Netherland<br>
                    <input type="checkbox" name="UAE" value="United Arab Emirates"> United Arab Emirates<br>
                    <input type="checkbox" name="Denmark" value="Denmark"> Denmark<br>
                    <input type="checkbox" name="Australia" value="Australia"> Australia<br>
                    <input type="checkbox" name="Canada" value="Canada"> Canada<br>
                    <input type="checkbox" name="Switzerland" value="Switzerland"> Switzerland<br>
                    <input type="checkbox" name="Belgium" value="Belgium"> Belgium<br>


                    <br>
                    <input type="submit" name="submit" value="Confirm" onclick="return validate()"
                    style="background-color :rgb(97, 134, 245); color:azure">

                    <div id="re" style="height: 15px; color: brown; font-size: smaller; margin-top: 15px;"></div>

                    <script>// Here we are checking whether the person has selected exactly 10 contries or not.
                        function validate() {
                        const checked = document.querySelectorAll('input[type="checkbox"]:checked').length;
                        if (checked !== 10) {

                        document.getElementById('re').innerHTML = "Please select exactly 10 countries.";
                        return false;

                        }
                        return true;
                        }

                        </script>


                    </div>

            </div>
           
    </body>

    </html>

</body>

</html>

