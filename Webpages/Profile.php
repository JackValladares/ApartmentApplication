<html>

<head>

	<link rel="stylesheet" href="css/stylesheet.css" />
	<link rel="stylesheet" href="css/profile.css" />
	<script type = "text/javascript" src="LoginFunctions.js"></script>

</head>


<body style = "background-color: #fafafa">

	<?php include 'modules/header/header.php'; ?>
	
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
		Insert listings here
		

	</div>

	<input type = "button" onclick = "parent.location = '../cssnhtml/listing_creation_info_page.php'" value = "Create Listing">
	<input type = "button" onclick = "parent.location = '../cssnhtml/edit_profile.php'" value = 'Edit Profile'>
	<input type = "button" onclick = "parent.location = '../cssnhtml/logout.php'" value = 'Log Out'>
	<input type = "button" onclick = "parent.location = '../cssnhtml/deleteAccount.php'" value = 'Delete Account'>

	
	
	
	<p style = "position: absolute; bottom: -200px; padding: 10px; left: 35%; color: #adadad"> RoomMate.inc 2021 copyright trademark yada yada yada yada</p>
	

</body>

</html>