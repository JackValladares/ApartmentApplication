<html>
<head>
    <link rel="stylesheet" href="../Webpages/css/stylesheet.css" />
	<link rel="stylesheet" href="../Webpages/css/searchbar.css" />
	<link rel="stylesheet" href="../Webpages/css/previewcards.css" />
	<script type = "text/javascript" src="LoginFunctions.js"></script>
</head>
<body>



<?php
    require_once "../php/sqlFunctions.php";
include '../Webpages/modules/header/header.php';


    if($_GET['type'] == 'user')
    {
        userListing();
    }else{
        apartmentListing();
    }

    function apartmentListing()
    {


        $listingID = $_GET['id'];
        $conn = connectDB();

        $userID = $_GET['id'];

        $user = get_profile_data(connectDB(), $userID);
        $seller = $user['fName'] . " " . $user['lName'];



        $arr = get_listing_data($conn, $listingID);


        echo "<div class = 'tableEntryPurple' style = 'height: 500px; width: 400px; margin-left: 50px;'>" .
            "<h1 style = 'margin-left: 0px; text-align: center; margin-right: 35px; margin-bottom: 0px;'>" . $arr['address'] .  " (" . $arr['aptNum'] . ")</h1>" .

            "<div style = 'display: flex; align-items: center; margin-left: 30px; margin-bottom: 0px'><h3 style = 'margin-bottom: 0px;'>" . $arr['city']. ", ". $arr['state']. "</h3></div>" .



            "<img src='../Webpages/imgs/example-real-estate/popeyes.png'style = 'width: 150px; height: 150px; border-type: solid; margin-left: 35px; margin-right: 35px; margin-top: 10px; margin-bottom: 10px;' alt = 'Image unable to be converted from database'/>" .


            "<div style = 'display: flex; align-items: center; margin-left: 30px;'><h3 style = 'margin: 0px;'>Price: $" . "</h3>&nbsp&nbsp<h4 style = 'margin: 0px;'>" . $arr['price'] . "</h4></div>" .

            "<div style = 'display: flex; align-items: center; margin-left: 30px; margin-top: 10px;'><h3 style = 'margin: 0px;'>Smoking Allowed: " . "</h3>&nbsp&nbsp<h4 style = 'margin: 0px;'>" . $arr['smoking_allowed'] . "</h4><h3 style = 'margin: 0px;'>" .

            "<h3 style = 'margin: 0px;'>&nbsp&nbsp&nbspPets:  </h3><h4 style = 'margin: 0px;'>&nbsp" . $arr['pets_allowed'] . "</h4>" .

            "</div>" .
            "<div style = 'display: flex; align-items: center; margin-left: 30px; margin-top: 10px;'><b>Room Size:&nbsp" . $arr['roomSize'] . "</b></div>" .

            "<div>" .

            "<div class = 'tableEntryGrey' style = ' top: 125px; margin-left: 50px; position: relative; width = 500px; '>" .
            "<a href = '../Webpages/Homepage.php'><h2>Contact " . $seller . " to rent!</h2></a>" .
            "</div>";


    }

/**
 * @throws Exception
 */
function userListing()
{
    echo '
    <script type="text/javascript">
        function codeAddress() {   
            logo = document.getElementById("logo");
            logo.src = "../Webpages/imgs/ui/BlueLogo.png";

        }
        codeAddress();
        </script>
    </script>
    ';
    require_once "../php/sqlFunctions.php";
    $userID = $_GET['id'];

    $user = get_profile_data(connectDB(), $userID);

    $name = $user['fName'] . " " . $user['lName'];


    $bday = $user['dob'];
    $temp = $user['temp_pref'];
    $bedtime = $user['bedtime'];
    $cleaning = $user['cleaning'];
    $smoker = $user['smoker'];
    $drinker = $user['drinker'];
    $paragraph = $user['bio'];

    $profilePic = get_profile_pic(connectDB(), $userID);

    echo "<div class = 'tableEntryBlue' style = 'height: 500px; width: 400px; margin-left: 50px;'>" .
    "<h1 style = 'margin-left: 35px; margin-right: 35px;'>" . $name .  "</h1>" .

        "<img src= '../Webpages/imgs/example-profile/jack.jpeg' style = 'width: 150px; height: 150px; border-type: solid; margin-left: 35px; margin-right: 35px;' alt = 'Image unable to be converted from database'/>" .
    "<div style = 'display: flex; align-items: center; margin-left: 30px;'><h3 style = 'margin-bottom: 0px;'>Birthday: " . "</h3>&nbsp&nbsp<h4 style = 'margin-bottom: 0px;'>" . $bday . "</h4></div>" .
    "<div style = 'display: flex; align-items: center; margin-left: 30px;'><h3 style = 'margin: 0px;'>Temp Preference: " . "</h3>&nbsp&nbsp<h4 style = 'margin: 0px;'>" . $temp . " degrees</h4></div>" .
    "<div style = 'display: flex; align-items: center; margin-left: 30px;'><h3 style = 'margin: 0px;'>Smoker: " . "</h3>&nbsp&nbsp<h4 style = 'margin: 0px;'>" . $smoker . "</h4><h3 style = 'margin: 0px;'>" .
    "<h3 style = 'margin: 0px;'>&nbsp&nbsp&nbspDrinker:  </h3><h4 style = 'margin: 0px;'>&nbsp" . $drinker . "</h4>" .
    "</div>" .
    "<div style = 'display: flex; align-items: center; margin-left: 30px; margin-top: 25px;'><b>Bio:</b>&nbsp" . $paragraph . "</div>" .
    "<div>" .

    "<div class = 'tableEntryGrey' style = ' top: 125px; margin-left: 50px; position: relative;'>" .
    "<a href = '../Webpages/Homepage.php'><h2>Contact " . $name . " Now!</h2></a>" .
    "</div>";


}

?>

</body>
</html>