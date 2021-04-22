<html>

<head>

	<link rel="stylesheet" href="../Webpages/css/stylesheet.css" />
	<link rel="stylesheet" href="../Webpages/css/searchbar.css" />
	<link rel="stylesheet" href="../Webpages/css/previewcards.css" />
	<script type = "text/javascript" src="LoginFunctions.js"></script>

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
	$c = 1;
	
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
			
			if($c == 0)
			{
				echo "<div class = 'tableEntryPurple' style = 'height: 125px;'>" . "<h3>" . "<a href='../cssnhtml/listing.php?id=$id'>". $address . " </a> " . ", " . $city . ", " . $state . "<br><br> Price: $" . $row['price'] . "</h3></div>";
				$c = 1;
			}else{
				echo "<div class = 'tableEntryWhite' style = 'height: 125px;'>" . "<h3>" . "<a href='../cssnhtml/listing.php?id=$id'>". $address . " </a>" . ", " . $city . ", " . $state . "<br><br> Price: $" . $row['price'] . "</h3></div>";
				$c = 0;
			}
			
		}
	}

	?>
</body>

</html>