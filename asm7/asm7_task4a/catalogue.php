<?php
    $query = mysqli_query($conn,"SELECT * FROM book;");
    $result = mysqli_num_rows($query);
?>

    <table border="1" class="catalogue"> 
    <tr>
        <th>Book</th>
        <th>Author</th>
        <th>Type</th>
    </tr>

    <?php
        while($book = mysqli_fetch_assoc($query)){
            echo "<tr>";
                echo "<td>";
                echo $book['name'] ."<br>"; 
                echo "</td>";

                echo "<td>";
                echo $book['author'] ."<br>"; 
                echo "</td>";

                echo "<td align='center'>";
                echo $book['type'] ."<br>"; 
                echo "</td>";
            echo "</tr>";
        }
    ?>

    </table>