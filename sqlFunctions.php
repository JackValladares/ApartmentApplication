<!--TODO:
    -Figure out how $results data is stored and if it can be compared to string password.
    !-->

<script>
<?php

    session_start();

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

    //function used to insert and account into the database - if it failes it redirects to 
    //the create account page and displays and error.
    function insertAccount($connection, $email, $user_name, $passwrd){
        $query = "INSERT INTO account (email, user_name, passwd)
        VALUES ('$email', '$user_name', '$passwrd');";
        $results = $connection->query($query);
        if(!$results){
            $_SESSION['register_success'] = false;
            $_SESSION['registration_error'] = "Something went wrong with registration. Make sure you don't already have an account associated with this email.";
            header("location:accountCreation.php");
            die("fatal error on sql query");
          } 
    }

    //function used to redirect to any page
    function sendToPage($page){
        header("Location: $page");
    }

    //verify that given password matches account password
    function checkAccount($connection, $email, $passwrd){
        $query = "
        SELECT passwd FROM account
        WHERE email= '$email';";

        $results = $connection->query($query);

        if($results == $passwrd)
            return 1;
        else
            return 0;
    }

?>