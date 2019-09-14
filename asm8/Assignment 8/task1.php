
<?php 
$x = 75;
$y = 25; 
add1();
out_put();
function add1(){
    global $z,$x,$y;
    $z=$x+$y;
}
function out_put(){
    global $z,$x,$y;
    $z=$z-1;
}
echo $z;
?>