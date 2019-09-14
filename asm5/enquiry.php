<html>
<head>
<meta charset="UTF-8">
<title>Welcome</title>
</head>

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
	<a href="enquiry.php">Enquiry</a>
	
	<hr>
<!----------------------------------------->
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
		<select id="school" name="school_name">
		  <option value="Computing and Information Technology">Computing and Information Technology</option>
		  <option value="Electrical, Computer & Telecommunications Engineering">Electrical, Computer & Telecommunications Engineering</option>
		 </select>
		 <input type="submit" name="submit" value="View">
	</form>
	<?php
		$input_school="";
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			if(isset($_GET["school_name"]))
			$input_school= $_GET["school_name"];
		};
		
		$sql = "SELECT department_name
				FROM DEPARTMENT
				WHERE school_name LIKE '%$input_school%';";
		
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			echo "a) The name of departments of ". "<b>".$input_school."</b>";
			echo "<ol>";
			while($row = mysqli_fetch_assoc($result)) {
					echo "<li>".$row["department_name"]."</li>";
			}
			echo "</ol>";
		} else {
			echo "0 results";
		}
	?>
<!----------------------------------------->
		<hr>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
		<select id="course" name="course_code">
		  <option value="BitNM">Bachelor of Information Technology (Network management)</option>
		  <option value="BBis">Bachelor of Business Information Systems</option>
		  <option value="BEcte">Bachelor of Engineering (Electrical)</option>
		  <option value="BTele">Bachelor of Engineering (Telecommunication)</option>
		 </select>
		 <input type="submit" name="submit" value="View">
	</form>
	<?php
		$input_course="";
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			if(isset($_GET["course_code"]))
			$input_course= $_GET["course_code"];
		};
	?>
	<?php
		$sql = "SELECT COURSE_ENROLMENT.course_code, COURSE.course_name, STUDENT.full_name, STUDENT.student_id
				FROM COURSE_ENROLMENT
				JOIN STUDENT
				ON  COURSE_ENROLMENT.student_id = STUDENT.student_id
				JOIN COURSE 
				ON COURSE.course_code = COURSE_ENROLMENT.course_code
				WHERE COURSE_ENROLMENT.course_code = '$input_course';";
				
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) >0) {
			// output data of each row
				echo "b) The name of students of the course ". "<b>". $input_course."</b>";
				echo "<table border='1' width='50%'>";
				echo "<tr>";
				echo 	"<th>Course name</th>";
				echo 	"<th>Student</th>";
				echo "</tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo 	"<td width='70%'>" .$row["course_name"] ."</td>";
				echo 	"<td>" .$row["full_name"] ."</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "Choose a course to see the list of students involved in.";
		}
	?>
<!----------------------------------------->
		<hr>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
			<select id="school" name="school_name">
			  <option value="Computing and Information Technology">Computing and Information Technology</option>
			  <option value="Electrical, Computer & Telecommunications Engineering">Electrical, Computer & Telecommunications Engineering</option>
			 </select>
			 <input type="submit" name="submit" value="View">
		</form>
	<?php
			$input_school="";
			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				if(isset($_GET["school_name"]))
				$input_school= $_GET["school_name"];
			};
	?>
		
		<?php
		$sql = "SELECT PROFESSOR.full_name, PROFESSOR.department_name, DEPARTMENT.school_name
				FROM PROFESSOR
				JOIN DEPARTMENT 
				ON PROFESSOR.department_name = DEPARTMENT.department_name
				WHERE DEPARTMENT.school_name LIKE '$input_school';";
				
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			echo "c) The name of professors of ". "<b>".$input_school."</b>";
			echo "<table border='1' width='50%'>";
			echo "<tr>";
			echo 	"<th>Department</th>";
			echo 	"<th>Professor</th>";
			echo "</tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td width='70%'>".$row["department_name"]."</td>";				
				echo "<td>".$row["full_name"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "Choose a school to see the list of professors in that school";
		}
		?>
<!----------------------------------------->
		<hr>
		<?php
		$sql = "SELECT COURSE.course_name, COURSE_ENROLMENT.course_code, COUNT(DISTINCT(COURSE_ENROLMENT.student_id)) as number_of_students
				FROM COURSE
				RIGHT JOIN COURSE_ENROLMENT 
				ON COURSE.course_code = COURSE_ENROLMENT.course_code
				group by COURSE_ENROLMENT.course_code;";
				
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			echo "d) The number of students in each course:" ;
			echo "<table border='1' width='50%'>";
			echo "<tr>";
			echo 	"<th>Course name</th>";
			echo 	"<th>Course code</th>";
			echo 	"<th>Number of students</th>";
			echo "</tr>";
			
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo 	"<td width='70%'>".$row["course_name"]. "</td>";
				echo	"<td>".$row["course_code"]."</td>";
				echo	"<td align='center'>".$row["number_of_students"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		?>
<!----------------------------------------->
		<hr>
		<?php
		$sql = "SELECT DEPARTMENT.school_name, count(PROFESSOR.full_name) as num_of_professors
				FROM PROFESSOR
				JOIN DEPARTMENT 
				ON PROFESSOR.department_name = DEPARTMENT.department_name
				GROUP BY DEPARTMENT.school_name;";
				
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			echo "e) The number of professors in each school:" ;
			echo "<table border='1' width='50%'>";
			echo "<tr>";
			echo 	"<th>School</th>";
			echo 	"<th>Number of professors</th>";
			echo "</tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo 	"<td width='70%'>".$row["school_name"]. "</td>";
				echo	"<td align='center'>".$row["num_of_professors"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		?>
<!----------------------------------------->
	<hr>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
			<input type="text" name="professor" placeholder="Input name of a professor">
			<input type="submit" name="submit" value="View">
		</form>
		
		<?php
			$input_professor= "";
			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				if(isset($_GET["professor"]))
				$input_professor = $_GET["professor"];
			};

		$prof_teaching = "SELECT subject_code, full_name
						  FROM SUBJECTS
						  JOIN PROFESSOR ON coordinator = email_name
						  WHERE full_name like '%$input_professor%';";
		
		$find_subject = mysqli_query($conn, $prof_teaching);
		if(mysqli_num_rows($find_subject)> 0){
			while($subject = mysqli_fetch_assoc($find_subject)){
				$professor_name = $subject['full_name'];
				$subject = $subject['subject_code'];
				$sql = "SELECT STUDENT.full_name as student_name, SUBJECTS.subject_code, SUBJECTS.subject_name
						FROM SUBJECT_ENROLMENT
						JOIN STUDENT ON STUDENT.student_id = SUBJECT_ENROLMENT.student_id
						JOIN SUBJECTS ON SUBJECTS.subject_code = SUBJECT_ENROLMENT.subject_code
						WHERE SUBJECT_ENROLMENT.subject_code = '$subject';";
			
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					echo "f) The name of students who have class with professor <b>". $professor_name ."</b>";
					echo "<table border='1' width='50%'>";
					echo "<tr>";
					echo 	"<th>Subject code</th>";
					echo 	"<th>Subject name</th>";
					echo 	"<th>Student name</th>";
					echo "</tr>";
					while($row = mysqli_fetch_assoc($result)){
						echo "<tr>";
						echo 	"<td>".$row["subject_code"]. "</td>";
						echo	"<td>".$row["subject_name"]."</td>";
						echo	"<td>".$row["student_name"]."</td>";				
						echo "</tr>";
					}
						echo "</table>";
				} else {
					echo "Input name of a professor to see the name of students who have class with that professor.";
				}		
			}
		}
		?>

<!----------------------------------------->
		<hr>
		<?php
		$sql = "SELECT SUBJECTS.school_name, SUBJECTS.subject_code, COUNT(SUBJECT_ENROLMENT.student_id) as num_of_students
				FROM SUBJECT_ENROLMENT
				JOIN SUBJECTS ON SUBJECTS.subject_code = SUBJECT_ENROLMENT.subject_code
				GROUP BY SUBJECT_ENROLMENT.subject_code, SUBJECTS.school_name;";
				
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			echo "g) The number of students having enrolled in the classes offered by each school: ";
			echo "<table border='1' width='50%'>";
			echo "<tr>";
			echo 	"<th>School</th>";
			echo 	"<th>Subject code</th>";
			echo 	"<th>Number of students</th>";
			echo "</tr>";			
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo 	"<td width='60%'>".$row["school_name"]. "</td>";
				echo	"<td>".$row["subject_code"]."</td>";
				echo	"<td align='center'>".$row["num_of_students"]."</td>";				
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		?>		
</body>
</html>