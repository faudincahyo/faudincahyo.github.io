<?php
    session_start();

    $host_db = "localhost";
    $user_db = "root";
    $pass_db = "";
    $name_db = "productcart";

    $con = mysqli_connect($host_db,$user_db,$pass_db,$name_db);
    

?>