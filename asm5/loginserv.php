<html>
<body>
	<?php
		session_start();

		$error=''; //Variable to Store error message;
		if(isset($_POST['submit'])){
		 if(empty($_POST['username']) || empty($_POST['password'])){
		 $error = "Username or Password is Invalid";
		 }
		 else
		 {
		 //Define $user and $pass
		 $user=$_POST['username'];
		 $pass=$_POST['password'];
		 //Establishing Connection with server by passing server_name, user_id and pass as a patameter
		 $conn = mysqli_connect("localhost:3306", "root", "");
		 //Selecting Database
		 $db = mysqli_select_db($conn, "uow");
		 //sql query to fetch information of registerd user and finds user match.
		 $query = mysqli_query($conn, "SELECT * FROM STUDENT 
										WHERE pssword= md5($pass) AND user_name='$user'");
		 
		 $rows = mysqli_num_rows($query);
		 if($rows == 1){
			while($row = mysqli_fetch_assoc($query)){
				$_SESSION["username"] = $user;
				$_SESSION["full_name"] = $row["full_name"];
				$_SESSION["student_id"] = $row["student_id"];
			}
			header("Location: enrolment.php"); // Redirecting to other page
		 }
		 else
		 {
		 $error = "Username of Password is Invalid";
		 echo $error;
		 }
		 mysqli_close($conn); // Closing connection
		 }
		}
	?>
</body>
</html>