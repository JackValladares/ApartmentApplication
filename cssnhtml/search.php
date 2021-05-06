<?php
    require_once "../php/sqlFunctions.php";

    $conn = connectDB();
    if(!$conn)
    {
        echo "database connection failure";
        die("failed on DB connection");
    }

    function searchProfiles()
    {

        $drinkQuery = $_GET['field1'];
        $smokeQuery = $_GET['field2'];

        $query = "SELECT * FROM Profile JOIN Account
            ON (Profile.user_id = Account.user_id)";

        $conditions = array();

        if(isset($_GET['query']))
        {
            $text = $_GET['query'];
            $conditions[] = "(email LIKE '%$text%' OR user_name LIKE '%$text%')";
        }

        if(isset($drinkQuery) && $drinkQuery != "Don't Care")
        {
            $drinker = $drinkQuery;
            $conditions[] = "drinker = '$drinker'";
        }

        if(isset($smokeQuery) && $smokeQuery != "Don't Care")
        {
            $smoker = $smokeQuery;
            $conditions[] = "smoker = '$smoker'";
        }

        if(count($conditions) > 0)
        {
            $query .= " WHERE " . implode(' AND ', $conditions);
        }


        return $query;

    }

    function searchListings()
    {
		$petsQuery = $_GET['field1'];
		$smokeQuery = $_GET['field2'];
        $priceQuery = $_GET['field3'];
		$conditions = array();
		
		if(isset($_GET['query']))
		{
			$text = $_GET['query'];
			$conditions[] = "(address LIKE '%$text%' OR city LIKE '%$text%')";
		}
		/*if(isset($_GET['bath']))
		{
			$bath = $_GET['bath'];
			$conditions[] = "bath_type >= '$bath'";
			
		}*/
		
		if(isset($priceQuery) && (int)$priceQuery > 0)
		{
			$price = (int)$priceQuery;
			$conditions[] = "price <= $price";
		}
		
		if(isset($_GET['roomsize']))
		{
			$roomsize = $_GET['roomsize'];
			$conditions[] = "room_size <= '$roomsize'";
		}
		
        if(isset($petsQuery) && $petsQuery != "Don't Care")
        {
			$pets = $petsQuery;
			$conditions[] = "pets_allowed = '$pets'";
        }
		
        if(isset($smokeQuery) && $smokeQuery != "Don't Care")
        {
			$smoke = $smokeQuery;
			$conditions[] = "smoking_allowed = '$smoke'";
        }
		
        $query = "SELECT * FROM Listing";

        
        if(count($conditions) > 0)
        {
            $query .= " WHERE " . implode(' AND ', $conditions);
        }

        $query;

		return $query;
    }
?>