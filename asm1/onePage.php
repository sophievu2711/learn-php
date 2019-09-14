<html>

<head>
<style type="text/css">
.error {color: #FF0000;}
</style>
</head>

<script>

</script>

<body>
	<table width="1024px" border="0" align="center">
	  <tr>
		<td colspan="2" 
			style="background-color:#f2eedb;">
			<!-- (2) Input form -->
			<h2>All-in-one form</h2>
			<img width="100%" src="https://www.augustconsultingindia.com/images/services_banner.jpg">
		</td> 
	  </tr>	
	  
	  <tr>
		<td style="background-color:#a8806d; color:#ffffff"
			width="400px">	
			
			<?php
				// define variables and set to empty values
				$nameErr = $mortgageErr = $rateErr = $yearsErr = "";
				$name = $mortgage = $interest_rate = $years = "";

				if ($_SERVER["REQUEST_METHOD"] == "POST") {
				  if (empty($_POST["name"])) {
					$nameErr = "Name is required";
				  } else {
					$name = test_input($_POST["name"]);
					if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
					  $nameErr = "Only letters and white space allowed"; 
					}
				  }
				  
				  if (empty($_POST["mortgage"])) {
					$mortgageErr = "Mortgage is required";
				  } else {
					$mortgage = test_input($_POST["mortgage"]);
					if (!preg_match("/^\S*$/",$mortgage)) {
					  $mortgageErr = "Must not contain blank spaces"; 
					}
					if (!preg_match("/^[0-9].*$/",$mortgage)){
					  $mortgageErr = "Only digit and "." are acceptable";
					}
				  }
				  
				  if (empty($_POST["rate"])) {
					$rateErr = "Interest rate is required";
				  } else {
					$interest_rate = test_input($_POST["rate"]);
					if (!preg_match("/^\S*$/",$interest_rate)) {
					  $rateErr = "Interest rate must not contain blank spaces"; 
					}
					if (!preg_match("/^[0-9].*$/",$interest_rate)){
					  $rateErr = "Interest rate must contain only digit and \".\"";
					}
				  }
				  
				  if (empty($_POST["years"])) {
					$yearsErr = "Years is required";
				  } else {
					$years = test_input($_POST["years"]);
					if (!preg_match("/^\S*$/",$years)) {
					  $yearsErr = "Must not contain blank spaces"; 
					}
					if (!preg_match("/^[0-9]*$/",$years)){
					  $yearsErr = "Years only contain digit and \".\" ";
					}
				  }
				}
			
			function test_input($data) {
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			?>
			
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">			
			<p>Please enter your personal information</p>
			<fieldset><legend>Personal information</legend>
				Name: <input type="text" name="name" value="<?php echo $name;?>">
				<span class="error"><?php echo $nameErr. "</br>";?></span>
				<br><br>
			</fieldset>
			
			<p>Please enter details below to calculte what your re-payment will be weekly.</p>
				
			<fieldset><legend>Mortgage details</legend>
				Mortgage: <input type="text" name="mortgage" value="<?php echo $mortgage;?>">
			    <span class="error">* <?php echo $mortgageErr;?></span>
			    <br><br>
			    Interest rate : <input type="text" name="rate" value="<?php echo $interest_rate;?>">
			    <span class="error"><?php echo $rateErr;?></span>
			    <br><br>
			    Years: <input type="text" name="years" value="<?php echo $years;?>">
			    <span class="error"><?php echo $yearsErr;?></span>
			    <br><br>
						
				<p><input type="submit" name="submit" value="Calculate"></p>
			</form>
			</fieldset>
			<br>
		</td>
		<td>
			<img width="624px" src="https://blogassets.upstart.com/wp-content/uploads/2014/08/loan-calculator.jpg">
		</td>
	  </tr>
	  
	  <tr>
		<td colspan="2">
			<p><span class="error">* required field</span></p>
			<h1>
			<?php echo "Thank you for filling out the form, ";?>
			<span style="color:red"><?php echo $name . ".";?></span>
			</h1>
			
			<?php
				echo "<br> Amount of mortgage: " ."<b>".$mortgage."</b>";
				echo "<br> Interest rate: ". "<b>" .$interest_rate ."</b>";
				echo "<br>Number of years: " ."<b>".$years."</b>"."<br>";
				echo "<br>Your weekly payment will be: ";
			 ?>
			 
			<b style="color:red; font-size:25">
			<?php
				if(isset($_POST['submit'])){
				echo ((float)$mortgage * ((float)$interest_rate/12)/(1-(1/pow(1+(float)$interest_rate/12,(int)$years*12))));
				}
			?>
			</b>
		</td>
	  </tr>
	  
	</table>
</body>
</html>