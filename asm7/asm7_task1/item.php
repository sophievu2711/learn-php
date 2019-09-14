<?php
class Item {

// Item attributes are all protected:
protected $id;
protected $name;
protected $price;

// Constructor populates the attributes:
public function __construct($id, $name, $price) {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
}

// Method that returns the ID:
public function getId() {
    return $this->id;
}

// Method that returns the name:
public function getName() {
    return $this->name;
}

// Method that returns the price:
public function getPrice() {
    return $this->price;
}

public function printItem(){
    return $this->name." ".$this->price;
}

} // End of Item class.
?>