# SabuComm
How to run this Project

Create these files "user\include\config.php" and "admin\include\config.php" 
copy and paste this code in the files

```php

<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'YOUR_MYSQL');
define('DB_NAME', 'cms');
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

```
1. clone this project into xampp/htdocs

2. Open PHPMyAdmin (http://localhost/phpmyadmin)

3. Create a database with name cms

4. Import cms.sql file(given inside SQL File/ )

5. Use mobile= "8956232356" and email ="admin@gmail.com" and reset passord to preffered password

6. Create a user and use th ecredentials to login as a normal user

5. Visit the link http://localhost/sabucomm (browser)


Credential for admin panel : 
Username: 'admin', Password: Your_New_Password


NOTE:
Make sure to create these files user\include\config.php and admin\include\config.php to use you database password

copy and paste this code in the files

<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'Maraclara2@@2');
define('DB_NAME', 'cms');
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

