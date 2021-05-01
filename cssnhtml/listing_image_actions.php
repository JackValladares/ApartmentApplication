<?php

session_start();
require_once "../php/sqlFunctions.php";

if(isset($_POST['action']))
{
    $conn = connectDB();
    $userid = $_SESSION['user_id'];
    $listings = getListingViaUserID($conn, $userid);

    //fetch listing IDs associated with user
    $idquery = "SELECT listing_id FROM listing WHERE user_id = '$userid'";
    $result = $conn->query($idquery);
    $listings = $result->fetch_array(MYSQLI_NUM);

    //populate page
    if($_POST['action'] == "fetch")
    {
        $query = "SELECT * FROM listingimages";
        $conditions = array();
        foreach($listings as $listing)
        {
            $conditions[] = "listing_id = '$listing'";
        }
        $query .= " WHERE " . implode(' OR ', $conditions);
        $query .=  " ORDER BY image_id DESC";
        $result = $conn->query($query);
        $output = '
        <table class="table table-bordered table-striped">  
            <tr>
                <th width="10%">ID</th>
                <th width="70%">Image</th>
                <th width="10%">Change</th>
                <th width="10%">Remove</th>
            </tr>
        ';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
            <tr>
            <td>'.$row["id"].'</td>
            <td>
                <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="60" width="75" class="img-thumbnail" />
            </td>
            <td><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["id"].'">Remove</button></td>
            </tr>
            ';
        }
        $output .= '</table>';
        echo $output;
    }

    //insert passed image
    if($_POST['action'] == "insert")
    {
        $file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $query = "INSERT INTO listingimages (listing_image, listing_id) VALUES ('$file', '$listingid')";
        $result = $conn->query($query);
        if(!$result)
        {
            echo "$conn->error";
        }
        else
        {
            echo "New image inserted!";
        }
    }

    //delete passed row
    if($_POST['action'] == "delete")
    {
        $query = "DELETE FROM listingimages WHERE id = '".$_POST['image_id']."'";
        $result = $conn->query($query);
        if(!$result)
        {
            echo "$conn->error";
        }
        else
        {
            echo "Image deleted!";
        }
    }
}
?>