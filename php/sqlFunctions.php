<!--TODO:
    -Figure out how $results data is stored and if it can be compared to string password.
    !-->

<?php

    //function to connect to a database and return a connection
	function connectDB(){
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

    function updateAccount($conn, $password, $email){
        $emailquery = "SELECT * FROM account WHERE email='$email'";
        $result = $conn->query($emailquery);
        if(mysqli_num_rows($result) != 1)
        {
            header("Location: password_reset_page.php?EE=1&email=$email");
            //send back to password reset page with msg that email doesnt exist in system
        }
        else{
            $resetQuery = "UPDATE account set passwd = '$password' where email = '$email'";
            $conn->query($resetQuery);
            unset($_SESSION['password_reset_key']);
            reset_key($conn,$email);
            header("Location: LoginPage.php?msg=passResetWorked");
        }
    }


    //gets the reset code from an email provided on previous page and stores the code in the session
    function getResetCode($conn, $email){
        $emailquery = "SELECT passed_reset_key FROM account WHERE email='$email'";
        $result = $conn->query($emailquery);
        if(mysqli_num_rows($result) != 1)
        {
            //send back to the page harris is making and say that this query failed because this email doesn't exist
            header("Location: HARRISREQUESTPAGE?RCE=1&email=$email");
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
            $_SESSION['userEmail'] = $email;
            header("Location: index.php");
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
        $my_array['property_id'] = $results['property_id'];
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

?>