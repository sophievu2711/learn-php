<html>
<title>Withdraw confirmation</title>
<body>
	<?php
		session_start();
	?>
	<h1>Hello <b style="color:green"><?php echo $_SESSION["full_name"]; ?></b></h1>
	Student id: <?php echo $_SESSION["student_id"];?>
	<?php 
		$conn = mysqli_connect("localhost:3306", "root", "");	
		$db = mysqli_select_db($conn, "uow");
	?>
<!---Course enrolment---------------------------------------------------------------->
	<?php	
		$student_id = $_SESSION['student_id'];
		$sql = "SELECT C.course_code, COURSE.course_name
				FROM COURSE_ENROLMENT C
				JOIN COURSE ON COURSE.course_code = C.course_code
				JOIN STUDENT ON STUDENT.student_id = C.student_id
				WHERE C.student_id = '$student_id';";
	
	$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) >0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "<br>". $row["course_name"] . " (Course code: " .$row["course_code"] .")";
			}
		} else {
			echo "0 results";
		}
	?>
	<hr>	
<!---Withdraw subject---------------------------------------------------------------->
	<?php 
		$subject_code = $_POST["subject_code"];	
		if(isset($_POST["subject_code"])){
			$sql = "DELETE FROM SUBJECT_ENROLMENT
					WHERE student_id='$student_id'
					and subject_code='$subject_code';";
			if (mysqli_query($conn, $sql)){
				echo "Withdrawn succesfully subject ".$subject_code;
				header("Location:enrolment.php");
			}else{
				echo "Failed!";
			}		
		}
	?>
</body>
</html>