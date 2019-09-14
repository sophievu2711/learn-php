<?php
    include "header.php";
?>

<?php
    if(count($_POST)){
        echo "<p>You submitted the following music ID numbers: <br/>
        1st - {$_POST['1st']}, 2nd - {$_POST['2nd']}, 3rd - {$_POST['3rd']}</p>
        ";
    }

    $types = array(
        array('id' => 10, 'desc' =>'Rock'),
        array('id' => 11, 'desc' =>'Alternative'),
        array('id' => 12, 'desc' =>'Metal'),
        array('id' => 20, 'desc' =>'Classical'),
        array('id' => 33, 'desc' =>'Jazz'),
        array('id' => 34, 'desc' =>'Blues'),
        array('id' => 42, 'desc' =>'Ska'),
        array('id' => 44, 'desc' =>'Folk'),
        array('id' => 49, 'desc' =>'Blue Grass')
    );

    $options = "<option value=\"\">Select one...</option>\n";

    foreach ($types as $m){
        $options .= "<option value=\"{$m['id']}\">{$m['desc']}</option>\n";
    }
?>

<form action="<?=$_SERVER['PHP_SELF'] ?>" method="post" name="f1">
<p>Please choose your favorite types of music:</p>
<p>1st: <select name="1st"><?= $options?></select></p>
<p>2nd: <select name="2nd"><?= $options?></select></p>
<p>3rd: <select name="3rd"><?= $options?></select></p>
<p><input type="submit" /></p>
</form>