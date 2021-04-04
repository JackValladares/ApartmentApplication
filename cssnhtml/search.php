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
        $name = $_POST['name'];
        $smoke = $_POST['smoke'];
        $drink = $_POST['drink'];
        $party = $_POST['party'];

        $query = "SELECT user_name, smoker, drinker FROM Profile JOIN Account 
            ON (Profile.user_id = Account.user_id)";

        $conditions = array();

        if(!empty($name))
        {
            $conditions[] = "user_name LIKE '%".$name."%'";
        }
        if(!empty($smoke))
        {
            $conditions[] = "smoker = '$smoke'";
        }
        if(!empty($drink))
        {
            $conditions[] = "drinker = '$drink'";
        }

        if(count($conditions) > 0)
        {
            $sql .= " WHERE " . implode(' AND ', $conditions);
        }

        $result = $conn->$query;
        if(!$results)
        {
            echo "Query failed";
            die("fatal error on sql query");
        } 

        //attempt to print rows
        $rows = mysqli_num_rows($result);
        if ($rows > 0)
        {					
            // display search result count to user
            echo '<br /><div class="right"><b><u>'.$rows.'</u></b> results found</div>';

            echo '<table class="search">';

            // display all the search results to the user
            while ($row = mysqli_fetch_assoc($result))
            {    
                echo '<tr>
                    <td><h3><a href="'.$row['user_name'].'</a></h3></td>
                </tr>
                <tr>
                    <td>'.$row['smoker'].'</td>
                </tr>
                <tr>
                    <td><i>'.$row['drinker'].'</i></td>
                </tr>';
            }

            echo '</table>';
        }
        else
            echo 'No results found. Please search something else.';
    }

    function searchListings()
    {

    }
?>