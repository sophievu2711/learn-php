<?php
    include "header.php";
?>

<?php
    $required = array('phone' => 'Phone Number', 'state' => 'State');

    if(count($_POST)){
        $errors = "";
        foreach ($required as $field => $desc){
            if(!isset($_POST[$field]) || (trim($_POST[$field]) === "")) {
                $errors .= "<br/> {$desc} is a required field! \n";
            }
        }

        if($errors){
            echo "<p style=\"color:red\">The following errors were found: {$errors} </p>\n";
        }else {
            echo "no errors";
        }
    }
?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" name="f1">
<p>Please enter your contact information: </p>
<p>Name: 
<input name="name" type="text" value="<?=@$_POST['name']?>" />
</p>
<p>Phone:
<input name="phone" type="text" value="<?=@$_POST['phone']?>" />
</p>
<p>Email:
<input name="email" type="text" value="<?=@$_POST['email']?>" />
</p>
<p>Address:
<input name="address" type="text" value="<?=@$_POST['address']?>" />
</p>
<p>City:
<input name="city" type="text" value="<?=@$_POST['city']?>" />
</p>
<p>State:
<input name="state" type="text" value="<?=@$_POST['state']?>" />
</p>
<p><input type="submit" /></p>
</form>