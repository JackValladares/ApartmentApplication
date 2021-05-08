<?php session_start();?>
<html>

<head>

	<link rel="stylesheet" href="css/stylesheet.css" />
	<link rel="stylesheet" href="css/profile.css" />
	<script type = "text/javascript" src="javascript/LoginFunctions.js"></script>
	<style type="text/css">
			table {
				border-collapse: collapse;
				width: 100%;
			}

			td, th{
				border: 1px solid black;
				text-align: left;
				padding: 8px; 
			}
		</style>

</head>


<body style = "background-color: #fafafa">

	<?php include 'modules/header/header.php'; ?>
	<div class="profile-img" style="background-image: url('../cssnhtml/get_profile_pic.php');"></div>
    <?php
	require_once("../php/sqlFunctions.php");
	$user = $_SESSION['email'];
	$conn = connectDB();
	$user_id = get_user_id($conn, $user);
	$array = get_profile_data($conn, $user_id); ?>
	<div class="profile-info">
	<?php
		$fName = $array['fName'];
		$lName = $array['lName'];
		echo "<h1>$fName $lName</h1>";
		
		echo "<a href = \"mailto: $user\" style = \"font-size: 20px\">$user</a>";
		?>
		<br>
		<h2>My tags</h2>
		<?php
		echo "<p>";
		$smoking = $array['smoker'];
		$drinker = $array['drinker'];
		$party = $array['party'];
		$peopleOver = $array['visitors'];
		if($smoking == "True") {echo "[Smokes]";} else {echo "[Doesn't Smoke]";}
		if($drinker == "True") {echo " [Drinks]";} else {echo " [Doesn't Drink]";}
		if($party == "True") {echo " [Parties Often]";} else {echo " [Doesn't party often]";}
		if($peopleOver == "True") {echo " [Likes People Over]";} else {echo " [Doesn't like people over]";}
		echo "</p>";
		
		echo "<h2>About Me</h2>";
		$bio = $array['bio'];
		echo "<p>$bio</p>"

		?>
		<br><br>
		<h2>My Listings</h2>

		<?php 
		
		require_once("../php/sqlFunctions.php");
		$conn = connectDB();
		$email = $_SESSION['email'];
		$user_id = get_user_id($conn, $email);
		$myarray = getListingViaUserID($conn, $user_id);
		$array = $myarray[1];


		echo "<table>";
			echo "<tr>";
				echo "<th>Address</th>";
				echo "<th>Apt No.</th>";
				echo "<th>City</th>";
				echo "<th>State</th>";
				echo "<th>Edit</th>";
				echo "<th>Delete</th>";
			echo "</tr>";
			
		while($row = mysqli_fetch_assoc($array))
        {
			$address = $row['address'];
			$aptNo = $row['apt_no'];
			$city = $row['city'];
			$state = $row['state'];
			$listingID = $row['listing_id'];
			$editBTN = "<input type = \"button\" onclick = \"parent.location = '../cssnhtml/listing_edit_page.php?listing_id='+$listingID\" value = \"Edit Listing\">";
            $deleteBTN = "<input type = \"button\" onclick = \"parent.location = '../cssnhtml/deleteListing.php?listing_id='+$listingID\" value = \"Delete Listing\">";
			echo "<td>$address</td>";
			echo "<td>$aptNo</td>";
			echo "<td>$city</td>";
			echo "<td>$state</td>";
			echo "<td>$editBTN</td>";
			echo "<td>$deleteBTN</td>";
			echo "</tr>";
        }
		echo "</table>";

		?>
		

	</div>

	<br>
	<input type = "button" onclick = "parent.location = '../cssnhtml/listing_creation_info_page.php'" value = "Create Listing">
	<input type = "button" onclick = "parent.location = '../cssnhtml/edit_profile.php?user_id=$user_id'" value = 'Edit Profile'>
	<br> <br>
	<input type = "button" onclick = "parent.location = '../cssnhtml/logout.php'" value = 'Log Out'>
	<input type = "button" onclick = "parent.location = '../cssnhtml/deleteAccount.php'" value = 'Delete my Account'>
	
	
	
	<p style = "position: absolute; bottom: -200px; padding: 10px; left: 35%; color: #adadad"> RoomMate.inc 2021 copyright trademark yada yada yada yada</p>
	

</body>

</html>
