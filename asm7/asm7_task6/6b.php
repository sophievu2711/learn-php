<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name="disk_number" placeholder="Input disk numbers" required>
    <input type="submit" name="submit" value="Start" >
</form>

<?php
    $disk_number = ""; 
    if(isset($_GET["disk_number"])){
        $disk_number = $_GET["disk_number"];
        echo "Solution for <b style='color:red'>". $disk_number. " </b>disks of Tower of Hanoi <br>";
    }

    function move($disk, $source, $destination, $mid){
        if ($disk == 1){
            echo "Move disk 1 from $source to $destination <br>";
            return;
        }        
        move($disk-1, $source, $mid, $destination);
        echo "Move disk ". ($disk) ." from ".$source. " to ". $destination."<br>";
        move($disk-1, $mid, $destination, $source);
    }

    move($disk_number,"A","C","B");
?>