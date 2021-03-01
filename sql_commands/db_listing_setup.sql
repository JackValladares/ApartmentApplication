--
-- Listing table creation script
--

-- Create the Listing table if it doesn't already exist
USE ApartmentApplication;

CREATE TABLE IF NOT EXISTS Listing (
    listing_id      INT AUTO_INCREMENT PRIMARY KEY,
    address         VARCHAR(512),
    apt_no          VARCHAR(7),
    city            VARCHAR(256),
    state           VARCHAR(2),
    room_size       VARCHAR(256),
    bath_type       VARCHAR(7),
    price           varchar(256),
    FOREIGN KEY (user_id) REFERENCES Account(user_id)
)

-- Insert some test data
INSERT INTO Listing(address, apt_no, city, state, room_size,
                    bath_type, price, user_id) VALUES
                    ("145 Irwin St", "Apt 201", "Milledgville", "GA", "12 x 14", "private", "300", 1),
                    ("145 Irwin St", "Apt 201", "Milledgville", "GA", "12 x 14", "private", "300", 1),
                    ("501 N Wilkinson St", "Apt 105", "Milledgville", "GA", "10 x 12", "shared", "100", 2),
                    ("605 N Columbia St", "Apt 103", "Milledgville", "GA", "12 x 14", "private", "150", 3);

