<?php  
    $conn = mysqli_connect('localhost:3306', 'root', '');
     if (!$conn)
    {
     die('Could not connect: ' . mysql_error());
    }
    mysqli_select_db($conn,"asm7_shop");

    session_start();
?>