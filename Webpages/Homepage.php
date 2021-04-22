<html>

<head>

	<link rel="stylesheet" href="css/stylesheet.css" />
	<link rel="stylesheet" href="css/searchbar.css" />
	<link rel="stylesheet" href="css/previewcards.css" />
	<script type = "text/javascript" src="javascript/LoginFunctions.js"></script>
	<script type = "text/javascript" src="javascript/ApartmentSearch.js"></script>

</head>


<body style = "background-color: #fafafa">

	<?php include 'modules/header/header.php'; ?>
	<div class="bgbanner" style="background-image: url(imgs/ui/banners/homepage-banner.png);">
	
	</div>
	
	<div class="searchbarwrap">
		<h2 class = "subtitle">Start searching for your perfect home now</h2>
		
		<button id='expandButton' style = "height: 30px;" >More Search Preferences</button>
		
		<div id = "homesearchbar" action="../Webpages/ApartmentListings.php" >
			<input form = "homesearch" type="text" style="float:left; display:inline; width: 90%;" class="searchTerm" placeholder="Milledgeville, Georgia" name="query" />
			<button form = "homesearch" type="submit" style="float:right; display:inline; position:absolute; width: 10%;" class="searchButton"><i class="fa fa-search"></i></button>
		</div>
		
		<div id="search" style="visibility: hidden; display: inline-block;">
			<form id = "homesearch" method = "get" action="../Webpages/ApartmentListings.php" >

				<!--<br><p>Bathrooms
				<input type="number" min="1" max="5" value="1" style="float:left; display:inline; width: 50%" name="bath" />-->
				<p>Max Price
				<input type="number" min="0" max="1000000" style="float:left; display:inline; width: 50%; margin-right: 10px;" name="price" />
				<p> Pets
				
				<select name="pets" style="float:left; display:inline; width: 50%; margin-right: 10px;" >
				
					<option Value = "Don't Care">Don't Care</option>
					<option value = "Yes">Yes</option>
					<option value = "No">No</option>

				</select>
				<p> Smoke
				
				<select name="smoke" style="float:left; display:inline; width: 50%; margin-right: 10px;" >
				
					<option Value = "Don't Care">Don't Care</option>
					<option value = "Yes">Yes</option>
					<option value = "No">No</option>

				</select>
			
			</form>
		</div>
	</div>
	
	<div class = "flavortext">
		<div class="centeredtext">
			Explore rentals near you
		</div>
	</div>
	
	
<div class="card">
  <img src="imgs/example-real-estate/bellamy.png" alt="Avatar" style="width:300px; height: 300px;">
  <div class="container">
    <h4><b>The Bellamy</b></h4>
    <p>145 S Irwin St</p>
	<p>Milledgeville, Georgia, 31061</p>
	<p>$399 - $650
  </div>
</div>

<div class="card-2">
  <img src="imgs/example-real-estate/revelry.png" alt="Avatar" style="width:300px; height: 300px;">
  <div class="container">
    <h4><b>Revelry Flats</b></h4>
    <p>500 W Franklin St</p>
	<p>Milledgeville, Georgia, 31061</p>
	<p>$500 - $700
  </div>
</div>

<div class="card-3">
  <img src="imgs/example-real-estate/popeyes.png" alt="Avatar" style="width:300px; height: 300px;">
  <div class="container">
    <h4><b>Popeyes</b></h4>
    <p>145 Chicken St</p>
	<p>Milledgeville, Georgia, 31061</p>
	<p>$6969
  </div>
</div>

<div class="card-4">
  <img src="imgs/example-real-estate/coollane.png" alt="Avatar" style="width:300px; height: 300px;">
  <div class="container">
    <h4><b>2 Roommates Wanted</b></h4>
    <p>164 S Irwin St</p>
	<p>Milledgeville, Georgia, 31061</p>
	<p>$400/person
  </div>
</div>
	
	
<p style = "position: absolute; bottom: -570px; padding: 10px; left: 35%; color: #adadad"> RoomMate.inc 2021 copyright trademark yada yada yada yada</p>
	
</body>

</html>