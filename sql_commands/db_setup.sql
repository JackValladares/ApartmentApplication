--
-- DB Table Setup script
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
                    ('coolyguy123@gmail.com', 'Harris Collier', 'password123', NULL),
                    ('jacknvall@gmail.com', 'Jack Valladares', 'NotJacksPassword', NULL),
                    ('coolyguy1235@gmail.com', 'Bob Johnson', 'password123', NULL),
                    ('coolyguy1236@gmail.com', 'The Man', 'password123', NULL),
                    ('jacknvall2@gmail.com', 'Coolguy McGee', 'NotJacksPassword', NULL),
                    ('coolyguy1237@gmail.com', 'Mr Richardson', 'password123', NULL),
                    ('jacknvall3@gmail.com', 'Sans Undertale', 'NotJacksPassword', NULL),
                    ('coolyguy1238@gmail.com', 'Emory Timmerson', 'password123', NULL),
                    ('jacknvall4@gmail.com', 'Timmy Emerson', 'NotJacksPassword', NULL),
                    ('coolyguy1239@gmail.com', 'TiredFrustrated Programmer', 'password123', NULL),
                    ('jacknvall10@gmail.com', 'Somuchcoding McGee', 'NotJacksPassword', NULL),
                    ('root', 'Admin', 'admin', NULL);



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
        ("988 St Paul Court", "Apt 201", "Atlanta", "GA", "12 x 14", "private", "300", 3),
        ("8847 Devon Street", "Apt 201", "Milledgville", "GA", "12 x 14", "private", "400", 5),
        ("791 Lake Lane", "Apt 105", "Atlanta", "GA", "10 x 12", "shared", "800", 7),
        ("28 Beaver Ridge Lane", "Apt 201", "Milledgville", "GA", "12 x 14", "private", "450", 9),
        ("962 Front Dr", "Apt 201", "Atlanta", "GA", "12 x 14", "private", "300", 4),
        ("138 Front Street", "Apt 105", "Milledgville", "GA", "10 x 12", "shared", "550", 8),
        ("238 N Clarke Steet", "Apt 201", "Atlanta", "GA", "12 x 14", "private", "600", 4),
        ("2 Beech Court", "Apt 201", "Milledgville", "GA", "12 x 14", "private", "400", 6),
        ("123 Jack's House", "Apt Jack's Room", "Atlanta", "GA", "999 x 999", "awesome", "900", 2),
        ("100 Popeyes Road", "Drive Through", "Milledgville", "GA", "12 x 14", "private", "700", 10);


-- Create the Profile table if it does not already exist
CREATE TABLE IF NOT EXISTS Profile (
    profile_id          INT             AUTO_INCREMENT PRIMARY KEY,
    fName               varchar(20),
    lName               varchar(20),
    dob                 DATE,
    gender              varchar(11)     DEFAULT 'Male',
    temp_preference     varchar(3)      DEFAULT '70',
    bedtime             varchar(5)      DEFAULT '22:00',
    cleaning_sched      varchar(9)      DEFAULT 'Weekly',
    smoker              varchar(3)      DEFAULT 'No',
    drinker             varchar(3)      DEFAULT 'No',
    visitor_acceptance  varchar(3)      DEFAULT 'No',
    party_often         varchar(3)      DEFAULT 'No',
    bio_paragraph       varchar(1024)   DEFAULT 'Default User',
    age                 varchar(3),
    user_id             INT,

    FOREIGN KEY (user_id) REFERENCES Account(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Profile(fName, lName, dob, gender, temp_preference, bedtime, cleaning_sched, smoker, drinker, bio_paragraph, user_id)
VALUES
        ("Harris", "Collier", "1999-03-02", "Male", 72, "22:00", "Weekly" , "No", "Yes", "I'm a pretty cool guy looking for a fun time. FLCL Fan", 1),
        ("Jack", "Valladares", "1999-02-10", "Male", 70, "23:00", "Daily" , "No", "Yes", "Just your average everyday guy by day, but by night, I become your average everyday guy at night", 2),
        ("Bob", "Johnson", "1960-04-01", "Male", 69, "20:00", "BiWeekly" , "Yes", "Yes", "Hi! I'm Bob", 3),
        ("The", "Man", "2000-03-02", "Male", 100, "12:00", "Weekly" , "Yes", "Yes", "The Man...Has Arrrived. The Man... Wants a House.", 4),
        ("Coolguy", "McGee", "1946-03-02", "Male", 54, "2:00", "Daily" , "No", "No", "I'm THE Coolguy McGee", 5),
        ("Mr", "Richardson", "1964-03-02", "Male", 64, "1:00", "BiWeekly" , "No", "Yes", "I'm a professor, my dude", 6),
        ("Sans", "Undertale", "2014-03-02", "Male", 12, "4:00", "Weekly" , "No", "No", "hehehehe FLCL Fan", 7),
        ("Emory", "Timmerson", "199-04-02", "Male", 54, "23:00", "Daily" , "Yes", "Yes", "I want house. give me house.", 8),
        ("Timmy", "Emerson", "1999-05-02", "Male", 68, "20:00", "Weekly" , "No", "No", "Crossover episode!?", 9),
        ("TiredFrustrated", "Programmer", "1999-02-10", "Male", 70, "22:00", "Daily" , "No", "No", "Just your average everyday guy by day, but by night, I become your average everyday guy at night", 10),
        ("Somuchcoding", "McGee", "1999-03-02", "Male", 69, "21:00", "Daily" , "No", "Yes", "Oh yurtle", 11),
        ("Afakename", "Jackmade", "1999-03-02", "Male", 72, "22:00", "BiWeekly" , "Yes", "No", "I'm a pretty fake guy looking for a fake time.", 12);

CREATE TABLE IF NOT EXISTS ProfileImages (
    image_id            INT     AUTO_INCREMENT PRIMARY KEY,
    profile_image       BLOB,
    profile_id          INT,

    FOREIGN KEY (profile_id) REFERENCES Profile(profile_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS ListingImages (
    image_id            INT     AUTO_INCREMENT PRIMARY KEY,
    listing_image       MEDIUMBLOB,
    listing_id          INT,

    FOREIGN KEY (listing_id) REFERENCES Listing(listing_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;
