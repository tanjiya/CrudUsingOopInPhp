# CRUD with file upload using OOP & PDO in PHP
 
## Repository Details:

- Read, Insert, Update, Delete Record
 

## User Manual:
  
- Need to download or clone the project
- Create a Database named **crud_oop_in_php**
- Create a Table named **employees**
- Table Queries are given below
- Need to put the mySQL user name and password in config/database.php file
- And you are done!
- Just go to your browser and write localhost!
- And Yes, most importantly -- You have to installed Apache, PHP and MySQL on your computer :)


## Prerequisite:

- Knowledge in OOP like Class, Object, Method, Namespace, Interface

## `employees` table queries:

- CREATE TABLE employees (
- id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
- name VARCHAR(50) NOT NULL,
- email VARCHAR(50) NOT NULL,
- website VARCHAR(50) NOT NULL,
- comment VARCHAR(50),
- created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
- updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
- );


## Folder hierarchy:

--classes
- Crud.php
- Database.php
- Validation.php

--css
- style.css

--inc
- footer.php
- header.php

--Interfaces
- CrudInterface.php
- ValidationInterface.php

--utility
- autoload.php

--create.php (Create Record)

--delete.php (Delete Record)

--edit.php (Edit Record)

--index.php (Read Record)
