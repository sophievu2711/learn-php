<a href="template.php">Home</a> |
<a href="checkout.php">Checkout</a> |
<hr>

<?php
    require ('db.php');
    require ('cart.php');
?>
<?php 
    echo '<h2>Cart Contents (' . count($cart) . ' items)</h2>';

    if (!$cart->isEmpty()) {

        foreach ($cart as $arr) {

        // Get the item object:
        $item = $arr['item'];

        // Print the item:
        printf('<p><strong>%s</strong>: %d @ $%0.2f each.<p>', $item->getName(),   
        $arr['qty'], $item->getPrice());

        }
    }
?>
<hr>

<form action="checkout.php" method="POST">
    Name<br>
    <input type="text" name="name"><br>
    Card number<br>
    <input type="text" name="card"><br>
    Address<br>
    <input type="text" name="address"><br>
    <br><input type="submit" name="checkout">
</form>
