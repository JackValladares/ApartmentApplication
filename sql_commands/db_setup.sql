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


-- Create the Listing table if it doesn't already exist
CREATE TABLE IF NOT EXISTS Listing (
    listing_id      INT AUTO_INCREMENT PRIMARY KEY,
    address         VARCHAR(512),
    apt_no          VARCHAR(7),
    city            VARCHAR(256),
    state           VARCHAR(2),
    room_size       VARCHAR(256),
    bath_type       VARCHAR(7),
    price           varchar(256),
    user_id         INT,
    
    FOREIGN KEY (user_id) REFERENCES Account(user_id)
);

-- Insert some test data
INSERT INTO Listing(address, apt_no, city, state, room_size, bath_type, price, user_id)
VALUES
        ("145 Irwin St", "Apt 201", "Milledgville", "GA", "12 x 14", "private", "300", 1),
        ("145 Irwin St", "Apt 201", "Milledgville", "GA", "12 x 14", "private", "300", 1),
        ("501 N Wilkinson St", "Apt 105", "Milledgville", "GA", "10 x 12", "shared", "100", 2),
        ("605 N Columbia St", "Apt 103", "Milledgville", "GA", "12 x 14", "private", "150", 3);