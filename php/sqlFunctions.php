<!--TODO:
    -Figure out how $results data is stored and if it can be compared to string password.
    !-->

<?php
    //function to connect to a database and return a connection
	function connectDB()
    {
		$hn = "localhost";
        $un = "root";
        $pw = "";
		$db= "ApartmentApplication";

		$conn = new mysqli($hn,$un,$pw,$db);
		if($conn->connect_error) die("fatal error on connecting to db");

		return $conn;
	}

    function insertAccount($connection, $email, $user_name, $passwrd)
    {
        //check that email is new to database
        $emailquery = "SELECT * FROM account WHERE email='$email'";
        $result = $connection->query($emailquery);
        if(mysqli_num_rows($result) > 0)
        {
            echo "Email already exists in database";
            $_SESSION['register_success'] = false;
            $_SESSION['registration_error'] = "Something went wrong with registration. Make sure you don't already have an account associated with this email.";
            header("location:accountCreation.php");
            die("email already exists");
            //TODO: Figure out how to send the error message back to the webpage
        }

        $query = "INSERT INTO account (email, user_name, passwd)
        VALUES ('$email', '$user_name', '$passwrd');";
        $results = $connection->query($query);
        if(!$results)
        {
            echo "Query failed";
            die("fatal error on sql query");
        } 
    }

    function updateAccount($conn, $password, $email)
    {
        $emailquery = "SELECT * FROM account WHERE email='$email'";
        $result = $conn->query($emailquery);
        if(mysqli_num_rows($result) != 1)
        {
            header("Location: password_reset_page.php?EE=1&email=$email");
            //send back to password reset page with msg that email doesnt exist in system
        }
        else
        {
            $resetQuery = "UPDATE account set passwd = '$password' where email = '$email'";
            $conn->query($resetQuery);
            unset($_SESSION['password_reset_key']);
            reset_key($conn,$email);
            header("Location: LoginPage.php?msg=passResetWorked");
        }
    }


    //gets the reset code from an email provided on previous page and stores the code in the session
    function getResetCode($conn, $email)
    {
        $emailquery = "SELECT passwd_reset_key FROM account WHERE email='$email'";
        $result = $conn->query($emailquery);
        if(mysqli_num_rows($result) != 1)
        {
            //send back to the page harris is making and say that this query failed because this email doesn't exist
            header("Location: forgot_password_request.php?RCE=1&email=$email");
        }
        else{
            $_SESSION['password_reset_key'] = $result;
            header("Location: password_reset_page.php");
        }
        
    }

    function generate_insert_key($conn, $email)
    {
        $key = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);
        $keyQuery = "UPDATE account set passwd_reset_key = '$key' where email = '$email'";
        $conn->query($keyQuery);
    }

    function reset_key($conn, $email)
    {
        $keyQuery = "UPDATE account set passwd_reset_key = NULL where email = '$email'";
        $conn->query($keyQuery);
    }

    function insert_profile($conn, $query)
    {
        $result = $conn->query($query);
        
        if(!$result)
        {
            header("Location: somethingwentwrong.php");
        }
    }

    function insert_listing($conn, $query)
    {
        $result = $conn->query($query);
        
        if(!$result)
        {
            //echo mysqli_error($conn);
            header("Location: somethingwentwrongListingCreation.php");
        }
    }

    function get_user_id($conn, $email)
    {
        $query = "SELECT user_id FROM account WHERE email='$email'";
        $result = $conn -> query($query);
        $result = $result->fetch_assoc();
        $result = $result['user_id'];
        return $result; 
    }

    function userLogin($conn, $email, $password){
        $query = "SELECT * FROM Account WHERE email = \"$email\" AND passwd = \"$password\";";
        $results = $conn->query($query);
        if(!$results){
            echo "user Login failed";
            die("fatal error on sql query");
          } 

        $rows = $results->num_rows;
        if($rows==1){
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = get_user_id($conn, $email);
            header("Location: ../Webpages/Profile.php");
        }
        else{
            header("Location: LoginPage.php?msg=LoginFailed");
        }

    }

    function get_profile_data($conn, $user_id)
    {
        $query = "SELECT * FROM Profile WHERE user_id = '$user_id'";
        $result = $conn->query($query);
        if(!$result)
        {
            echo "Error on get_profile_data";
        }


        $results = $result->fetch_array(MYSQLI_ASSOC);
        
        $my_array = array();
        $my_array['profile_id'] = $results['profile_id'];
        $my_array['dob'] = $results['dob'];
        $my_array['temp_pref'] = $results['temp_preference'];
        $my_array['bedtime'] = $results['bedtime'];
        $my_array['cleaning'] = $results['cleaning_sched'];
        $my_array['smoker'] = $results['smoker'];
        $my_array['drinker'] = $results['drinker'];
        $my_array['visitors'] = $results['visitor_acceptance'];
        $my_array['party'] = $results['party_often'];
        $my_array['bio'] = $results['bio_paragraph'];
        $my_array['age'] = $results['age'];
        $my_array['user_id'] = $results['user_id'];
        $my_array['gender'] = $results['gender'];


        

        return $my_array;
        


    }

    function get_listing_data($conn, $listing_id)
    {
        $query = "SELECT * FROM Listing WHERE listing_id = '$listing_id'";
        $result = $conn->query($query);
        if(!$result)
        {
            echo "Error on get_profile_data";
        }


        $results = $result->fetch_array(MYSQLI_ASSOC);

        $my_array = array();
        $my_array['address'] = $results['address'];
        $my_array['city'] = $results['city'];
        $my_array['state'] = $results['state'];
        $my_array['aptNum'] = $results['apt_no'];
        $my_array['roomSize'] = $results['room_size'];
        $my_array['bathType'] = $results['bath_type'];
        $my_array['price'] = $results['price'];
        $my_array['listing_id'] = $results['listing_id'];
        $my_array['pets_allowed'] = $results['pets_allowed'];
        $my_array['smoking_allowed'] = $results['smoking_allowed'];
        $my_array['misc_info'] = $results['misc_info'];

        return $my_array;
    }

?>