
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
        <h1><u> Your Information</u></h1>
    <?php

// echo "Hi ".$_POST['uname']; // ASSOCIATIVE ARRAY K-V  - SUPERGLOBAL ARRAY
// echo "<br>".$_POST['email'];
// echo "<br>".$_GET['uname'];

//var_dump($_GET);
if (isset($_POST['submit'])) {

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

else
    print_r("NO DATA");

}


else
    print_r("NO DATA");

?>  
<button type="submit" style="background-color :rgb(97, 134, 245); color:azure"> Confirm </button>

    </div>
</div>
    </div>
    
</body>
</html>













