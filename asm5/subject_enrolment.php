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
	<hr>
<!---Course enrolment---------------------------------------------------------------->
<?php 
		$subject_code = $_POST["subject_code"];	
		$student_id = $_SESSION["student_id"];
		if(isset($_POST["subject_code"])){
			$check = "select count(*) as number_of_students
						from subject_enrolment
						where subject_code ='$subject_code'
						group by subject_code";
			
			$check_result = mysqli_query($conn, $check);
			if (mysqli_num_rows($check_result) >0) {
				while($row = mysqli_fetch_assoc($check_result)) {
					if($row['number_of_students'] <= 5){
						$sql = "insert into SUBJECT_ENROLMENT values(
						'$subject_code',
						'$student_id',
						'01',
						'Autumn'
						);";
						
						if (mysqli_query($conn, $sql)){
							echo "Added succesfully subject ".$subject_code;
							header("Location:enrolment.php");
						}else{
							echo "You already enrolled in this subject.<br>";
						}
					}else echo "<p style='font-size:25'> Subject <b style='color:red'>".$subject_code ."</b> is unavailable. You can not enrolled in subjects that have more than 5 students.</p>";
						  echo "Number of students enrolled in ". $subject_code. " is: <b style='color:red; font-size:20'>". $row['number_of_students'] ."</b>";
						  echo "<br><br><a href='enrolment.php'><button>BACK</button></a> ";
				}
			}else echo "failed";
		}
	?>
<!------------------------------------------->		
	<hr><a href="logout.php">Log out</a>
	<hr>
</body>
</html>