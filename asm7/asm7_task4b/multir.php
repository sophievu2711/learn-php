<?php 
    include "header.php";
?>
<?php
    if(isset($_POST['cities'])){
        echo "<p>You claim to have lived in the following cities: ";

        foreach($_POST['cities'] as $num=>$val){
            echo '<br/>', ($num+1),".{$val}\n";
        }
        echo "</p>\n";
    }
?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post" name="f1">
    <p>In order, what are the most recent cities you have lived in?</p>
    <ol>
    <?php
        echo str_repeat('<li><input name="cities[]" type="text" /></li>',12);
    ?>
    </ol>
    <p><input type="submit" /></p>
</form>