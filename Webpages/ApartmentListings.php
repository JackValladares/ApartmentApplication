<html>

<head>

	<link rel="stylesheet" href="../Webpages/css/stylesheet.css" />
	<link rel="stylesheet" href="../Webpages/css/tinysearchbar.css" />
	<link rel="stylesheet" href="../Webpages/css/previewcards.css" />
	<script type = "text/javascript" src="../Webpages/javascript/PortableApartmentSearch.js"></script>

</head>


<body style = "background-color: #fafafa">
	
	
	<?php include 'modules/header/header.php'; ?>
	
	<?php 
	
	
	require_once "../php/sqlFunctions.php";
	require_once "../cssnhtml/search.php";
	$query = searchListings();
	$conn = connectDB();
	
    // Username and password sent from the form
	$page = 0;
	
	//grab all completed shifts of the user
	
	
	//echo $query;
    $results = $conn->query($query);
	$c = 0;
	$listingrow = 0;
	
	$rowheight = 350;
	$rowwidth = 35;

	
	//Apartment Search Results
	if($results->num_rows > 0)
	{
		while($row = $results->fetch_assoc()){
			//$shiftlength = (strtotime($row['end_time']) - strtotime($row['start_time']))/60;
			$address = $row['address'];
			$apt = $row['apt_no'];
			$city = $row['city'];
			$state = $row['state'];
			$price = $row['price'];
			$id = $row['listing_id'];
			$pets = $row['pets_allowed'];
			$smoking = $row['smoking_allowed'];
			$roomsize = $row['room_size'];
			$bath = $row['bath_type'];
			
			if($c == 0)
			{
				
				echo 
				"<a href='../cssnhtml/listing.php?id=$id'>". 
				"<div class = 'tableEntryPurple' style = 'height: $rowheight; box-shadow: 5px 5px 3px #888888; width: $rowwidth%; position: absolute; top: calc(190px + $listingrow*375px); left: 26%;'>" .	
				"<h3>" .  $address . " [" . $apt . "] " .  "</a>" . "<br>Price: $" . $row['price'] . 
				"<div style = 'position: absolute; left: 53%; top: 85px;' >"  .  $city . ", " . $state . "<br>Room Size: " . $roomsize . 
				"<br>Pets Allowed: " . $pets . "<br>Smoking Allowed: " . $smoking . "<br>Bathroom Type: " . $bath ."</div>" .
				"<img src = '../Webpages/imgs/example-real-estate/revelry.png' style = 'height: 270px; width: 50%; position: absolute; left: 0px; bottom: 0px' /> " . 
				"</h3></div>";
				
				$c = 1;
			}else{
				echo 
				"<a href='../cssnhtml/listing.php?id=$id'>". 
				"<div class = 'tableEntryWhite' style = 'z-index: -1; margin-bottom: 25px; box-shadow: 5px 5px 3px #888888; height: $rowheight; width: $rowwidth%; position: absolute; top: calc(190px + $listingrow*375px); left: 62%;'>" . 
				"<h3>" .  $address . " [" . $apt . "] " .  "</a>" . "<br>Price: $" . $row['price'] . 
				"<div style = 'position: absolute; left: 53%; top: 85px;' >"  .  $city . ", " . $state . "<br>Room Size: " . $roomsize . 
				"<br>Pets Allowed: " . $pets . "<br>Smoking Allowed: " . $smoking . "<br>Bathroom Type: " . $bath ."</div>" .
				"<img src = '../Webpages/imgs/example-real-estate/revelry.png' style = 'height: 270px; width: 50%; position: absolute; left: 0px; bottom: 0px' /> " . 
				"</h3></div>";
				$listingrow += 1;
				$c = 0;
			}

			
			
		}
	}





	?>
	
	
	
	<div class="tinysearchbarwrap">
		
		<button id='tinyexpandButton' style = "height: 30px;" >More Search Preferences</button>
		
		<div id = "homesearchbar" action="../Webpages/ApartmentListings.php" >
			<input form = "homesearch" type="text" style="float:left; display:inline; width: 22%;" class="searchTerm" placeholder="Milledgeville, Georgia" name="query" />
			
			<button form = "homesearch" type="submit" style="float:right; display:inline; position:absolute; width: 3%; height: 56px;
			border: 1px solid #b902d1; background: #b902d1; text-align: center; color: #fff; border-radius: 0 5px 5px 0; cursor: pointer; font-size: 20px;" 
			class="tinysearchButton"><i class="fa fa-search"></i></button>
			
		</div>
		
		<div id="tinySearch" style="visibility: hidden; display: relative;">
		<br><br><br>
			<form id = "homesearch" method = "get" action="../Webpages/ApartmentListings.php">

				<!--<br><p>Bathrooms
				<input type="number" min="1" max="5" value="1" style="float:left; display:inline; width: 50%" name="bath" />-->
				<p>Max Price
				<input type="number" min="0" max="1000000" style="float:left; display:inline; width: 10%; margin-right: 10px;" name="price" />
				<p> Pets
				
				<select name="pets" style="float:left; display:inline; width: 10%; margin-right: 10px;" >
				
					<option Value = "Don't Care">Don't Care</option>
					<option value = "Yes">Yes</option>
					<option value = "No">No</option>

				</select>
				<p> Smoke
				
				<select name="smoke" style="float:left; display:inline; width: 10%; margin-right: 10px;" >
				
					<option Value = "Don't Care">Don't Care</option>
					<option value = "Yes">Yes</option>
					<option value = "No">No</option>

				</select>
			
			</form>
		</div>
	</div>
	
</body>

</html>