<h1>Content of this directory</h1>
<?php  
    function listFolderFiles($dir){
        $ffs = scandir($dir);
    
        unset($ffs[array_search('.', $ffs, true)]);
    
        if (count($ffs) < 1)
            return;
    
        echo '<ul>';
        foreach($ffs as $ff){
            echo '<li><a href="../'.$ff.'">'.$ff;
            if(is_dir($dir.'/'.$ff)){
                listFolderFiles($dir.'/'.$ff);
            }
            echo '</li>';
        }
        echo '</ul>';
    }
    
    listFolderFiles('../');
?>