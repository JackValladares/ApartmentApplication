<?php session_start();
    if(!(isset($_SESSION['email'])))
    {
      die("Please Login First!");
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit</title>
	</head>
	<body>
		<form class = "profile-questionnaire-form" action = "profile_edit.php" method="POST">
			<ul>
            <?php

            require_once("../php/sqlFunctions.php");
            $conn = connectDB();
            $user_id = $_SESSION['user_id'];
            $results = get_profile_data($conn, $user_id);

                
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
                _END;
                        $dob = $results['dob'];
                    echo "<input type = \"date\" name = \"date-of-birth\" required value = $dob>";
                echo <<< _END
                    </li>

                <li>
                    <label for "prefTemp" name = "prefTemp">Prefered Temp</label>
_END;
                    $prefTemp = $results['temp_pref'];
                    echo "<input type = \"number\" name = \"prefTempVal\" min = 50 max = 85 required value = $prefTemp>";
                    
                    echo <<< _END
                    </li>

                <li>
                    <label for "bedTime" name = "bedTime">Typical Bed Time</label>
_END;
                    $bedtime = $results['bedtime'];
                    echo "<input type = \"time\" name = \"bedTimeVal\" required value = $bedtime>";

                    echo <<<_END
                </li>

                <li>
                    <label for "cleaning">How often do you clean?</label>
                    <select name="cleanTime" id="cleanTime" required>
_END;


                        switch($results['cleaning'])
                        {
                            case($results['cleaning'] == "Daily"):{
                                echo "<option value=\"Daily\" selected>Daily</option> <option value=\"Weekly\">Weekly</option>
                                <option value=\"Bi-weekly\">Bi-weekly</option>
                                <option value=\"Monthy\">Monthy</option>";
                                break;
                            }
                            case($results['cleaning'] == "Weekly"):{
                                echo "<option value=\"Daily\">Daily</option> <option value=\"Weekly\" selected>Weekly</option>
                                <option value=\"Bi-weekly\">Bi-weekly</option>
                                <option value=\"Monthy\">Monthy</option>";
                                break;
                            }
                            case($results['cleaning'] == "Bi-weekly"):{
                                echo "<option value=\"Daily\">Daily</option> <option value=\"Weekly\">Weekly</option>
                                <option value=\"Bi-weekly\" selected>Bi-weekly</option>
                                <option value=\"Monthy\">Monthy</option>";
                                break;
                            }
                            case($results['cleaning'] == "Monthy"):{
                                echo "<option value=\"Daily\">Daily</option> <option value=\"Weekly\">Weekly</option>
                                <option value=\"Bi-weekly\">Bi-weekly</option>
                                <option value=\"Monthy\" selected>Monthy</option>";
                                break;
                            }

                            
                        }
                        echo "</select>";
                        echo <<< _END
                </li>

                <li>
                    <label for "Drinker">Do you Drink?</label>
                    <select name="drinker" id="drinkerVal" required>
_END;
                    if($results['drinker'] == "Yes"){
                        echo "<option value=\"Yes\" selected>Yes</option> <option value=\"No\">No</option>";
                    } else{
                        echo "<option value=\"Yes\">Yes</option> <option value=\"No\" selected>No</option>";
                    }
                    echo <<< _END
                        </select>
                </li>

                <li>
                    <label for "Smoker">Do you Smoke?</label>
                    <select name="smoker" id="smokerVal" required>
_END;
                    if($results['smoker'] == "Yes"){
                        echo "<option value=\"Yes\" selected>Yes</option> <option value=\"No\">No</option>";
                    } else{
                        echo "<option value=\"Yes\">Yes</option> <option value=\"No\" selected>No</option>";
                    }
                    echo <<< _END
                        </select>
                </li>

                <li>
                    <label for "peopleOver">Do you have people over often?</label>
                    <select name="peopleOver" id="peopleOverVal" required>
_END;
                    if($results['visitors'] == "Yes"){
                        echo "<option value=\"Yes\" selected>Yes</option> <option value=\"No\">No</option>";
                    } else{
                        echo "<option value=\"Yes\">Yes</option> <option value=\"No\" selected>No</option>";
                    }
                    echo <<< _END
                        </select>
                </li>

                <li>
                    <label for "party">Do you Partly Often?</label>
                    <select name="party" id="partyVal" required>
_END;
                    if($results['party'] == "Yes"){
                        echo "<option value=\"Yes\" selected>Yes</option> <option value=\"No\">No</option>";
                    } else{
                        echo "<option value=\"Yes\">Yes</option> <option value=\"No\" selected>No</option>";
                    }
                    echo <<< _END
                        </select>
                </li>

                <li>
                    <label for "bio" name = "bio">Enter a bio:</label> <br>
_END;
                    $bio = $results['bio'];
                    echo "<textarea name = \"bioVal\" rows = 6>$bio</textarea>";
                    echo <<<_END
                </li>

                <li>
                    <input type="submit" id="submit-button" value="Update Account">
                </li>
                _END;
                ?>
			</ul>
		</form>
	</body>
</html>