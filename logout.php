<?php
//
if (session_status() >= 0) {

session_start();

session_unset();

session_destroy();
}

header("refresh: 2; url = index.html");



     
    //Whenever we press logout. It removes the cookie.
    // What is the advantages of cookies?
    // --- 
   // setcookie("bgcolor",  time()-10); // remove cookie

?>