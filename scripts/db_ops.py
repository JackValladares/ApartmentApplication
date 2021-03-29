# db_setup.py - Script that will set up all tables within
#               the ApartmentApplication database

# NOTE:         This script assumes that python3 is installed and that the
#               root account was used for the mysql install process

import os
import sys

SQL_SCRIPTS_DIR = 'sql_commands'
SETUP_SCRIPT = 'db_setup.sql'
TEARDOWN_SCRIPT = 'db_teardown.sql'


def call_script(script_dir, script_name):
    script_path = os.path.join(script_dir, script_name)
    os.system("mysql -u root -p < " + script_path)


def print_usage():
    print("Usage: db_ops.py <setup/teardown>", file=sys.stderr)
    sys.exit(1)


def main():

    if len(sys.argv) != 2:
        print_usage()

    if sys.argv[1] == 'setup':
        print("[+] Setting up tables in ApartmentApplication database ... ")
        call_script(SQL_SCRIPTS_DIR, SETUP_SCRIPT)
        print("[+] Done")

    elif sys.argv[1] == 'teardown':
        print("[+] Dropping tables in ApartmentApplication database ... ")
        call_script(SQL_SCRIPTS_DIR, TEARDOWN_SCRIPT)
        print("[+] Done")

    else:
        print_usage()


if __name__ == '__main__':
    main()
