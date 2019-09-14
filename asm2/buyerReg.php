<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<nav>
	<ul>
	  <h1>Home</h1>
	  <li><a class="active" href="buyer.php">Buyer</a></li>
	  <li><a href="seller.php">Seller</a></li>
	</ul>
</nav>

<body>
	<?php 
		$buyer_name = $_POST["buyer_name"];
		$plate_number = $_POST["plate_number"];
		$phone = $_POST["buyer_phone"];
		$proposed_price = $_POST["proposed_price"];
		$buyer = "\n" .$buyer_name . "," . $phone ."," . $plate_number ."," . $proposed_price .",";
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
	<table class="check">
		<tr>
			<td width="30%">Buyer name</td>
			<td class="input_data">
				<b><?php echo $buyer_name?></b>
			</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td class="input_data">
				<b><?php echo $phone?></b>
			</td>
		</tr>
		<tr>
			<td>Plate number</td>
			<td class="input_data">
				<b><?php echo $plate_number?></b>
			</td>
		</tr>
		<tr>
			<td>Proposed price</td>
			<td class="input_data">
				<b><?php echo $proposed_price?></b>
			</td>
		</tr>
	</table>
	
	<?php 
		$BuyerFile = fopen("buyer.txt","a");
		fwrite($BuyerFile, $buyer);
		fclose($BuyerFile);
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
