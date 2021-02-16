import MySQLdb
import unittest

import db_ops as dops

class TestDBOps(unittest.TestCase):

    def test_setup(self):
        db = MySQLdb.connect(host="localhost",    # your host 
                     user="root",                 # username
                     passwd="",                   # password
                     db="ApartmentApplication")   # name of the database

        # Create a Cursor object to execute queries
        cur = db.cursor()

        # Call the setup script
        dops.call_script(dops.SQL_SCRIPTS_DIR, dops.SETUP_SCRIPT)

        # Select data from table using SQL query
        cur.execute("SELECT * FROM Account")

        # Above query should return results
        self.assertTrue(len(cur.fetchall()) != 0)

    def test_teardown(self):
        db = MySQLdb.connect(host="localhost",    # your host 
                     user="root",                 # username
                     passwd="",                   # password
                     db="ApartmentApplication")   # name of the database

        # Create a Cursor object to execute queries.
        cur = db.cursor()

        # Call the teardown script
        dops.call_script(dops.SQL_SCRIPTS_DIR, dops.TEARDOWN_SCRIPT)

        # Attempt to select entries from the Account table (should fail)
        failed_as_expected = False
        try:
            cur.execute("SELECT * FROM Account")
        except MySQLdb._exceptions.ProgrammingError:
            failed_as_expected = True
        
        self.assertTrue(failed_as_expected)


if '__name__' == '__main__':
    unittest.main()