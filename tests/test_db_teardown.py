import MySQLdb
import unittest

from scripts import db_ops as dops

class TestDBTeardown(unittest.TestCase):

    cur = None              # Holds cursor object used for query execution
    db = None               # Holds db connection object
    
    def setUp(self):
        self.db = MySQLdb.connect(host="localhost",    # your host 
                     user="root",                 # username
                     passwd="",                   # password
                     db="ApartmentApplication")   # name of the database

        # Create a Cursor object to execute queries.
        self.cur = self.db.cursor()

    def test_teardown_account(self):
        """ Tests the teardown command found in db_ops.py """

        dops.call_script(dops.SQL_SCRIPTS_DIR, dops.TEARDOWN_SCRIPT)

        # Attempt to select entries from the Account table (should fail)
        failed_as_expected = False
        try:
            self.cur.execute("SELECT * FROM Account")
        except MySQLdb._exceptions.ProgrammingError:
            failed_as_expected = True
        
        self.assertTrue(failed_as_expected)
    
    def tearDown(self):
        # Close connection to database
        self.db.close()

        # Reset cursor
        self.cur = None

if '__name__' == '__main__':
    unittest.main()