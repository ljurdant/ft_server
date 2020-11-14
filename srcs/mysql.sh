#!/bin/bash
service mysql start
mysql -u root -e 'CREATE DATABASE wordpress;'
mysql wordpress -e "CREATE USER ljurdant@localhost IDENTIFIED BY 'yo';"
mysql  -e 'GRANT ALL PRIVILEGES ON wordpress.* TO ljurdant@localhost;'

