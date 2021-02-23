import MySQLdb
import unittest

from scripts import db_ops as dops

class TestDBSetup(unittest.TestCase):

    cur = None              # Holds cursor object used for query execution
    db =  None              # Holds db connection object

    def setUp(self):
        self.db = MySQLdb.connect(host="localhost",    # your host 
                     user="root",                 # username
                     passwd="",                   # password
                     db="ApartmentApplication")   # name of the database

        # Create a Cursor object to execute queries
        self.cur = self.db.cursor()

    def test_setup(self):
        """ Tests the setup command found in db_ops.py """

        dops.call_script(dops.SQL_SCRIPTS_DIR, dops.SETUP_SCRIPT)

        # Select data from table using SQL query
        self.cur.execute("SELECT * FROM Account")

        # Above query should return the three default entries
        self.assertTrue(len(self.cur.fetchall()) == 3)
    
    def tearDown(self):
         # Close connection to database
        self.db.close()

        # Reset cursor
        self.cur = None


if '__name__' == '__main__':
    unittest.main()