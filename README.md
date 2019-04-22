# Automagical-Restaurant-Manager (Intro. SE project - Spring 2019)

## phpMyAdmin Database Account Details
*Server* : sql9.freemysqlhosting.net

*Name* : sql9288709

*Username* : sql9288709

*Password* : gGdDxMZUzg

*Port number* : 3306

http://www.phpmyadmin.co/

## [Website - tracking master](http://pluto.cse.msstate.edu/~an839/SE/Automagical-Restaurant-Manager/)
##### You would need access to Mississippi State University's pluto server to view this website.

## Directory Structure:
* index.php     - main file which implements and makes calls to all other php files and functions
* frontend_Models      - Includes all the required php files needed for the frontend
* backend_Models       - Includes all required php files for backend
* database             - Includes the databse API and database login evaluator 

        Frontend_Models/login.php               - Enables different user and manager logins
        Frontend_Models/logout.php              - Enables the user to logout
        Frontend_Models/orderMenu.php           - Enables user to open and order for a table
        Frontend_Models/viewOrders.php          - Enables admin to edit an existing product in the database
        Frontend_Models/viewTableStatus.php     - Enables user to view clean/dirty tables
        Frontend_Models/viewStatistics.php      - Enables admin to view statistics report for the day, week, etc. 
        Frontend_Models/editAccount.php         - Enables user to edit Account details (optional)
        Frontend_Models/manageAccounts.php      - Enables admin to add or delete an admin (optional)
        Frontend_Models/checkout.php            - Just a dummy page for the checkout button

        Backend_Models/common.php               - Implements the common class for implementations of the shared functions
        Backend_Models/table.php                - Implements the table class for manipulating table statuses
        Backend_Models/order.php                - Implements the order class to enable ordering funtionalities
        Backend_Models/employee.php             - Implements the user class for function implementations of an employee in common
        Backend_Models/manager.php              - Implements the admin class for function implementations of a manager
        Backend_Models/host.php                 - Implements the host class for function implementations - assigning table 
        Backend_Models/waiter.php               - Implements the waiter class for function implementations - receive table number and create orders 
        Backend_Models/cook.php                 - Implements the cook class for function implementations - receiving/notifying orders 
        Backend_Models/busser.php               - Implements the busser class for function implementations - receive and setting notifications of dirty tables

        Database/dbAPI.php                      - Implements all functions needed for communication with the database

        Assets                                  - Stores all images, css files, etc for frontend models


## Database Dummy Accounts:

        *Users* 
        host                    - Host user
        waiter0                 - Waiter user
        waiter1                 - Waiter user
        cook                    - Cook user
        busser                  - Busser user
        manager                 - Manager user


