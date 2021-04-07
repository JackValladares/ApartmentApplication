<html>

<head>

	<link rel="stylesheet" href="css/stylesheet.css" />
	<link rel="stylesheet" href="css/searchbar.css" />
	<link rel="stylesheet" href="css/previewcards.css" />
	<script type = "text/javascript" src="../Webpages/javascript/LoginFunctions.js"></script>

</head>


<body style = "background-color: #fafafa">

	<?php include 'modules/header/header.php'; ?>
	<div class="bgbanner" style="background-image: url(imgs/ui/banners/homepage-banner.png);">
	
	</div>
	
	<div class="searchbarwrap">
		<h2 class = "subtitle">Start searching for your perfect home now</h2>
		<div class="search" style="display: inline-block;">
		<form id = \"homesearch\" method="post" action="../Webpages/ApartmentListings.php" >
			<input type="text" style="float:left; display:inline;" class="searchTerm" placeholder="Milledgeville, Georgia" name="query" />
			<br><p>Bathrooms
			<input type="range" min="1" max="5" value="1" style="float:left; display:inline; width: 20%" name="bath" />
			<p>Price
			<input type="range" min="0" max="1500" value="1" style="float:left; display:inline; width: 20%" name="price" />
			<p>Pets
			<input type="checkbox" style="float:left; display:inline; width: 20%" name="pets" />
			<p>Smoke
			<input type="checkbox" style="float:left; display:inline; width: 20%" name="smoke" />
			
			<button type="submit" style="float:right; display:inline;" class="searchButton"><i class="fa fa-search"></i></button>
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