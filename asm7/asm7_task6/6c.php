<?php
    class Binary_Tree_Node{
        public $data;
        public $left;
        public $right;

        public function __construct($d = NULL){
            $this->data = $d;
        }

        public function traverseInorder(){
            $l = array();
            $r = array();

            if($this->left){ $l = $this->left->traverseInorder(); }
            if($this->right){ $r = $this->right->traverseInorder(); }

            return array_merge($l,array($this->data),$r);
        }
    }

    class Sorting_Tree{
        public $tree;

        public function insert($val){
            if(!(isset($this->tree))){
                $this->tree = new Binary_Tree_Node($val);
            }else{
                $pointer = $this->tree;
                for(;;){
                    if($val >= $pointer->data){
                        if($pointer->left){
                            $pointer = $pointer->left;
                        }else{
                            $pointer->left = new Binary_Tree_Node($val);
                            break;
                        }
                    }else{
                        if($pointer->right){
                            $pointer = $pointer->right;
                        }else{
                            $pointer->right = new Binary_Tree_Node($val);
                            break;
                        }
                    }
                }
            }
        }
    

        public function returnSorted(){
            return $this->tree->traverseInorder();
        }
    }

    $set1 = array(100,30,54,23,54,64,22,34);
    $set2 = array(35,6,64,77,64,23,56,86);
    $set3 = array(60,30,244,743,54,76,45,23);

    function run($set){
        $sort_as_you_go = new Sorting_Tree();
        foreach ($set as $value){
            $sort_as_you_go->insert($value);
        }
        echo "<pre>";
        print_r($sort_as_you_go);
        echo "</pre>";

        echo '<p>', implode(', ', $sort_as_you_go->returnSorted()),'</p>';
    }

    echo "<pre>";
    print_r($set1);
    echo "</pre>";
    run($set1);
    echo "<hr>";

    echo "<pre>";
    print_r($set2);
    echo "</pre>";
    run($set2);
    echo "<hr>";

    
    echo "<pre>";
    print_r($set3);
    echo "</pre>";
    run($set3);
    echo "<hr>";

?>