<?php session_start();?>
<html>

<head>

	<link rel="stylesheet" href="css/stylesheet.css" />
	<link rel="stylesheet" href="css/profile.css" />
	<script type = "text/javascript" src="../Webpages/javascript/LoginFunctions.js"></script>
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

	<?php include 'modules/header/header.php';
	$user = $_SESSION['email'];
	echo "Logged in as: $user"; ?>
	
	<div class="profile-img" style="background-image: url('imgs/example-profile/jack.jpeg');"></div>
	<div class="profile-info">
		<h1>Jack Valladares</h1>
		<a href = "mailto: jackvalladares@gmail.com" style = "font-size: 20px">jackvalladares@gmail.com</a>
		<div class = "locationform" style = "width: 500px; flex-direction: row;">
			<h3>College: Georgia College and State University </h3><button style = "height: 30px;"> Change School </button>
		</div>
		<br>
		<h2>My tags</h2>
		<p>[Loud] [6-Month] [Social] [Frequent Guests]
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

	<input type = "button" onclick = "parent.location = '../cssnhtml/listing_creation_info_page.php'" value = "Create Listing">
	<input type = "button" onclick = "parent.location = '../cssnhtml/edit_profile.php'" value = 'Edit Profile'>
	<input type = "button" onclick = "parent.location = '../cssnhtml/logout.php'" value = 'Log Out'>
	
	
	
	<p style = "position: absolute; bottom: -200px; padding: 10px; left: 35%; color: #adadad"> RoomMate.inc 2021 copyright trademark yada yada yada yada</p>
	

</body>

</html>