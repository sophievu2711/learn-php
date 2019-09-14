<?php
    function create_chart($data, $height, 
                        $bars = 'red', 
                        $bg = 'white', 
                        $border = 'black', 
                        $grid = '#DDD'){

        static $idx = 0;
        $idx++;
        $height -=2;
        $scale = $height/(max($data) * 1.05);
        $width = count($data);

        echo "
        <style>
        #chartout{$idx}{
            position: relative;
            height: ",$height + 2,"px;
            width: ",$width + 2,"px;
            background-color: {$border};
        }
        #chartin{#idx}{
            position: absolute;
            top: 1px; 
            left: 1px;
            height: {$height}px;
            width: {$width}px;
            background-color: {$bg};
        }
        .bar{$idx}{
            position: absolute;
            bottom: 0px;
            background-color: {$bars};
            width: 1px;
            overflow: hidden;
        }
        .grid{$idx}{
            position: absolute;
            left: 0px;
            height: 1px;
            width: {$width}px;
            background-color: {$grid};
            overflow: hidden;
        }
        </style>
        ";

        echo "
            <div id='chartout{$idx}'><div id='chartin{$idx}'>
        ";

        foreach(range(1,3) as $line){
            $lh = round($line * ($height/5));
            echo "<div class='grid{$idx}' style='top: {$lh}px'></div>\n";
        }

        foreach($data as $pos => $val){
            $barheight = round($val * $scale);
            echo "<div class='bar{$idx}' style='left:{$pos}px; 
                                                hegiht:{$barheight}px'>
                    </div>\n";
        }

        echo "\n</div></div>\n";
    }

        $chartdata = array();
        $chartdata2 = array();
        for($i = 0; $i < 200; $i++){
            $chartdata[$i] = rand(1,1000);
            $chartdata2[$i] = rand(1,1000);
        }

        create_chart($chartdata2, 50, '#0c0','black','black','#666');
        
?>