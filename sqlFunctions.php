<!--TODO:
    -Figure out how $results data is stored and if it can be compared to string password.
    !-->

<?php

	function connectDB(){
		$hn = "localhost";
        $un = "root";
        $pw = "";
		$db= "ApartmentApplication";

		$conn = new mysqli($hn,$un,$pw,$db);
		if($conn->connect_error) die("fatal error on connecting to db");

		return $conn;
	}

    function insertAccount($connection, $email, $user_name, $passwrd){
        $query = "INSERT INTO account (email, user_name, passwd)
        VALUES ('$email', '$user_name', '$passwrd');";
        $results = $connection->query($query);
        if(!$results){
            echo "Query failed";
            die("fatal error on sql query");
          } 
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