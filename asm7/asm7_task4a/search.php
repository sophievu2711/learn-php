<?php
   include "db.php";
?>

<?php
    $book_to_search="";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET['searchbook'])){
            $book_to_search = $_GET['searchbook'];
        }
    }

    $query = mysqli_query($conn, "SELECT * FROM book                                            
                                    WHERE name='$book_to_search';");
    $result = mysqli_num_rows($query);
    if($result>0){
        while($book = mysqli_fetch_assoc($query)){
            $bookid = $book["id"];
            echo "Book: ".$book['name'] . "</br>" ."Author: ". $book['author'];
            echo "<br>Status: ";
                $available_check = mysqli_query($conn, "SELECT * FROM borrow WHERE book_id='$bookid';");
                $result = mysqli_num_rows($available_check);
                if($result > 0){
                    echo "borrowed";
                }else{ echo "available";}
            echo "<form action='borrow.php'>";
            echo "<input type='hidden' name='book_to_borrow' value=$bookid >";
            echo "<input type='submit' value='Borrow'>";
            echo "</form>";
            echo "<hr>";
        }
    }else{
        echo "Book not found.";
    }
?>