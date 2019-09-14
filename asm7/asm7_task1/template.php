<a href="template.php">Home</a> |
<a href="checkout.php">Checkout</a> |
<hr>
<table><form action='template.php'>
<?php
    require ('db.php');
    require ('cart.php');

    echo "<table>";
    foreach ($item_list as $item){
        echo "<tr><td>".$item->getName()."</td>";
        echo "<td>".$item->getPrice()."</td>";
        echo "<td><input type='hidden' name='pcode' value='",$item->getID(),"'>";
        echo "<td><input type='submit' name='add' value='Add to cart'>";
        echo "</td></tr>";
    }
    echo "</table>";
    
?>
</form>
<hr>
<?php 
    echo $_POST['pcode'];
?>

