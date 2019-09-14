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
	<a href="enrolment.php">Enrolment</a>
<!----------------------------------------->	
	<hr>
	<?php 
		$conn = mysqli_connect("localhost:3306", "root", "");	
		$db = mysqli_select_db($conn, "uow");
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
			}		$input_professor= "Mark Sifer";;
		?>
		
		<?php
		$sql = "SELECT STUDENT.full_name as student_name, SUBJECTS.subject_code, SUBJECTS.subject_name
				FROM SUBJECT_ENROLMENT
				JOIN STUDENT ON STUDENT.student_id = SUBJECT_ENROLMENT.student_id
				JOIN SUBJECTS ON SUBJECTS.subject_code = SUBJECT_ENROLMENT.subject_code
				WHERE SUBJECT_ENROLMENT.subject_code = (SELECT SUBJECTS.subject_code 
														FROM SUBJECTS
							  x.							WHERE SUBJECTS.coordinator = (SELECT PROFESSOR.email_name
																						FROM PROFESSOR
																						WHERE PROFESSOR.full_name = '$input_professor'));";
				
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			echo "f) The name of students who have class with professor <b>". $input_professor ."</b>";
			echo "<table border='1' width='50%'>";
			echo "<tr>";
			echo 	"<th>Subject code</th>";
			echo 	"<th>Subject name</th>";
			echo 	"<th>Student name</th>";
			echo "</tr>";
			while($row = mysqli_fetch_assoc($result)) {
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
		?>