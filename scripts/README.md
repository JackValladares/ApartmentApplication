# Environment Setup Script

## Description

---

The script named *db_ops.py* handles the database installation/uninstallation procedure. 
<br>More specifically, the script performs the following actions:</br>

**Environment Setup**
>1.  Creates the MySQL ApartmentApplication database (if non-existent)
>2.  Populates the database with all relevant tables
>3.  Populates each table with default data

**Environment Teardown**
>1. Drops all tables in the ApartmentApplication database
>2. Does not delete the database itself


## Usage

---

To perform the environment installation procedure, simply execute the following command in your terminal:

> python3 db_ops.py setup

Conversely, to wipe the install execute the following command in your terminal:

> python3 db_ops.py teardown