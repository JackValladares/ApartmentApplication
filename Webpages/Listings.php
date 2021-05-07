<html>

<head>

	<link rel="stylesheet" href="../Webpages/css/stylesheet.css" />
	<link rel="stylesheet" href="../Webpages/css/tinysearchbar.css" />
	<link rel="stylesheet" href="../Webpages/css/previewcards.css" />
	<script type = "text/javascript" src="../Webpages/javascript/PortableApartmentSearch.js"></script>

</head>


<body style = "background-color: #fafafa">

	<?php include 'modules/header/header.php'; ?>


	<?php 
	
	
	require_once "../php/sqlFunctions.php";
	require_once "../cssnhtml/search.php";
    $conn = connectDB();
    $page = 0;



    $searchType = $_GET['type'];
	if($searchType == "listings")
    {
        $query = searchListings();
        $results = $conn->query($query);

        apartmentSearch($results);

    }else{


        $query = searchProfiles();
        $results = $conn->query($query);
        profileSearch($results);


    }


    // page number - to be implemented later

    //echo $query;
    $results = $conn->query($query);





	function apartmentSearch($results)
    {
        $c = 0;
        $listingrow = 0;


        //Apartment Search Results
        if($results->num_rows > 0)
        {
            while($row = $results->fetch_assoc()){



                drawApartmentDiv($c, $row, $listingrow);

                if($c == 0)
                {
                    $c = 1;
                }else{
                    $c = 0;
                    $listingrow++;
                }
            }
        }
    }
    function drawApartmentDiv($c, $row, $listingrow)
    {
        $rowheight = 350;
        $rowwidth = 35;
        $address = $row['address'];
        $apt = $row['apt_no'];
        $city = $row['city'];
        $state = $row['state'];
        $price = $row['price'];
        $id = $row['listing_id'];
        $pets = $row['pets_allowed'];
        $smoking = $row['smoking_allowed'];
        $roomsize = $row['room_size'];
        $bath = $row['bath_type'];


                if($c == 0)
                {

                    echo
                        "<a href='../cssnhtml/listing.php?id=$id&type=listing'>".
                        "<div class = 'tableEntryPurple' style = 'height: $rowheight; box-shadow: 5px 5px 3px #888888; width: $rowwidth%; position: absolute; top: calc(190px + $listingrow*375px); left: 26%;'>" .
                        "<h3>" .  $address . " [" . $apt . "] " .  "</a>" . "<br>Price: $" . $row['price'] .
                        "<div style = 'position: absolute; left: 53%; top: 85px;' >"  .  $city . ", " . $state . "<br>Room Size: " . $roomsize .
                        "<br>Pets Allowed: " . $pets . "<br>Smoking Allowed: " . $smoking . "<br>Bathroom Type: " . $bath ."</div>" .
                        "<img src = '../Webpages/imgs/example-real-estate/revelry.png' style = 'height: 270px; width: 50%; position: absolute; left: 0px; bottom: 0px' /> " .
                        "</h3></div>";
                }else{
                    echo
                        "<a href='../cssnhtml/listing.php?id=$id&type=listing'>".
                        "<div class = 'tableEntryWhite". $c . "' style = 'z-index: -1; margin-bottom: 25px; box-shadow: 5px 5px 3px #888888; height: $rowheight; width: $rowwidth%; position: absolute; top: calc(190px + $listingrow*375px); left: 62%;'>" .
                        "<h3>" .  $address . " [" . $apt . "] " .  "</a>" . "<br>Price: $" . $row['price'] .
                        "<div style = 'position: absolute; left: 53%; top: 85px;' >"  .  $city . ", " . $state . "<br>Room Size: " . $roomsize .
                        "<br>Pets Allowed: " . $pets . "<br>Smoking Allowed: " . $smoking . "<br>Bathroom Type: " . $bath ."</div>" .
                        "<img src = '../Webpages/imgs/example-real-estate/revelry.png' style = 'height: 270px; width: 50%; position: absolute; left: 0px; bottom: 0px' /> " .
                        "</h3></div>";
                }



    }

    function profileSearch($results)
    {
        $c = 0;
        $listingrow = 0;


        //Apartment Search Results
        if($results->num_rows > 0)
        {
            while($row = $results->fetch_assoc()){



                drawProfileDiv($c, $row, $listingrow);

                if($c == 0)
                {
                    $c = 1;
                }else{
                    $c = 0;
                    $listingrow++;
                }
            }
        }
    }

    /**
     * @throws Exception
     */
    function drawProfileDiv($c, $row, $listingrow)
    {
        $rowheight = 350;
        $rowwidth = 35;

        $id = $row['profile_id'];

        $d1 = new DateTime($row['dob']);

        $now = date('m-d-Y H:i:s');
        $d2 = DateTime::createFromFormat('m-d-Y H:i:s', $now);
        $age = $d2->diff($d1);

        $name = $row['user_name'];

        $temp = $row['temp_preference'];
        $smoker = $row['smoker'];
        $drinker= $row['drinker'];
        $paragraph = $row['bio_paragraph'];
        $cleaning = $row['cleaning_sched'];
        $bedtime = $row['bedtime'];



        if($c == 0)
        {

            echo
                "<a href='../cssnhtml/listing.php?id=". $id ."&type=user'>".
                "<div class = 'tableEntryBlue' style = 'height: $rowheight; box-shadow: 5px 5px 3px #888888; width: $rowwidth%; position: absolute; top: calc(190px + $listingrow*375px); left: 26%;'>" .
                "<h3>" .  $name . " [" . $age->y . " years old] " .  "</a>" .
                "<div style = 'position: absolute; left: 53%; top: 85px;' > Smokes:"  .  $smoker . "<br>Drinks: " . $drinker .
                "<br>BedTime: " . $bedtime . "<br>Cleaning Schedule: " . $cleaning . "<h5>" . $paragraph ."</h5></div>" .
                "<img src = '../Webpages/imgs/example-profile/jack.jpeg' style = 'height: 270px; width: 50%; position: absolute; left: 0px; bottom: 0px' /> " .
                "</div></h3>";
        }else{
            echo
                "<a href='../cssnhtml/listing.php?id=". $id ."&type=user'>".
                "<div class = 'tableEntryWhite". $c . "' style = 'z-index: -1; margin-bottom: 25px; box-shadow: 5px 5px 3px #888888; height: $rowheight; width: $rowwidth%; position: absolute; top: calc(190px + $listingrow*375px); left: 62%;'>" .
                "<h3>" .  $name . " [" . $age->y . " years old] " .  "</a>" .
                "<div style = 'position: absolute; left: 53%; top: 85px;' > Smokes:"  .  $smoker . "<br>Drinks: " . $drinker .
                "<br>BedTime: " . $bedtime . "<br>Cleaning Schedule: " . $cleaning . "<h5>" . $paragraph ."</h5></div>" .
                "<img src = '../Webpages/imgs/example-profile/stockguy.jpg' style = 'height: 270px; width: 50%; position: absolute; left: 0px; bottom: 0px' /> " .
                "</div></h3>";
        }



    }






	?>
	
	
	
	<div class="tinysearchbarwrap" style = "top: 325px; left: 220px; width: 400px;">
		
		<button id='tinyexpandButton' style = "height: 30px;" >More Search Preferences</button>
        <button id='tinytoggleSearch' style = "height: 30px;" >Search for Users</button>
		
		<div id = "homesearchbar" action="../Webpages/ApartmentListings.php" >
			<input form = "homesearch" type="text" style="float:left; display:inline; width: 100%;" class="searchTerm" placeholder="Milledgeville, Georgia" name="query" id="searchBarT"/>
			
			<button form = "homesearch" type="submit" style="float:right; display:inline; position:absolute; width: 15%; height: 56px;
			border: 1px solid #b902d1; background: #b902d1; text-align: center; color: #fff; border-radius: 0 5px 5px 0; cursor: pointer; font-size: 20px;" 
			class="tinysearchButton" id = "tinysearchButton"><i class="fa fa-search"></i></button>
			
		</div>
		
		<div id="tinySearch" style="visibility: hidden; display: inline-block; line-height: 33%;">
		<br><br><br>
			<form id = "homesearch" method = "get" action="Listings.php">

				<!--<br><p>Bathrooms
				<input type="number" min="1" max="5" value="1" style="float:left; display:inline; width: 50%" name="bath" />-->

                <div class = "tinyOrganizer">
                    <select name = "field1" id = "field1T"  style="float:left; display:inline; width: 50%; margin-right: 10px; margin-top: 10px;"  >

                        <option Value = "Don't Care">Don't Care</option>
                        <option value = "Yes">Yes</option>
                        <option value = "No">No</option>

                    </select>
                    <p id = "label1T" style = "position: relative;" >Pets</p>
                </div>
                <br>

                <div class = "tinyOrganizer">
				    <select name = "field2" id = "field2T"  style="float:left; display:inline; width: 50%; margin-right: 10px; margin-top: 10px;" >

					    <option Value = "Don't Care">Don't Care</option>
					    <option value = "Yes">Yes</option>
					    <option value = "No">No</option>

				    </select>
                    <p id = "label2T" style = "position: relative;">Smoke</p>

                </div>

                <div class = "tinyOrganizer">
                    <input type="number" min="0" max="1000000" style="float:left; display:inline; width: 50%; margin-right: 10px; margin-top: 10px; margin-bottom: 10px;" name="field3" id = "field3T"/>
                    <p id = "label3T" style = "position: relative;">Max Price</p>
                </div>
                <input type="hidden" name = "type" name = "field4" id = "field4T" value = "listings" />
			
			</form>
		</div>
	</div>
	
</body>

</html>