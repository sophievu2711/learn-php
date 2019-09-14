<?php
    function create_progress(){
        echo "
            <style>
            #text{
                position: absolute;
                top: 100px;
                left: 50%;
                margin: 0px 0px 0px -150px;
                font-size: 18px; 
                text-align: center;
                width: 300px;
            }
            #barbox_a{
                position: absolute;
                top: 130px;
                left: 50%;
                margin: 0px 0px 0px -160px;
                width: 304px;
                height: 24px;
                background-color: black;    
            }
            .per{
                position: absolute;
                top: 130px;
                font-size: 18px;
                left: 50%;
                margin: 1px 0px 0px 150px;
                background-color: #FFFFFF;
            }        
            .bar{
                position: absolute;
                top: 132px;
                left: 50%;
                margin: 0px 0px 0px -158px;
                width: 0px;
                height: 20px;
                background-color: #0099ff;
            }
            .blank{
                background-color: white;
                width: 300px;
            }
            </style>
        ";

        echo "
            <div id='text'>Script progress</div>
            <div id='barbox_a'></div>
            <div class='bar blank'></div>
            <div class='per'>0%</div>
        ";

        flush();
    }

    function update_progress($percent){
        echo "<div class='per'>{$percent}%</div>\n";
        echo "<div class='bar' style='width:", $percent*3, "px'></div>\n";
        flush();
    }

    create_progress();
    usleep(350000);
    update_progress(50);
    usleep(1550000);
    update_progress(100);

?>