<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 30%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 20px;
    }

    #customers td:hover {
        opacity: 0.2;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 6px;
        padding-bottom: 6px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<script>
    // $( document ).ready(function() {
    //     $(".td").on('click', () =>{
    //         console.log('click here ', $(this).text())
    //     });
    // });

    let arr = [];

    function clickButton(e) {
        console.log('e is ', e)
        console.log('e target is ', e.textContent)

        const text = e.textContent;
        const a = text.split(',');
        if (arr.length >= 3) {
            arr = [];
            arr[0] = a[0]
        }
    }

</script>

<?php

function rand_color() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

// $n == $nXStart - $nXEnd
function pile($n, $nXStart, $nXEnd, $nYStart, $nYEnd, $x, $y, &$arr, $color_arr, $rand_color_each_time = false) {
    $nXMid = floor(($nXEnd + $nXStart)/2);
    $nYMid =  floor(($nYEnd + $nYStart)/2);
    $new_n = $n/2;
    if ($n < 2) {
        return;
    }
//    if ($n == 2) {
//        if ($x <= $nXMid) {
//            if ($y <=$nYMid) {
//
//            }
//            else {
//
//            }
//        }
//        else {
//            if ($y <=$nYMid) {
//
//            }
//            else {
//
//            }
//        }
//    }


    /*
     *      | 1 | 3 |
     *      | 2 | 4 |
     */
    else {
        $color = !$rand_color_each_time ? $color_arr[$n] : rand_color();
//        echo "xMid - $nXMid ; yMid - $nYMid ; xStart - $nXStart ; xEnd - $nXEnd; yStart - $nYStart ; yEnd - $nYEnd<br>";
        if ($x <= $nXMid) {
            // Pile 1
            if ($y <=$nYMid) {
                $arr[$nXMid][$nYMid + 1] = $arr[$nXMid+1][$nYMid] = $arr[$nXMid+1][$nYMid+1] = $color;
                pile($new_n, $nXStart, $nXMid, $nYStart, $nYMid, $x, $y, $arr, $color_arr, $rand_color_each_time);
                pile($new_n, $nXStart, $nXMid, $nYMid+1, $nYEnd, $nXMid, $nYMid+1, $arr, $color_arr, $rand_color_each_time);
                pile($new_n, $nXMid + 1, $nXEnd, $nYStart, $nYMid, $nXMid+1, $nYMid, $arr, $color_arr, $rand_color_each_time);
                pile($new_n, $nXMid + 1, $nXEnd, $nYMid+1, $nYEnd, $nXMid+1, $nYMid+1, $arr, $color_arr, $rand_color_each_time);
            }
            // Pile 2
            else {
                $arr[$nXMid][$nYMid] = $arr[$nXMid+1][$nYMid] = $arr[$nXMid+1][$nYMid+1] = $color;
                // 1
                pile($new_n, $nXStart, $nXMid, $nYStart, $nYMid, $nXMid, $nYMid, $arr, $color_arr, $rand_color_each_time);
                // 2
                pile($new_n, $nXStart, $nXMid, $nYMid+1, $nYEnd, $x, $y, $arr, $color_arr, $rand_color_each_time);
                // 3
                pile($new_n, $nXMid + 1, $nXEnd, $nYStart, $nYMid, $nXMid+1, $nYMid, $arr, $color_arr, $rand_color_each_time);
                // 4
                pile($new_n, $nXMid + 1, $nXEnd, $nYMid+1, $nYEnd, $nXMid+1, $nYMid+1, $arr, $color_arr, $rand_color_each_time);
            }
        }
        else {
            // Pile 3
            if ($y <=$nYMid) {
                $arr[$nXMid][$nYMid + 1] = $arr[$nXMid][$nYMid] = $arr[$nXMid+1][$nYMid+1] = $color;
                // 1
                pile($new_n, $nXStart, $nXMid, $nYStart, $nYMid, $nXMid, $nYMid, $arr, $color_arr, $rand_color_each_time);
                // 2
                pile($new_n, $nXStart, $nXMid, $nYMid+1, $nYEnd, $nXMid, $nYMid+1, $arr, $color_arr, $rand_color_each_time);
                // 3
                pile($new_n, $nXMid + 1, $nXEnd, $nYStart, $nYMid, $x, $y, $arr, $color_arr, $rand_color_each_time);
                // 4
                pile($new_n, $nXMid + 1, $nXEnd, $nYMid+1, $nYEnd, $nXMid+1, $nYMid+1, $arr, $color_arr, $rand_color_each_time);
            }
            else {
                $arr[$nXMid][$nYMid + 1] = $arr[$nXMid][$nYMid] = $arr[$nXMid+1][$nYMid] = $color;
                // 1
                pile($new_n, $nXStart, $nXMid, $nYStart, $nYMid, $nXMid, $nYMid, $arr, $color_arr, $rand_color_each_time);
                // 2
                pile($new_n, $nXStart, $nXMid, $nYMid+1, $nYEnd, $nXMid, $nYMid+1, $arr, $color_arr, $rand_color_each_time);
                // 3
                pile($new_n, $nXMid + 1, $nXEnd, $nYStart, $nYMid, $nXMid+1, $nYMid, $arr, $color_arr, $rand_color_each_time);
                // 4
                pile($new_n, $nXMid + 1, $nXEnd, $nYMid+1, $nYEnd, $x, $y, $arr, $color_arr, $rand_color_each_time);
            }
        }
    }
}

function pilePile($n, $x, $y, $rand_color_each_time) {
    $n = pow(2, $n);
    $color_arr = array();
    for ($i = 1; $i <= $n; $i *= 2) {
        $color_arr[$i] = rand_color();
    }
    $arr = array();
    for ($i = 0; $i < $n; ++$i) {
        $arr[$i] = array();
    }
    pile($n, 0, $n-1, 0, $n-1, $x, $y, $arr, $color_arr, $rand_color_each_time);
    return $arr;
}


function echoTable($rand_color_each_time = false) {
    $n = 4;
    $power_n = pow(2, $n);
    $hello = pilePile($n, 5, 3, $rand_color_each_time);
    echo "<table id='customers'>";
    for ($i = 0; $i < $power_n; ++$i) {
        echo "<tr>";
        for ($j = 0; $j < $power_n; ++$j) {
            $color = isset($hello[$j][$i]) ? $hello[$j][$i] : 'white';
            echo "<td style='background-color: $color' class='td' onclick='clickButton(this)'>$j,$i</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
echoTable();
echo "<br><br>";
echoTable(true);


function showTrueOrFalseGroupOfTiles($n, $x, $y, $coorArray) {
    $helloArr = pilePile($n, $x, $y, true);
    echo "<pre>Result for 3 tiles: ";
    $lastColor = $helloArr[$coorArray[0][0]][$coorArray[0][1]];
    $colorComp = true;
    for ($i = 0; $i < 3; $i++) {
        echo $coorArray[$i][0], ",", $coorArray[$i][1], " - ";
        if ($colorComp && $lastColor != $helloArr[$coorArray[$i][0]][$coorArray[$i][1]]) {
            $colorComp = false;
        }
    }
    echo ": ";
    if (!$colorComp) {
        echo "FALSE";
    }
    else {
        echo "TRUE";
    }
    echo "\n</pre>";

}

showTrueOrFalseGroupOfTiles(5, 2, 3, array(
    array(1, 3),
    array(1, 4),
    array(2, 3),
));

showTrueOrFalseGroupOfTiles(5, 2, 3, array(
    array(1, 1),
    array(1, 2),
    array(2, 1),
));