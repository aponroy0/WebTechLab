
<?php


if (isset($_POST["submit"])){

$uname =$_POST["first"] ;
$pass = $_POST["password"];

$conn = mysqli_connect('localhost', 'root', '', 'AQI');
$sql = "SELECT *FROM app_users WHERE email = '$uname' and password = '$pass'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
      session_start();
      
      $_SESSION["first"] = $uname;

      header("refresh: 0; url = requestaqi.php");
      exit();
}


else{
      echo "User not found";
      header("refresh: 2; url = index.html");
      
      exit();
   }
}


if (!isset($_POST["submit"]))
      {
            echo "Fill the username and password."."<br>";
            header("refresh: 2; url = index.html");
      }
      //
?>