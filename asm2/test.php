<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<nav>
	<ul>
	  <h1>Home</h1>
	  <li><a href="buyer.php">Buyer</a></li>
	  <li><a class="active" href="seller.php">Seller</a></li>
	</ul>
</nav>

<body>
	<?php 
		$emailErr = $email="";
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email)){ 
				$emailErr = "Invalid email.";
			}else{
				$email = test_data($_POST["email"]);
			}
		}
	?>
	
	<div style="margin-left:15%;padding:1px 16px;height:1000px;">
	  <div>
		<img width="100%" height="200px" src="https://www.hotwheelsautos.com/Dealer-Websites/Hot-Wheels-Auto-Sales-LLC-CT/images/banner2.jpg">
	  </div>
	  
	  <table width="100%">
		<tr>
			<td align="center" style="background-color:#D3D3D3; padding: 50px;">
				<img width="100px" src="https://cdn2.iconfinder.com/data/icons/greenline/512/check-512.png">
				<h1> Succesful </h1>
			</td>
		</tr>
	</table>
	<center><span style="color:red; font-size:15">
			<?php
				echo $emailErr;
			?>
	</span></center>
	<?php 
		$seller_name = $phone = $car_model = "";
		$plate_number = $price = $distance = $car_owners = $repair ="";
		
		$seller_name = $_POST["seller_name"];
		
		$phone = $_POST["phone"];
		
		$seller_info = $seller_name.",".$email.",".$phone.",";
		
		$car_model = $_POST["car_model"];
		$plate_number = $_POST["plate_number"];
		$price = $_POST["price"];
		
		$car_basic = "{".$car_model.";".$price.";".$plate_number."},";
		
		$car_distance = $_POST["distance"];
		$car_owners = $_POST["car_owners"];
		$car_repair = $_POST["repair"];
		
		$car_details = "{".$car_distance.";".$car_owners.";".$car_repair."},";
		
		$seller_reg = "\n" .$seller_info.$car_basic.$car_details;
	?>
	<table class="check">
		<tr>
			<td width="30%">Seller information</td>
			<td class="input_data">
				<b><?php echo $seller_info?></b>
			</td>
		</tr>
		<tr>
			<td>Car basic information</td>
			<td class="input_data">
				<b><?php echo $car_basic?></b>
			</td>
		</tr>
		<tr>
			<td>Car detailed information</td>
			<td class="input_data">
				<b><?php echo $car_details?></b>
			</td>
		</tr>
	</table>
	
	<?php 
		$directory = fopen("directory.txt","a");
		fwrite($directory, $seller_reg);
		fclose($directory);
	?>
	</div>


<style>
	body {
	  margin: 0;
	}

	ul {
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  width: 15%;
	  background-color: #f1f1f1;
	  position: fixed;
	  height: 100%;
	  overflow: auto;
	}

	li a {
	  display: block;
	  color: #000;
	  padding: 8px 16px;
	  text-decoration: none;
	}

	li a.active {
	  background-color: #4CAF50;
	  color: white;
	}

	li a:hover:not(.active) {
	  background-color: #555;
	  color: white;
	}
	
	/*-----------*/
	td{
		border-bottom: 1px solid #ddd;
	}

	table {
	  border-collapse: collapse;
	  width: 100%;
	}

	th, td {
	  padding: 8px;
	}

	th {
	  background-color: #4CAF50;
	  color: white;
	}
	
	td.input_data{
		text-align: right;
</style>
</body>
</html>
