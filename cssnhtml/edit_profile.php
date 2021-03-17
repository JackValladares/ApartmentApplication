<?php session_start();?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit</title>
	</head>
	<body>
		<form class = "profile-questionnaire-form" action = "profile_edit.php" method="POST">
			<ul>
            <?php
            if(isset($_SESSION['f_name'])){
                $f_name = $_SESSION['f_name'];
                $l_name = $_SESSION['l_name'];
                echo <<< _END
                <li>
                    <label for "full-name">Full Name</label> <br>
                    <input type = "text" name = "first-name" value = "$f_name">
                    <input type = "text" name = "last-name" value = "$l_name">
                </li>
                _END;
            }
            else 
            {
                require_once("../php/sqlFunctions.php");
                $conn = connectDB();
                $user_id = $_GET['user_id'];
                $results = get_profile_data($conn, $user_id);

echo <<< _END
                <li>
                    <label for "full-name">Full Name</label> <br>
                    <input type = "text" name = "first-name" value = "First">
                    <input type = "text" name = "last-name" value = "Last">
                </li>
_END;
            }
                
echo <<< _END

                            <li>
                    <label for "gender">Gender</label>
                    <select name="gender" id="gender" required>
                    _END;
                        if($results['gender'] == "Male"){
                            echo "<option value=\"Male\" selected>Male</option>";
                        }
                        else
                        echo "<option value=\"Male\">Male</option>";

                        if($results['gender'] == "Female"){
                            echo "<option value=\"Female\" selected>Female</option>";
                        }
                        else
                        echo "<option value=\"Female\">Female</option>";

                        if($results['gender'] == "Unspecified"){
                            echo "<option value=\"Unspecified\" selected>Unspecified</option>";
                        }
                        else
                        echo "<option value=\"Unspecified\">Unspecified</option>";

                        if($results['gender'] == "Other"){
                            echo "<option value=\"Other\" selected>Other</option>";
                        }
                        else
                        echo "<option value=\"Other\">Other</option>";
                        echo "</select>";
                echo "</li>";

                echo <<< _END

                <li>
                    <label for "dob" name = "dob">Date of Birth</label>
                    <input type = "date" name = "date-of-birth" required>
                </li>

                <li>
                    <label for "prefTemp" name = "prefTemp">Prefered Temp</label>
                    <input type = "number" name = "prefTempVal" min = 50 max = 85 required>
                </li>

                <li>
                    <label for "bedTime" name = "bedTime">Typical Bed Time</label>
                    <input type = "time" name = "bedTimeVal" required>
                </li>

                <li>
                    <label for "cleaning">How often do you clean?</label>
                    <select name="cleanTime" id="cleanTime" required>
                        <option value="Daily">Daily</option>
                        <option value="Weekly">Weekly</option>
                        <option value="Bi-weekly">Bi-weekly</option>
                        <option value="Monthy">Monthy</option>
                        </select>
                </li>

                <li>
                    <label for "Drinker">Do you Drink?</label>
                    <select name="drinker" id="drinkerVal" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                </li>

                <li>
                    <label for "Smoker">Do you Smoke?</label>
                    <select name="smoker" id="smokerVal" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                </li>

                <li>
                    <label for "peopleOver">Do you have people over often?</label>
                    <select name="peopleOver" id="peopleOverVal" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                </li>

                <li>
                    <label for "party">Do you Partly Often?</label>
                    <select name="party" id="partyVal" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                </li>

                <li>
                    <label for "bio" name = "bio">Enter a bio:</label> <br>
                    <textarea name = "bioVal" rows = 6></textarea>
                </li>

                <li>
                    <input type="submit" id="submit-button" value="Create Account">
                </li>
                _END;
                ?>
			</ul>
		</form>
	</body>
</html>