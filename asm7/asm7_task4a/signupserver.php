<?php
        include 'db.php';

        if (isset($_POST['submit'])){      
            $cname=$_POST['cname'];
            $password=$_POST['psw'];
            $username=$_POST['username'];
            print_r($_POST);
       
        /*--Check-----------------------*/
            $check_query = mysqli_query($conn, "SELECT * FROM customer 
                                                WHERE id='$username'");

            $result = mysqli_num_rows($check_query);
            $user = mysqli_fetch_assoc($check_query);
            
            if($user){
                $error = "Username already exists";
                echo $error;
            }else {
                $insert_query = mysqli_query($conn,"INSERT INTO customer(id,password,name) 
                                                    VALUES ('$username','$password','$cname')");
                mysqli_query($conn, $insert_query);
                header("Location: signin.php");
            }    
        }
    ?>

