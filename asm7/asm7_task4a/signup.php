<html>
<link rel="stylesheet" type="text/css" href="signupstyle.css">
<body>

<!--Form----------->
    <form action="signupserver.php" method="POST">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="username"><b>ID</b></label>
        <input type="text" placeholder="Enter username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="Full name"><b>Full name</b></label>
        <input type="text" placeholder="Full name" name="cname" required>

        <hr>
        <button type="submit" class="registerbtn" name="signup">Register</button>
    </div>
    
    <div class="container signin">
        <p>Already have an account? <a href="signin.php">Sign in</a>.</p>
    </div>
    </form>

<!--Process sign up----------->
</body>
</html>