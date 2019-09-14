<html>
<title>Enrolment</title>

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
			echo "<br>You are not in any course";
		}
	?>
	<hr>
	<a href="enrolment.php">Subject Enrolment</a> |
	<a href="enquiry.php">Enquiry</a> |
	<a href="backbone.html">Backbone</a>
	<hr>
<!---Subject enrolment---------------------------------------------------------------->
	<h3>Enrolment and variation</h3>
	<form action="subject_enrolment.php" method="POST">
	New subject code: 
		<input type="text" name="subject_code">
		<input type="submit" name="submit" value="Add subject">
	</form>
	
	<?php
		$sql = "SELECT SE.subject_code, SUBJECTS.subject_name, SE.study_session
				FROM SUBJECT_ENROLMENT SE
				JOIN STUDENT S ON SE.student_id = S.student_id 
				JOIN SUBJECTS ON SE.subject_code = SUBJECTS.subject_code
				WHERE SE.student_id = '$student_id';";
	
		$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) >0) {
				echo "<table border='1' width='80%'";
				echo "<tr>";
				echo "<th>Subject code</th>";
				echo "<th>Subject name</th>";
				echo "<th>Session</th>";
				echo "<th>Status</th>";
				echo "<th>Withdraw</th>";
				while($row = mysqli_fetch_assoc($result)) {
					$subject_code = $row["subject_code"];
					echo "<tr>";
					echo 	"<td width='15%'>". $row["subject_code"]. "</td>";
					echo 	"<td>". $row["subject_name"]. "</td>";
					echo	"<td align='center'>". $row["study_session"] ."</td>";
					echo 	"<td align='center'>Enrolled</td>";
					echo	"<td align='center'>";
					echo 	"<form action='cancellation.php' method='POST'>";
					echo			"<input type='hidden' name='subject_code' value='$subject_code'> <br>";
					echo			"<input type='submit' name='submit' value='Withdraw'>";
					echo 		"</form>";
					echo	"</td>";
					echo "</tr>";
				}
				echo "</table>";
			} else {
				echo "0 results";
			}
	?>
	<hr>
<!---List of available courses---------------------------------------------------------------->
	<?php	
		$sql = "SELECT S.subject_code, S.subject_name, PROFESSOR.full_name, S.department_name, S.school_name, count(SE.student_id) as number_of_students
				FROM SUBJECTS S
				LEFT JOIN SUBJECT_ENROLMENT SE ON SE.subject_code = S.subject_code
				JOIN PROFESSOR ON S.coordinator = PROFESSOR.email_name
				GROUP BY SE.subject_code";
		
		$num_of_student = "";
		
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) >0) {
			// output data of each row
				echo "<h3>List of available classes</h3>";
				echo "<table border='1' width='80%'>";
				echo "<tr>";
				echo 	"<th>Subject code</th>";
				echo 	"<th>Subject name</th>";
				echo 	"<th>Coordinator</th>";
				echo 	"<th>Department</th>";
				echo 	"<th>School</th>";
				echo 	"<th>Number of students</th>";
				echo "</tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo 	"<td>" .$row["subject_code"] ."</td>";
				echo 	"<td>" .$row["subject_name"] ."</td>";
				echo 	"<td>" .$row["full_name"] ."</td>";
				echo 	"<td>" .$row["department_name"] ."</td>";
				echo 	"<td>" .$row["school_name"] ."</td>";
				echo	"<td align='center'>" .$row["number_of_students"]. "</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		?>
<!------------------------------------------->		
	<hr>
	<a href="enquiry.php ">Search information</a>
	<a href="logout.php">Log out</a>
	<hr>
</body>
</html>