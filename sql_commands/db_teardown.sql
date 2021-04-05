--
-- SQL Teardown script for Account table
--
USE ApartmentApplication;

-- Ignore foreign key checks when dropping tables
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS Account;
DROP TABLE IF EXISTS Listing;
DROP TABLE IF EXISTS Profile;
SET FOREIGN_KEY_CHECKS = 1;