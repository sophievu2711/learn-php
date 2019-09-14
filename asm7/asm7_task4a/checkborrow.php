<body>
<?php 
    include "nav.php";
    include "db.php";
?>

<!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
            <a href="home.php" class="w3-bar-item w3-button">Home <img src="https://png.pngtree.com/svg/20141121/095b323a9c.svg" width="20px"></a>

            <div onclick="bar_drop_down()" class="w3-dropdown-click w3-bar-item w3-button">
                <?php echo $_SESSION["cname"]; ?>
                <img src="http://cdn.onlinewebfonts.com/svg/img_311846.png" width="20px">
            </div>
        <!-- Drop down --> 
            <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
                <a href="signout.php" class="w3-bar-item w3-button">Log out </a>
            </div>            
        <!-- Check out --> 
            <a href="checkborrow.php" class="w3-bar-item w3-button">Check my borrow <img src="https://static.thenounproject.com/png/2370-200.png" width="20px"></a>
        </div>
    </div>

<!-- Project Section -->
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">My borrow</h3>
        
    <?php 
        $user = $_SESSION['username'];
        $query= mysqli_query($conn, "SELECT book.name, borrow.borrow_date, borrow.due FROM borrow 
                                    JOIN book ON book.id = borrow.book_id 
                                    WHERE customer_id='$user';");
        $result = mysqli_num_rows($query); 
    ?>
    
    <table align='left' width='50%'>
        <tr align='left'>
            <th>Book name</th>
            <th>Borrow date</th>
            <th>Due</th>
        </tr>

    <?php
        while ($row = mysqli_fetch_assoc($query)){
            echo "<tr>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['borrow_date']."</td>";
                echo "<td>".$row['due']."</td>";
        }
    ?>
    </table>
</body>

<script>
    function bar_drop_down() {
        var x = document.getElementById("Demo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>