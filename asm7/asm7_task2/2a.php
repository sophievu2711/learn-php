<form method="get" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="text" name="str" placeholder="Input a number">
    <input type="submit" name="submit" value="Convert">
</form>

<?php
    $input="";
    $extract="";
    $roman="";

    if(isset($_GET["submit"]) && isset($_GET["str"])){
        $input = $_GET["str"];
    }

    echo "Your input string: <b style='font-size: 30px'>" . $input ."</b><br>";
    $extract = preg_replace('/[^0-9]/', '', $input);
    echo "Number extracted from your input: <b style='font-size: 30px;'>" .$extract. "</b><br>";

?>

<?php
    function romanize($num){
        $n = intval($num);
        $result="";

        $lookup = array("M"     => 1000,
                        "CM"    => 900,
                        "D"     => 500,
                        "CD"    => 400,
                        "C"     => 100,
                        "XC"    => 90,
                        "L"     => 50,
                        "XL"    => 40,
                        "X"     => 10,
                        "IX"    => 9,
                        "V"     => 5,
                        "IV"    => 4,  
                        "I"     => 1);

    foreach ($lookup as $roman => $value){
        $matches = intval($n/$value);
        $result .= str_repeat($roman, $matches);
        $n = $n % $value;
    }
    return $result;
    }

    $roman = romanize($extract);
    echo "Roman number: <b style='font-size: 30px;'>" .$roman. "</b>";

?>