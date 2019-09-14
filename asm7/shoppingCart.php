<?php 
    class shoppingCart{
        public $cartNo, $date, $customer_id, $total_cost;
        protected $items = array();
        
        public function isEmpty(){
            return (empty($this->items));
        }

        public function addProduct(Product $product){
            $pcode = $product->getPcode();
            if(!$pcode) throw new Exception('The cart requires items with unique pcode value.');
            if(isset($this->items[$product])){
                $this->updateProduct($product, $this->items[$product]['quantity']+1);
            }else{
                $this->items[$product] = array('item' => $product, 'quantity' => 1);
            }
        }

        public function updateProduct(Product $product, $quantity){
            $pcode = $product->getPcode();
            if($quantity === 0){
                $this->deleteProduct($product);
            }elseif ($quantity > 0 && ($quantity != $this->items[$item]['quantity'])){
                $this->items[$item]['quantity'] = $quantity;
            }
        }

        public function deleteProduct(Product $product){
            $pcode = $product->getPcode();
            if (isset($this->items[$item])){
                unset($this->items[$item]);
            }
        }

        public function getTotalItem(){
            $total = 0;
            foreach ($this->items as $items){
                foreach ($items as $item){
                    ++$total;
                }
            }
            return $total;
        }

        public function getTotalCost(){
            $totalCost = 0;
            foreach($this->items as $items){
                foreach ($items as $item){
                    $item['price'] = $product->getPrice();
                    $totalCost += $item['price'] * $item['quantity'];
                }
            }
            return $totalCost;
        }
    }
?>