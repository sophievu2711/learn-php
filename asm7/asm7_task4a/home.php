<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="catalogue.css">

<body>
    <?php 
        include "nav.php";
        include "db.php";
    ?>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
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

    <!-- Page content -->
    <!-- Project Section -->
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">List of books in library</h3>
        <table>
            <tr>
                <td width='60%'>
                    <?php
                        include "catalogue.php";
                    ?>
                </td>
    <!-- Search--------------------------------------->
                <td valign="top">
                    <form action="search.php">
                        <input type="text" name="searchbook" placeholder="Search for a book">
                        <input type="submit" name="search" value="Search">
                    </form>
                </td>
            </tr>
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