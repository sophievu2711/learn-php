<?php
    include "header.php";
?>

<?php
    if(count($_FILES)){
        if(!($_FILES['attachment']['size'])){
            echo "<p>ERROR: No actual file uploaded</p>\n";
        }else{
            $newname = dirname(__FILE__).'/'.
                        basename($_FILES['attachment']['name']);
            
            if(!(move_uploaded_file($_FILES['attachment']['tmp_name'], $newname))){
                echo "<p>ERROR: A problem occured during file upload! </p>\n";
            }else{
                echo "<p>Done! The file has been saved as: {$newname}</p>\n";
            }
        }
    }
?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" name="f1">
    <input type="hidden" name="MAX_FILE_SIZE" value="8388608" />
    <p>Why don't you upload a file? <input type="file" name="attachment" />
    </p>
    <p><input type="submit" /></p>
</form>
