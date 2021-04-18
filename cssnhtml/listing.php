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

    echo "<div class=\"listing-img\" style=\"background-image: url('../Webpages/imgs/example-real-estate/popeyes.png');\"></div>";
    echo "<div class=\"listing-info\">";
        echo "<h1>".$arr['address']."</h1>";
        echo "<h2>Info</h2";
        echo "<p>".$arr['city'].", ".$arr['state']."</p>";
        echo "<p>Price starting at $".$arr['price']."</p>";
    echo "</div>";
?>

</body>
</html>