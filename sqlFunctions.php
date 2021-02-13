<?php

	function connectDB(){
		$hn = "localhost";
		$un="phpadmin";
		$pw="";
		$db="appartmentApplication";

		$conn = new mysqli($hn,$un,$pw,$db);
		if($conn->connect_error) die("fatal error on connecting to db");

		return $conn;
	}

    function insertAccount($connection, $email, $user_name, $passwrd){
        $query = "INSERT INTO account (email, user_name, passwd)
        VALUES (<email>, <user_name>, <passwd>);";
        $results = $connection->query($query);
        if(!$results){
            echo "Query failed";
            die("fatal error on sql query");
          } 
    }

    function checkAccount($connection, $email, $passwrd){
        $query = "SELECT passwd FROM account
        WHERE user_name = <user_name>;
        
        -- Attempt to fetch the corresponding password for a given email
        SELECT passwd FROM account
        WHERE email= <email>;";

        $results = $connection->query($query);
        return $results;
    }

?>