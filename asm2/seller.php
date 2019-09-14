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
	<div style="margin-left:15%;padding:1px 16px; height:1000px;">
	  <div>
		<img width="100%" height="200px" src="https://www.hotwheelsautos.com/Dealer-Websites/Hot-Wheels-Auto-Sales-LLC-CT/images/banner2.jpg">
	  </div>
	  
	  <div>
		<form action="sellerReg.php" method="POST">
			<fieldset>
			<legend>Personal information</legend>
				<label for="seller_name">Your name</label>
				<input type="text" name="seller_name" placeholder="Your name" required>

				<label for="email">Email</label>
				<input type="text" name="email" placeholder="Your email" required>
				
				<label for="phone">Phone</label>
				<input type="text" name="phone" placeholder="Your phone number" required>
			</fieldset>
			<table>
				<tr>
				<td valign="top">
					<fieldset>
					<legend>Car basic information</legend>
						<label for="car_model">Car Model</label>
						<input type="text" name="car_model" placeholder="Car model" required>
					
						<label for="plate_number">Plate number</label>
						<input type="text" name="plate_number" placeholder="Plate number" required>
						
						<label for="price">Price</label>
						<input type="text" name="price" placeholder="Car price" required>
					</fieldset>
				</td>
				
				<td valign="top">
					<fieldset>
					<legend>Car detailed information</legend>
						<label for="distance">Travelled distance</label>
						<input type="text" name="distance" placeholder="How many kilometers the car has travelled?" required>
					
						<label for="car_owners">Old owners</label>
						<input type="text" name="car_owners" placeholder="Number of old owners" required>
						
						<label for="repair">Recent repairs</label>
						<input type="text" name="repair" placeholder="Some description">
					</fieldset>
				</td>
				</tr>
			</table>
		  
			<input type="submit" value="Register">
		  </form>
	  </div>
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
	
	input[type=text], select, textarea{
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}

	input[type=submit] {
	  width: 100%;
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;
	}

	input[type=submit]:hover {
	  background-color: #45a049;
	}

	div {
	  border-radius: 5px;
	  background-color: #f2f2f2;
	  padding: 20px;
	}
	</style>
</body>
</html>
