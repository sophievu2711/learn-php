<html>
<body>
<html>

<body>
	<?php
		// define variables and set to empty values
		$mortgageErr = $rateErr = $yearsErr = "";
		$mortgage = $interest_rate = $years = "";

		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			if (empty($_GET["mortgage_amount"])) {
				$mortgageErr = "Mortgage is required";
			} else {
				$mortgage = test_input($_GET["mortgage_amount"]);
			if (!preg_match("/^\S*$/",$mortgage)) {
				$mortgageErr = "Mortgage must not contain blank spaces"; 
			}
			if (!preg_match("/^[0-9].*$/",$mortgage)){
				$mortgageErr = "Only digit and "." are acceptable";
			}
		}
				  
			if (empty($_GET["rate"])) {
				$rateErr = "Interest rate is required";
			} else {
				$interest_rate = test_input($_GET["rate"]);
			if (!preg_match("/^\S*$/",$interest_rate)) {
				$rateErr = "Interest rate must not contain blank spaces"; 
			}
			if (!preg_match("/^[0-9].*$/",$interest_rate)){
				$rateErr = "Interest rate must contain only digit and \".\"";
			}
		}
				  
			if (empty($_GET["years"])) {
				$yearsErr = "Years is required";
			} else {
				$years = test_input($_GET["years"]);
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

	<table width="1024px" border="0" align="center">
	  <tr>
		<td colspan="2" 
			style="background-color:#f2eedb;">
			<!-- (2) Input form -->
			<h2>Two-page form</h2>
			<img width="100%" src="https://www.augustconsultingindia.com/images/services_banner.jpg">
		</td> 
	  </tr>	
	  
	  <tr>
		<td style="background-color:#a8806d; color:#ffffff; font-size:25"
			width="400px"
			colspan="2"
			align ="center">
			<span style="color:red; font-size:15">
			<?php
				echo "<br>";
				echo $mortgageErr;
				echo "<br>";
				echo $rateErr;
				echo "<br>";
				echo $yearsErr;
				echo "<br>";
			?>
			</span>
			Your mortgage amount is:  <b style="color:black"><?php echo $_GET["mortgage_amount"]; ?></b><br>
			Your interest rate is: <b style="color:black"><?php echo $_GET["rate"]; ?></b><br>
			Number of years is: <b style="color:black"><?php echo $_GET["years"]; ?></b><br><br>

			<?php $mortgage = $_GET["mortgage_amount"];?>
			<?php $interest_rate = $_GET["rate"];?>
			<?php $years= $_GET["years"];?>

			<b>MONTHLY PAYMENT WOULD BE:</b> 
			<div style="color:#fcca46; font-size:30;"><b>
			<?php 
				echo ((float)$mortgage * ((float)$interest_rate/12)/(1-(1/pow(1+(float)$interest_rate/12,(int)$years*12))));
			?></b></div>
		</td>
	  </tr>
	  
	</table>
</body>
</html>
</body>
</html>