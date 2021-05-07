<?php
    session_start();
    if(!(isset($_SESSION['email'])))
  {
    die("Login Dummy!");
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Listing Creation</title>
	</head>
	<body>
		<form class = "listing-creation-form" action = "listing-creation-post-submit.php" method="POST">
			<ul>
                <li>
                    <label for "address" id = "addressLabel">Address:</label>
                    <input type = "text" name = "address" id = "address" required>
                </li>
                <li>
                    <label for "city" id = "cityLabel">City:</label>
                    <input type = "text" name = "city" id = "city" required>
                    <label for "state" id = "stateLabel">State:</label>
                    <input type = "text" name = "state" id = "state" maxlength = "2" required>
                </li>
                <li>
                    <label for "apptNum" id = "apptNumLabel">Apartment Number:</label>

                    <input type = "number" name = "aptNum" id = "aptNum">

                </li>
                <li>
                    <label for "roomSize" id = "roomSizeLabel">Room Size:</label>
                    <input type = "num" name = "roomSize1" maxlength = "2" required size ="2">
                    X
                    <input type = "num" name = "roomSize2" maxlength = "2" required size = "2">
                </li>
                <li>
                    <label for "bathType" id = "bathroomTypeLabel">Bathroom Type:</label>
                    <select name="bathType" id="bathType" required>
                        <option value="Shared">Shared</option>
                        <option value="Private">Private</option>
                        </select>
                </li>
                <li>
                    <label for "price" id = "priceLabel">Monthy Price(Excluding Fees)</label>
                    <input type = "number" id = "price" name = "price" required>
                </li>
                </li>
                <li>
                    <label for "smokingAllowed" id = "smokingAllowed">Smoking Allowed?</label>
                    <select name="smokingAllowed" id="smokingAllowedSelect" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                </li>
                <li>
                    <label for "petsAllowed" id = "petsAllowed">Pets Allowed?</label>
                    <select name="petsAllowed" id="petsAllowedSelect" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                </li>
                <li>
                    <label for "additionalInfo" id = "additionalInfoLabel">Additional Info:</label> <br>
                    <textarea name = "additionalInfo" id = "additonalInfo" rows = 6></textarea>
                </li>
                <li>
                    <input type = "submit" name = "createBTN" id = "createBTN" value = "Create Listing">
                </li>
			</ul>
		</form>
	</body>
</html>