--
-- Mock up for Account Table creation script
--

-- Create the database if it doesn't already exist;
CREATE DATABASE IF NOT EXISTS ApartmentApplication;

-- Create the Account table if it doesn't already exist;
USE ApartmentApplication;

CREATE TABLE IF NOT EXISTS Account (
    user_id         INT AUTO_INCREMENT PRIMARY KEY,
    email               VARCHAR(512),
    user_name           VARCHAR(512),
    passwd              VARCHAR(512),
    passwd_reset_key    VARCHAR(8),
    UNIQUE KEY    unique_email (email)
);

-- Insert some test data
INSERT INTO Account(email, user_name, passwd, passwd_reset_key) VALUES
                    ('coolyguy123@gmail.com', 'Cool Guy', 'password123', NULL),
                    ('jacknvall@gmail.com', 'Jack Not Valladares', 'NotJacksPassword', NULL),
                    ('lameemail@lameemail.com', 'Harris Collier', 'drowssap', NULL);


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
    misc_info       varchar(2048)           DEFAULT '',
    pets_allowed    varchar(3)              DEFAULT 'No',
    smoking_allowed varchar(3)              DEFAULT 'No',
    user_id         INT,

    FOREIGN KEY (user_id) REFERENCES Account(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Insert some test data
INSERT INTO Listing(address, apt_no, city, state, room_size, bath_type, price, user_id)
VALUES
        ("145 Irwin St", "Apt 201", "Milledgville", "GA", "12 x 14", "private", "300", 1),
        ("145 Irwin St", "Apt 201", "Milledgville", "GA", "12 x 14", "private", "300", 1),
        ("501 N Wilkinson St", "Apt 105", "Milledgville", "GA", "10 x 12", "shared", "100", 2),
        ("605 N Columbia St", "Apt 103", "Milledgville", "GA", "12 x 14", "private", "150", 3);

-- Create the Profile table if it does not already exist
CREATE TABLE IF NOT EXISTS Profile (
    profile_id          INT             AUTO_INCREMENT PRIMARY KEY,
    fName               varchar(20),
    lName               varchar(20),
    dob                 DATE,
    gender              varchar(11),
    temp_preference     varchar(3)      DEFAULT '70',
    bedtime             varchar(5)      DEFAULT '22:00',
    cleaning_sched      varchar(9)      DEFAULT 'Weekly',
    smoker              varchar(3)      DEFAULT 'No',
    drinker             varchar(3)      DEFAULT 'No',
    visitor_acceptance  varchar(3)      DEFAULT 'No',
    party_often         varchar(3)      DEFAULT 'No',
    bio_paragraph       varchar(1024)   DEFAULT '',
    age                 varchar(3),
    user_id             INT,

    FOREIGN KEY (user_id) REFERENCES Account(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Profile(dob, bio_paragraph, user_id)
VALUES
        ("1999-03-02", "FLCL fan", 1),
        ("1990-08-26", "Not Jack", 2),
        ("2000-12-14", "Zoid", 3);
