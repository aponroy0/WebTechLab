
<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="receipt.css">

</head>
<body>

    <div class="contain">
        <div class="bc">
             <div class="r">
        
        <h1 style="text-align: center;"><u> Your Information</u></h1>

    <?php


//var_dump($_GET);
if (isset($_POST['submit'])) {
    

    //This section is to store the value user provided into index.html page to database.
     $name = $_POST["name"];
     $email = $_POST["email"];
     $pass = $_POST["password"];
     $color =$_POST["color"];
     $country =$_POST["country"];
     $gender =$_POST["Gender"];
     $dob =$_POST["dob"];

    $_SESSION["email"] = $email;
    setcookie("bgcolor", $color);// Setting the color value to the cookie Key name is "bgcolor" and the value is $color

     $conn = mysqli_connect('localhost', 'root', '', 'aqi');
     
     $check = mysqli_query($conn, "SELECT * FROM app_users WHERE email='$email'");

     if (mysqli_num_rows($check) > 0) { //mysql_num_rows is a method that shows how many rows it has gotten from the check variable.
           echo " Email already used. Try with another email...";
           header("refresh: -1; url = index.html"); // If the condition is true then it sends the user to the home page or index.html page.
     }
     else{

        if ($_POST['name'] != "") {
            echo "<br> <h3> Name: ".$_POST['name']."</h3>";
            }
            if ($_POST['email'] != "") {
                echo "<h3> Email: ".$_POST['email']."</h3>";
            }
            if ($_POST['password'] != "") {
                echo "<h3> Password: ".$_POST['password']."</h3>";   
            }
            if ($_POST['color'] != "") {
                echo "<h3> Color: ".$_POST['color']."</h3>";   
            }
            if ($_POST['country'] != "") {
                echo "<h3> Country: ".$_POST['country']."</h3>";   
            }
            if ($_POST['dob'] != "") {
                echo "<h3> Date of Birth: ".$_POST['dob']."</h3>";   
            }
            if ($_POST['Gender'] != "") {
                echo "<h3> Gender: ".$_POST['Gender']."</h3>";   
            }

        $sql = "INSERT INTO app_users(Name, Email, Password, Color, Country, Gender, Dob ) VALUES('$name', '$email', '$pass', '$color', '$country', '$gender', '$dob')";
         if (mysqli_query($conn, $sql)) {                                  
          $_SESSION["name"] = $_POST["name"];

          }  

     }
           //Cancel and confirm button using session.
           echo '<form method="post" action=""> 
           <button type="submit" style="background-color: rgb(97, 134, 245); color: azure;" name="cancel">Cancel</button>
          </form>';
          echo '<br><a href="index.html"  background-color: rgb(97, 134, 245); color: azure;"> <button style="background-color: rgb(97, 134, 245); color: azure;"> Confirm </button><a>';
          
          //If confirm button is clicked then the information of user will be saved to the database..

          // The procedure here, I have used is session..
          // I am starting a session. Email has been stored in the session so that the session_email can be accessed out the if block.
          // When the submit button is clicked from the index.html.. It takes a session_variable named "email" that stores
          // the email..
}

          // If Cancel button is clicked
        if (isset($_POST['cancel'])) {
             if (isset($_SESSION['email'])) {

                $email = $_SESSION['email']; // Storing the session_email_value to a variable email..
                $conn = mysqli_connect('localhost', 'root', '', 'aqi');  //Conecting with db..
                $delete = "DELETE FROM app_users WHERE email='$email'";// Deleting from the app_users table using SQL query

           if (mysqli_query($conn, $delete)) {

               header("refresh: 0; url = requestaqi.php");
               exit();

              session_unset();// If the condition setifies the conditon then we omit the sesssion

              session_destroy();
              } 
            }
    
}



      
?>  

               

</div>    
                   


        

       </div>
    </div>
    
</body>
</html>













