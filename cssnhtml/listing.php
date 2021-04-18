<html>
<head>
    <link rel="stylesheet" href="../Webpages/css/stylesheet.css" />
	<link rel="stylesheet" href="../Webpages/css/searchbar.css" />
	<link rel="stylesheet" href="../Webpages/css/previewcards.css" />
	<script type = "text/javascript" src="LoginFunctions.js"></script>
</head>
<body>
<?php
    include 'modules/header/header.php';
    require_once "../php/sqlFunctions.php";
    $listingID = $_GET['id'];
    $conn = connectDB();

    $arr = get_listing_data($conn, $listingID);

    
?>

</body>
</html>