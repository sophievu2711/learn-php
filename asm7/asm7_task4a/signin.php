<html>
<link rel="stylesheet" type="text/css" href="loginstyle.css">
<body>
<!--Processing----------------------------------->
    <?php
        include "db.php";

		$error=''; //Variable to Store error message;
		if(isset($_POST['submit'])){
            if(empty($_POST['username']) || empty($_POST['password'])){
            $error = "Username or Password is Invalid";
            }else{
                //Define $user and $pass
                $user=$_POST['username'];
                $pass=$_POST['password'];

                //sql query to fetch information of registerd user and finds user match.
                $query = mysqli_query($conn, "SELECT * FROM customer 
                                                WHERE password= '$pass' AND ID='$user'");
                
                $result = mysqli_num_rows($query);
                if($result == 1){
                    while($row = mysqli_fetch_assoc($query)){
                        $_SESSION["username"] = $user;
                        $_SESSION["cname"] = $row["name"];
                    }
                    header("Location: home.php"); // Redirecting to other page
                }else{
                    $error = "Username of Password is Invalid";
                    echo $error;
                }
            }
		}
	?>

<!--Form----------------------------------->
<div class="login">
    <h1 align="center">Login</h1>
    <form action="signin.php" method="post" style="text-align:center;">
    <input type="text" placeholder="Username" id="user" name="username"><br/><br/>
    <input type="password" placeholder="Password" id="pass" name="password"><br/><br/>
    <input type="submit" value="Login" name="submit">
    <!-- Error Message -->
    <span><?php echo $error; ?></span>
    <a href="signup.php"></br>Register</a>
</div>
</body>
</html>