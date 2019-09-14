<form action="<?php echo $_SERVER['PHP_SELF']?> ">
    <h2>Price range</h2>
    Min <input type='text' name='min' value="29.99">
    Max <input type='text' name='max' value="49.99">
    <input type='submit' name='submit' value='Search'>
</form>

<?php
    $min = 29.99;
    $max = 49.99;
    if(isset($_GET['submit'])){
        $min = $_GET['min'];
        $max = $_GET['max'];
    }

    $xml = simplexml_load_file('books.xml');

    $books = $xml->xpath('book');
    foreach($books as $book){
        echo "Book: {$book->title}", " | Price: {$book->price} <br>";
    }

    echo "<hr><h2>Result</h2>";

    foreach($books as $book){
        $p = $book->price; 
        if($p >= $min && $p <= $max){
            echo "Book: {$book->title}", " | Price: {$book->price} <br>";
        }
    }
?>