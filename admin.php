
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="admin.css">

</head>
<body>

    <div class="container-admin">
        <div class="table">

<?php


// Connect to database
$conn = mysqli_connect("localhost", "root", "", "AQI");

// Delete row if requested
if (isset($_GET['delete'])) {
    $email = $_GET['delete'];
    $delete = "DELETE FROM app_users WHERE Email = '$email'";
    mysqli_query($conn, $delete);
}

// Show data
$result = mysqli_query($conn, "SELECT * FROM app_users");

echo "<table border='1' cellpadding='10' class='innertable'>";
echo "<h2 style='text-align: center; margin-top:100px;'>Users List</h2>";
echo "<tr><th>Name</th><th>Email</th><th>Country</th><th>Color</th><th>Password</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["Country"] . "</td>";
        echo "<td>" . $row["Color"] . "</td>";
        echo "<td>" . $row["Password"]. "</td>";
        echo "<td><a href='admin.php?delete=" . $row["Email"] . "'>Delete</a></td>";
        echo "</tr>";

    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);


?>
      </div>
            <div class='username'>
            
         <a href="logout.php" target="_self" class="log-out"><button style="margin-left:110px;margin-top:5px;background-color :rgb(97, 134, 245); color:azure">Log out </button></a>

        </div>

    </div>
    
</body>
</html>

