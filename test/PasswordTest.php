<?php

require_once '../php/sqlFunctions.php';

class PasswordTest extends \PHPUnit\Framework\TestCase
{
    //public function setUp(){}
    //public function tearDown(){}

    public function testGenerateInsertKey()
    {
        $conn = connectDB();
        $email = 'testpurposes@phpmail.com';
        $query = "SELECT passwd_reset_key FROM account WHERE email='$email'";
        $result = $conn->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $code1 = $row["passwd_reset_key"];
        generate_insert_key($conn, $email);
        $result = $conn->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $code2 = $row["passwd_reset_key"];
        $this->assertTrue($code1 != $code2);
    }

    public function testResetKey()
    {
        $conn = connectDB();
        $email = 'testpurposes@phpmail.com';
        reset_key($conn, $email);
        $query = "SELECT passwd_reset_key FROM account WHERE email='$email'";
        $result = $conn->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $code1 = $row["passwd_reset_key"];
        $this->assertEquals($code, NULL);
    }

}