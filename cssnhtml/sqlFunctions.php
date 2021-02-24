<!--TODO:
    -Figure out how $results data is stored and if it can be compared to string password.
    !-->

<!--small test change!-->

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
    //function used to redirect to any page
    function sendToPage($page){
        header("Location: $page");
    }}

    //verify that given password matches account password
    function userLogin($conn, $email, $password){
        $query = "SELECT * FROM Account WHERE email = \"$email\" AND passwd = \"$password\";";
        $results = $conn->query($query);
        if(!$results){
            echo "user Login failed";
            die("fatal error on sql query");
          } 

        $rows = $results->num_rows;
        if($rows==1){
            header("Location: LoginSuccessPage.php?user=\"$email\"");
        }
        else{
            header("Location: LoginPage.php?msg=LoginFailed");
        }

    }

?>