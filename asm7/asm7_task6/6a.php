<?php
    $test1 = array(100,200,array(123,234));
    $test2 = array(200,array(123,234),array(56,1),23);
    $test3 = array(array(10,12),45,2,array(29,31));

    function findmin($arr){
        foreach ($arr as $value){
            if(is_array($value)){
                $value = findmin($value);
            }
            if(!(isset($min))){
                $min = $value;
            }else {
                $min = $value < $min?
                $value:$min;
            }
        }
        return $min;
    }

    echo "<pre>";
    print_r($test1);
    echo "</pre>";
    echo "Min value is: ".findmin($test1);

    echo "<hr><pre>";
    print_r($test2);
    echo "</pre>";
    echo "Min value is: ".findmin($test2);
    
    echo "<hr><pre>";
    print_r($test3);
    echo "</pre>";
    echo "Min value is: ".findmin($test3);
?>