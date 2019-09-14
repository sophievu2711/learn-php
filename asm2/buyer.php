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
<div style="margin-left:15%;padding:1px 16px;height:1000px;">
  <div>
	<img width="100%" height="200px" src="https://www.hotwheelsautos.com/Dealer-Websites/Hot-Wheels-Auto-Sales-LLC-CT/images/banner2.jpg">
  </div>

  <div id="Buyer">
	<table width="100%">
		<tr>
			<td width="50%" style="vertical-align:top;">
			<h3>Available car list</h3>
				<table  width="80%">
					<tr>
						<th class="list">Car model</th>
						<th class="list">Plate numbers</th>
						<th class="list">Price</th>
					</tr>
					
					<?php
					$carList = file("directory.txt");
					for ($i=1; $i<count($carList);++$i){
						$line = explode(",", $carList[$i]);
						$carBasicInfo_arr = explode(";", trim($line[3],"{}"));
						$carDetails_arr = explode(";",trim($line[4],"{}"));
						$carModel = $carBasicInfo_arr[0];
						$carPrice = $carBasicInfo_arr[1];
						$carPlateNumber = $carBasicInfo_arr[2];
						$carDistance = $carDetails_arr[0];
						$carOwners = $carDetails_arr[1];
						$carRepairs = $carDetails_arr[2];
											
						echo "<tr class=\"list\">";
						echo "<td>" . $carModel . "</td>";
						echo "<td>" . $carPlateNumber . "</td>";
						echo "<td>" . $carPrice . "</td>";
					}
					?>
				</table>
			</td>			
			<td width="50%" style="vertical-align:top;">
			<h3>What is your interested car:</h3>
			<?php $inputPlateNumber = "";?>				
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
					<input class="search" type="text" placeholder="Enter the plate number" name="interested_car" value="<?php echo $inputPlateNumber?>">
					<input class="search" type="submit" name="buyerSubmit" value="View details">
				</form>
				</br>	
			<?php 
				$matchedPlateNumber = $carPlateNumber = $carModel = $carPrice = $carDistance = $carOwners = $carRepairs = "";
				$curOwner = $ownerEmail = $ownerPhone = "";
				if(isset($_GET["interested_car"])){
					$inputPlateNumber = $_GET["interested_car"];
					$error="";
					echo "Your input is: <b>" .$inputPlateNumber . $error. "</b>.</br>";
					
				
					for ($i=1; $i<count($carList);++$i)
					{
						$line = explode(",", $carList[$i]);
						$carBasicInfo_arr = explode(";", trim($line[3],"{}"));
						$carDetails_arr = explode(";", trim($line[4],"{}"));
						$carPlateNumber = $carBasicInfo_arr[2];
						if($carPlateNumber != $inputPlateNumber){
							echo "<b style=\"color:red\"> Sorry this plat number is not found! </b></br>";
						}else{
							$error="";
							$carModel = $carBasicInfo_arr[0];
							$carPrice = $carBasicInfo_arr[1];
							$carDistance = $carDetails_arr[0];
							$carOwners = $carDetails_arr[1];
							$carRepairs = $carDetails_arr[2];
							$matchedPlateNumber = $carBasicInfo_arr[2];
	
							$curOwner = $line[0];
							$ownerEmail = $line[1];
							$ownerPhone = $line[2];	
						}
					}
				}
			?>
			</br>
			
			
			
			<div class="w3-container">
			  <div class="w3-bar w3-black">
				<button class="w3-bar-item w3-button tablink w3-red" onclick="openInfo(event,'Car Details')">Car Details</button>
				<button class="w3-bar-item w3-button tablink" onclick="openInfo(event,'Contact')">Contact</button>
			  	<button class="w3-bar-item w3-button tablink" onclick="openInfo(event,'Register')">Register</button>
			  </div>
			  
			  <div id="Car Details" class="w3-container w3-border type">
				<table class="details" width="100%" height="300px">
					<tr class="details">
						<td class="details" width="40%">
							Car plate number:
						</td>
						<td class="details">
							<?php echo $matchedPlateNumber; ?>
						</td>
					</tr>
					<tr class="details">
						<td class="details" width="40%">
							Car model:
						</td>
						<td class="details">
							<?php echo $carModel; ?>
						</td>
					</tr>
					<tr class="details">
						<td class="details">
							Price: 
						</td>
						<td class="details">
							<?php echo $carPrice; ?>
						</td>
					</tr>
					<tr class="details">
						<td class="details">
							Car distance:
						</td>
						<td class="details">
							<?php echo $carDistance; ?>
						</td>
					</tr>
					<tr class="details">
						<td class="details">
							Number of old owners:
						</td>
						<td class="details">
							<?php echo $carOwners; ?>
						</td>
					</tr>
					<tr class="details">
						<td class="details">
							Recent repairs: 
						</td>
						<td class="details">
							<?php echo $carRepairs; ?>
						</td>
					</tr>
				</table>
			  </div>

			  <div id="Contact" class="w3-container w3-border type" style="display:none">
				<table class="details" width="100%" height="300px">
					<tr class="details">
						<td class="details" width="40%">
							Current owner:
						</td>
						<td class="details">
							<?php echo $curOwner; ?>
						</td>
					</tr>
					<tr class="details">
						<td class="details">
							Email: 
						</td>
						<td class="details">
							<?php echo $ownerEmail; ?>
						</td>
					</tr>
					<tr class="details">
						<td class="details">
							Phone:
						</td>
						<td class="details">
							<?php echo $ownerPhone; ?>
						</td>
					</tr>
				</table>
			  </div>
				
				<div id="Register" class="w3-container w3-border type" style="display:none">
					<form class="register_form" action="buyerReg.php" method="POST">
						<label for="buyerName">Buyer's name</label>
							<input class="register_form" type="text"  name="buyer_name" 
									placeholder="Your name.." 
									required>
						<label for="plateNumber">Plate number</label>	
							<input class="register_form" type="text" id="plate_number" name="plate_number" 
									value="<?php echo $matchedPlateNumber?>" 
									pattern="/^[A-Z][0-9]+$/"
									title="A valid plate number should contain only uppercase letters, and digits."
									required>
						<label for="buyerPhone">Phone</label>
							<input class="register_form" type="text" id="phone" name="buyer_phone" placeholder="Your phone number" required>
						<label for="proposedPrice">Proposed price</label>
							<input class="register_form" type="text" id="price" name="proposed_price" placeholder="Your proposed price" required>
						<input class="register_form" type="submit" value="Express of Interest">
					</form>
				</div>
			</div>
			</td>
		</tr>
	</table>
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
	
	/*-----------*/
	td.details{
		border-bottom: 1px solid #ddd;
	}
	/*-----------*/
	table {
	  border-collapse: collapse;
	  width: 100%;
	}

	th, td {
	  text-align: left;
	  padding: 8px;
	}

	tr.list:nth-child(even){background-color: #f2f2f2}

	th {
	  background-color: #4CAF50;
	  color: white;
	}
	
	tr.list:hover {background-color: #F0E68C;}
	
	/*------------*/
	input[type=text].register_form {
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}

	input[type=submit].register_form {
	  width: 100%;
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;
	}

	input[type=submit].register_form:hover {
	  background-color: #45a049;
	}
	
	input[type=text].search {
	  width: 70%;
	  border-box;
	  border: none;
	  border-bottom: 1px solid grey;
	  font-size: 12px;
	  background-color: white;
	  background-position: 10px 10px; 
	  padding: 10px;
	}
	
	input[type=submit].search {
	  background-color: #grey;
	  border: none;
	  color: white;
	  padding: 10px 20px;
	  text-decoration: none;
	  margin: 4px 2px;
	  cursor: pointer;
	  align:left;
	}

</style>
</body>
<script>
function openInfo(evt, infoType) {
  var i, x, tablinks;
  x = document.getElementsByClassName("type");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(infoType).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>
</html>
