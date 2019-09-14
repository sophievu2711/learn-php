<?php
// Create the cart:
require('db.php');
require('shoppingCart.php');
$cart = new shoppingCart();

// Create some items:
require('item.php');
$w1 = new Item('W139', 'Some Widget', 23.45);
$w2 = new Item('W384', 'Another Widget', 12.39);
$w3 = new Item('W55', 'Cheap Widget', 5.00);

 
    $query = mysqli_query($conn,"SELECT * FROM product;");
    $items = mysqli_num_rows($query);
    $item_list = array();

    while($row = mysqli_fetch_assoc($query)){
        $pcode = $row['pcode'];
        $pname = $row['pname'];
        $category = $row['category'];
        $supplier = $row['supplier'];
        $image = $row['image'];
        $price = $row['price'];
        $quantity = $row['quantity'];


        $item = new Item($pcode, $pname, $price);
        $item_list[] = $item;

    }

// Add the items to the cart:
$cart->addItem($w1);
$cart->addItem($w2);
$cart->addItem($w3);

// Update some quantities:
$cart->updateItem($w2, 4);
$cart->updateItem($w1, 1);

// Delete an item:
$cart->deleteItem($w3);

// Show the cart contents:
?>