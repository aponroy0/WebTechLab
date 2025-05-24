
<?php
       
       // This block only runs when someone tries to login deriectly..

      if (!isset($_POST['submit'])) {
        session_start();
          if(!isset($_SESSION["first"])) {
                  echo "Please Login !";
                  header("refresh: 0; url = index.html");
            }
      }

             $bgc= $_COOKIE['bgcolor'];



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="show.css">

</head>
<body>

    <div class="contain">
        <div class="bc" style="background-color: <?php echo $bgc ?> ";>

            <!--This block stores the username and logout section-->
            <div class="username">
            <?php
              session_start();
              echo $_SESSION["first"];                
            ?>
            <br>
           <a href="logout.php" target="_self" class="log-out"><button style="margin-left:110px;margin-top:5px;background-color :rgb(97, 134, 245); color:azure">Log out </button></a>

           </div>

        <div class="r">
        <h3> Your selected city's AQI...</h3>


    <?php
       
    
    

if (isset($_POST['submit'])) {
    $con = mysqli_connect("localhost", "root", "", "AQI");

    echo "<table border='1' cellpadding='10' style='width: 80%; margin: auto; text-align: center; background-color: #f9f9f9;'>";
    echo '<tr style="background-color:#C1DBB3;"><th>Country</th><th>City</th><th>AQI</th></tr>';

    $countries = [
        "Bangladesh", "India", "Ireland", "Spain", "United States of America",
        "Japan", "Italy", "England", "France", "Portugal", "China", "South Korea",
        "Germany", "Netherland", "United Arab Emirates", "Denmark", "Australia",
        "Canada", "Switzerland", "Belgium"
    ];

    foreach ($countries as $country) {
        if (isset($_POST[$country]) && $_POST[$country] != "") {
            $sql = "SELECT Country, City, AQI FROM info WHERE Country='$country'";
            $result = mysqli_query($con, $sql);
            if ($entry = mysqli_fetch_assoc($result)) {
                echo "<tr><td>{$entry['Country']}</td><td>{$entry['City']}</td><td>{$entry['AQI']}</td></tr>";
            }
        }
    }

    echo "</table>";
}


?>  
<button type="submit" style="background-color :rgb(97, 134, 245); color:azure; padding:5px; margin-top:15px"> Confirm </button>

       </div>
      </div>
    </div>
    
</body>
</html>













