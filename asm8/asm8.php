<?php
function Arrange($r1,$r2,$col1,$col2,$r_filled,$col_filled){
    global $Location, $TileNo;
    if ($r2-$r1 == 1){
        for ($r=$r1;$r<=$r2;$r++){
            for ($col=$col1;$col<=$col2;$col++){
                if (($r != $r_filled) or ($col != $col_filled)){
                    $Location[$r][$col]=$TileNo;
                }
            }
        }
        $TileNo=$TileNo+1;
    }else{
        $Middle_row=($r1+$r2-1)/2;
        $Middle_col=($col1+$col2-1)/2;
        if ($r_filled <= $Middle_row && $col_filled <= $Middle_col){
            $Situation="upper_left";
        }elseif ($r_filled <= $Middle_row && $col_filled > $Middle_col){
            $Situation="upper_right";
        }elseif ($r_filled > $Middle_row && $col_filled <= $Middle_col){
            $Situation="lower_left";
        }elseif ($r_filled > $Middle_row && $col_filled > $Middle_col){
            $Situation="lower_right";
        }
        switch($Situation){
            case "upper_left":
                Arrange($r1,$Middle_row,$col1,$Middle_col,$r_filled,$col_filled);
                Arrange($r1,$Middle_row,$Middle_col+1,$col2,$Middle_row,$Middle_col+1);
                Arrange($Middle_row+1,$r2,$col1,$Middle_col,$Middle_row+1,$Middle_col);
                Arrange($Middle_row+1,$r2,$Middle_col+1,$col2,$Middle_row+1,$Middle_col+1);
                //$[$Middle_row][$Middle_col]= TileNo;//note that it is omitted
                $Location[$Middle_row][$Middle_col+1]= $TileNo;
                $Location[$Middle_row+1][$Middle_col]= $TileNo;
                $Location[$Middle_row+1][$Middle_col+1]= $TileNo;

            break;
            case "upper_right":
                Arrange($r1,$Middle_row,$col1,$Middle_col ,$Middle_row, $Middle_col);
                Arrange($r1,$Middle_row, $Middle_col+1,$col2 ,$r_filled, $col_filled);
                Arrange($Middle_row+1,$r2,$col1,$Middle_col,$Middle_row+1, $Middle_col);
                Arrange($Middle_row+1,$r2,$Middle_col+1,$col2,$Middle_row+1, $Middle_col+1);
                $Location[$Middle_row][$Middle_col]=$TileNo;
                //$Location[$Middle_row][$Middle_col+1]= $TileNo;//note that it is omitted
                $Location[$Middle_row+1][$Middle_col]= $TileNo;
                $Location[$Middle_row+1][$Middle_col+1]= $TileNo;
            break;
            case "lower_left":
                Arrange($r1,$Middle_row,$col1,$Middle_col ,$Middle_row, $Middle_col);
                Arrange($r1,$Middle_row, $Middle_col+1,$col2 ,$Middle_row,$Middle_col+1);
                Arrange($Middle_row+1,$r2,$col1,$Middle_col,$r_filled, $col_filled);
                Arrange($Middle_row+1,$r2,$Middle_col+1,$col2,$Middle_row+1, $Middle_col+1);
                $Location[$Middle_row][$Middle_col]= $TileNo;
                $Location[$Middle_row][$Middle_col+1]= $TileNo;
                //$Location[$Middle_row+1][$Middle_col]= $TileNo;//note that it is omitted
                $Location[$Middle_row+1][$Middle_col+1]= $TileNo;
            break ;
            case "lower_right";
                Arrange($r1,$Middle_row,$col1,$Middle_col ,$Middle_row, $Middle_col);
                Arrange($r1,$Middle_row, $Middle_col+1,$col2 ,$Middle_row,$Middle_col+1);
                Arrange($Middle_row+1,$r2,$col1,$Middle_col,$Middle_row+1, $Middle_col);
                Arrange($Middle_row+1,$r2,$Middle_col+1,$col2,$r_filled,$col_filled);
                $Location[$Middle_row][$Middle_col]= $TileNo;
                $Location[$Middle_row][$Middle_col+1]= $TileNo;
                $Location[$Middle_row+1][$Middle_col]= $TileNo;
                //$Location[$Middle_row+1][$Middle_col+1]= $TileNo;//note that it is omitted 
            break;
        }
        $TileNo=$TileNo+1;
        }
}
//out put function
function Out_Put(){
    global $n,$Location;
    echo "<table border='1'>";
    for ($row=0;$row<$n;$row++){
        echo "<tr>";
        for ($col=0;$col<$n;$col++){
            echo ("<td style='padding: 20px;'>" . $Location[$row][$col]. "</td>" );
        }
        echo "</tr>";
    } 
    echo"</table>";
}
// Out put with color function
function Out_Put_Color(){
    global $n,$Location;
    echo "<table border='1'>";
    for ($row=0;$row<$n;$row++){
        echo"<tr>";
        for ($col=0;$col<$n;$col++){
            $red=$Location[$row][$col]*30%255;
            $green=$Location[$row][$col]*150%255;
            $blue=$Location[$row][$col]*200%255;
            echo("<td style='padding: 20px; background-color: rgb($red,$green,$blue);'>". $Location[$row][$col]."</td>");
        }
        echo"</tr>";
    } 
    echo"</table>";
}
?>





<form action="test.php">
    <input type="text" name="m" placeholder="Input m">
    <input type="text" name="r_blackcell" placeholder = "Input row of black cell">
    <input type="text" name="col_blackcell" placeholder = "Input column of black cell">
    <input type ="submit" name="submit">
</form>

<?php
//Define
$m=1;
$r_blackcell=1;
$col_blackcell=1;
if(isset($_GET['submit'])){
    $r_blackcell=$_GET['r_blackcell'] -1;
    $col_blackcell=$_GET['col_blackcell']-1;
    $m= $_GET['m'];

$n=pow(2,$m);
$TileNo=1;
$Location=array();
for ($row=0;$row<$n;$row++){
    for ($col=0;$col<$n;$col++){
        $Location[$row][$col]=0;
    }
}

$Location[$r_blackcell][$col_blackcell]=0;
//body
if ($m<6)
{
    Arrange(0,$n-1,0,$n-1,$r_blackcell,$col_blackcell);
    Out_Put();
    echo "<hr>";
    Out_Put_Color();
}else{
    echo "m must smaller than 6";
}

// Arrange Function

}
?>