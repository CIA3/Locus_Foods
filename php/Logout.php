

<?php
    include "config.php";
    session_start();   
    session_destroy();
    header("location: Login_Page.php");
     exit();
?>

