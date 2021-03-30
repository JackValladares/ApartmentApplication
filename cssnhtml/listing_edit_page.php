<?php
/*
    session_start();
    if(!(isset($_SESSION['email'])))
  {
    die("Login Dummy!");
  }
  */
  require_once("../php/sqlFunctions.php");
  $conn = connectDB();

  $listing_id = 5;
  $my_array = get_listing_data($conn, $listing_id);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit Listing</title>
	</head>
	<body>
		<form class = "listing-edit-form" action = "listing-edit-post-submit.php" method="POST">
			<ul>
                <li>
                <?php
                    $address = $my_array['address'];
                    echo "<label for \"address\" id = \"addressLabel\">Address:</label>";
                    echo "<input type = \"text\" name = \"address\" id = \"address\" value = \"$address\" required>";
                    ?>
                </li>
                <li>
                <?php
                $city = $my_array['city'];
                $state = $my_array['state'];
                    echo "<label for \"city\" id = \"cityLabel\">City:</label>";
                    echo "<input type = \"text\" name = \"city\" id = \"city\" value = \"$city\"required>";
                    echo "<label for \"state\" id = \"stateLabel\">State:</label>";
                    echo "<input type = \"text\" name = \"state\" id = \"state\" maxlength = \"2\"  value = \"$state\"required>";
                ?>
                </li>
                <li>
                <?php
                $aptNum = $my_array['aptNum'];
                    echo "<label for \"apt_no\" id = \"apptNumLabel\">Apartment Number:</label>";
                    echo "<input type = \"number\" name = \"apt_no\" id = \"apptNum\" value = \"$aptNum\">";
                ?>
                </li>
                <li>
                <?php
                $roomSize = $my_array['roomSize'];
                $roomArray = explode("x", $roomSize);
                $num1 = trim($roomArray[0]);
                $num2 = trim($roomArray[1]);
                    echo "<label for \"roomSize\" id = \"roomSizeLabel\">Room Size:</label>";
                    echo "<input type = \"num\" name = \"roomSize1\" maxlength = \"2\" required size =\"2\" value = \"$num1\">";
                    echo "x";
                    echo "<input type = \"num\" name = \"roomSize2\" maxlength = \"2\" required size =\"2\" value = \"$num2\">";
                ?>
                </li>
                <li>
                <?php
                $bathType = $my_array['bathType'];
                    echo "<label for \"bathType\" id = \"bathroomTypeLabel\">Bathroom Type:</label>";
                    echo "<select name=\"bathType\" id=\"bathType\" required>";
                        if($bathType == "Private"){
                        echo "<option value=\"Shared\">Shared</option>";
                        echo "<option value=\"Private\" selected>Private</option>";
                        }
                        if($bathType == "Shared"){
                            echo "<option value=\"Shared\" selected>Shared</option>";
                            echo "<option value=\"Private\">Private</option>";
                            }
                            ?>
                        </select>
                </li>
                <li>
                    <label for "price" id = "priceLabel">Monthy Price(Excluding Fees)</label>
                    <?php
                    $price = $my_array['price'];
                    echo "<input type = \"number\" id = \"price\" name = \"price\" value = \"$price\"required>";
                    ?>
                </li>
                </li>
                <li>
                    <label for "smokingAllowed" id = "smokingAllowed">Smoking Allowed?</label>
                    <?php
                    $smoking = $my_array['smoking_allowed'];
                    echo "<select name=\"smokingAllowed\" id=\"smokingAllowedSelect\" required>";
                            if($smoking == "Yes"){
                                echo "<option value=\"Yes\" selected>Yes</option>";
                                echo "<option value=\"No\">No</option>";
                            }
                            else{
                                echo "<option value=\"Yes\">Yes</option>";
                                echo "<option value=\"No\" selected>No</option>";
                            }
                    
                        ?>
                        </select>
                </li>
                <li>
                <?php
                $pets = $my_array['pets_allowed'];
                    echo "<label for \"petsAllowed\" id = \"petsAllowed\">Pets Allowed?</label>";
                    echo "<select name=\"petsAllowed\" id=\"petsAllowedSelect\" required>";
                        if($pets == "Yes"){
                            echo "<option value=\"Yes\" selected>Yes</option>";
                            echo "<option value=\"No\">No</option>";
                        }
                        else{
                            echo "<option value=\"Yes\">Yes</option>";
                            echo "<option value=\"No\" selected>No</option>";
                        }
                        ?>
                        </select>
                </li>
                <li>
                <?php
                $misc_info = $my_array['misc_info'];
                    echo "<label for \"additionalInfo\" id = \"additionalInfoLabel\">Additional Info:</label> <br>";
                    echo "<textarea name = \"additionalInfo\" id = \"additonalInfo\" rows = 6>$misc_info</textarea>";
                    
                    $listing_id = $my_array['listing_id'];
                    echo "<input type = \"hidden\" name = \"listing_id\" value =\"$listing_id\">";
                    ?>
                </li>
                <li>
                    <input type = "submit" name = "createBTN" id = "createBTN" value = "Update Listing">
                </li>
			</ul>
		</form>
	</body>
</html>