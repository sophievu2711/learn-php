<?php
    function compare_size($a, $b){
        if($a['size'] == $b['size']){
            return 0;
        }else{
            return ($a > $b) ? -1:1;
        }
    }
    
?>

<?php
    $files = array();
    $path = '.';
    $d = dir($path);

    while (false !== ($file = $d->read())){
        if(($file{0} != '.') && 
            ($file{0} != '~') &&
            (substr($file, -3) != 'LCK') &&
            ($file != basename($_SERVER['PHP_SELF']) &&
            strtolower(substr($file, strrpos($file, '.') + 1)) == 'html')
            ){
                $files[$file] = stat($file);
            }
    }

    $d->close();
    echo '<style>td {padding-right: 10px;} </style>';
    echo '<table border="1"><caption> List of HTML files in this directory: </caption>';
    echo '<tr>';
    echo '<th>File name</th>';
    echo '<th>Size</th>';
    echo '<th>Timestamp</th>';
    echo '</tr>';
    uasort($files, 'compare_size');

    date_default_timezone_set('Australia/Sydney');

    foreach ($files as $name => $stats){
        echo "<tr><td><a href=\"{$name}\"> {$name} </a></td>\n";
        echo "<td align='right'> {$stats['size']} </td>\n";
        echo '<td>', date('m-d-Y h:ia', $stats['mtime']), "</td></tr>\n";
    }

    echo '</table>'; 
?> 

