-- Attempt to fetch the corresponding password for a given username;
SELECT passwd FROM account
WHERE user_name = <user_name>;

-- Attempt to fetch the corresponding password for a given email
SELECT passwd FROM account
WHERE email= <email>;
