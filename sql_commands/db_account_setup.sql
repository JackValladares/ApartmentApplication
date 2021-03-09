--
-- Mock up for Account Table creation script
--

-- Create the database if it doesn't already exist;
CREATE DATABASE IF NOT EXISTS ApartmentApplication;

-- Create the Account table if it doesn't already exist;
USE ApartmentApplication;

CREATE TABLE IF NOT EXISTS Account (
    user_id         INT AUTO_INCREMENT PRIMARY KEY,
    email           VARCHAR(512),
    user_name       VARCHAR(512),
    passwd        VARCHAR(512),
    UNIQUE KEY    unique_email (email)
);

-- Insert some test data
INSERT INTO Account(user_id, email, user_name, passwd) VALUES
                    (1,'coolyguy123@gmail.com', 'Cool Guy', 'password123'),
                    (2, 'jacknvall@gmail.com', 'Jack Not Valladares', 'NotJacksPassword'),
                    (3, 'lameemail@lameemail.com', 'Harris Collier', 'drowssap');