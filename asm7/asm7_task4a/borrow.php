<?php
    include "db.php";
    
    $book_to_borrow ="";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET['book_to_borrow'])){
            $book_to_borrow = $_GET['book_to_borrow'];
        }
    }
    $user = $_SESSION['username'];

    $available_check = mysqli_query($conn, "SELECT * FROM borrow WHERE book_id='$book_to_borrow';");
    $result = mysqli_num_rows($available_check);
    if($result==0){
        $query = mysqli_query($conn, "INSERT INTO borrow (customer_id, book_id, borrow_date, due) 
                                        VALUES ('$user', '$book_to_borrow', curdate(), DATE_ADD(CURDATE(), INTERVAL 30 DAY));");
        if ($query){
            echo "Borrowed succesfully.";
        }else{
            echo "Borrow failed";
        }
    }else {
        echo "This book is unavailable now.";
    }
?>