<?php 
	require_once("../php/sqlFunctions.php");
	session_start();
	$conn = connectDB();
	if(isset($_COOKIE['email']))
	{
		$email = $_COOKIE['email'];
		$password = $_COOKIE['password'];
		$remember = 1;
		$goToHomePage = 1;
		userLogin($conn, $email, $password, $remember, $goToHomePage);
	}

	if(isset($_GET['msg']))
	{
		echo "<script>alert(\"Login Failed. Try Again\")</script>";
	}

?>

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
		<h2 class = "subtitle" id = "subtitle">Start searching for your perfect home now</h2>
		
		<button id='expandButton' style = "height: 30px;" >More Search Preferences</button>
        <button id='toggleSearch' style = "height: 30px;" >Search for Users</button>
		
		<div id = "homesearchbar" action="../Webpages/ApartmentListings.php" >
			<input form = "homesearch" type="text" style="float:left; display:inline; width: 90%;" class="searchTerm" id = "searchBar" name="query" />
			<button form = "homesearch" type="submit" style="float:right; display:inline; position:absolute; width: 10%;" class="searchButton" id = "searchButton"><i class="fa fa-search"></i></button>
		</div>
		
		<div id="search" style="visibility: hidden; display: inline-block;">
			<form id = "homesearch" method = "get" action="Listings.php" >

				<!--<br><p>Bathrooms
				<input type="number" min="1" max="5" value="1" style="float:left; display:inline; width: 50%" name="bath" />-->


				<p id = "label1" style = "position: absolute; left: 51%; top: -3%;" >Pets</p>
				
				<select name="field1" style="float:left; display:inline; width: 50%; margin-right: 10px; margin-top: 10px; margin-bottom: 10px;" id = "field1" >
				
					<option Value = "Don't Care">Don't Care</option>
					<option value = "Yes">Yes</option>
					<option value = "No">No</option>

				</select>
				<p id = "label2" style = "position: absolute; left: 51%; top: 28%;">Smoke</p>
				
				<select name="field2" style="float:left; display:inline; width: 50%; margin-right: 10px; margin-top: 10px; margin-bottom: 10px;" id = "field2" >
				
					<option Value = "Don't Care">Don't Care</option>
					<option value = "Yes">Yes</option>
					<option value = "No">No</option>

				</select>

                <p id = "label3" style = "position: absolute; left: 51%; top: 60%;">Max Price</p>
                <input type="number" name = "field3" min="0" max="1000000" style="float:left; display:inline; width: 50%; margin-right: 10px; margin-top: 10px; margin-bottom: 10px;" name="price" id = "field3"/>


                <input type="hidden" name = "type" id = "field4" value = "listings" />

			</form>
		</div>
	</div>
	
	<div class = "flavortext">
		<div class="centeredtext">
			Explore rentals near you
		</div>
	</div>
	
	
<?php 
	$conn = connectDB();
	$data = getRandomListings($conn);
	$listing0 = $data[0];
	$listing1 = $data[1];
	$listing2 = $data[2];
	$listing3 = $data[3];

?>

<div class="card">
  <img src="imgs/example-real-estate/bellamy.png" alt="Avatar" style="width:300px; height: 300px;">
  <div class="container">
  <?php
	$address = $listing0['address'];
    $apt = $listing0['apt_no'];
    echo "<p>$address $apt</p>";
	$city = $listing0['city'];
	$state = $listing0['state'];
	echo "<p>$city, $state</p>";
	$price = $listing0['price'];
	echo "<p>$$price/month</p>";
	?>
  </div>
</div>

<div class="card-2">
  <img src="imgs/example-real-estate/revelry.png" alt="Avatar" style="width:300px; height: 300px;">
  <div class="container">
  <?php
	$address = $listing1['address'];
    $apt = $listing1['apt_no'];
    echo "<p>$address $apt</p>";
	$city = $listing1['city'];
	$state = $listing1['state'];
	echo "<p>$city, $state</p>";
	$price = $listing1['price'];
	echo "<p>$$price/month</p>";
	?>
  </div>
</div>

<div class="card-3">
  <img src="imgs/example-real-estate/popeyes.png" alt="Avatar" style="width:300px; height: 300px;">
  <div class="container">
  <?php
	$address = $listing2['address'];
    $apt = $listing2['apt_no'];
    echo "<p>$address $apt</p>";
	$city = $listing2['city'];
	$state = $listing2['state'];
	echo "<p>$city, $state</p>";
	$price = $listing2['price'];
	echo "<p>$$price/month</p>";
	?>
  </div>
</div>

<div class="card-4">
  <img src="imgs/example-real-estate/coollane.png" alt="Avatar" style="width:300px; height: 300px;">
  <div class="container">
  <?php
	$address = $listing3['address'];
	$apt = $listing3['apt_no'];
    echo "<p>$address $apt</p>";
	$city = $listing3['city'];
	$state = $listing3['state'];
	echo "<p>$city, $state</p>";
	$price = $listing3['price'];
	echo "<p>$$price/month</p>";
	?>
  </div>
</div>
	
	
<p style = "position: absolute; bottom: -570px; padding: 10px; left: 35%; color: #adadad"> RoomMate.inc 2021 copyright trademark yada yada yada yada</p>
	
</body>

</html>