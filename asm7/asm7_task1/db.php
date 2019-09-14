<?php
    $servername = "localhost:3306";
    $user = "root";
    $password = "";
    $db = "asm7_shop";

    $conn = new mysqli($servername, $user, $password, $db);
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }
?>