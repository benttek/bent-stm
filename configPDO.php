<?php


// mysql hostname
$hostname = 'localhost';
// mysql username
$username = 'root';
// mysql password
$password = 'root';
// Database Connection using PDO
try {
$dbh = new PDO("mysql:host=$hostname;dbname=chkindb;charset=utf8", $username, $password);


    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
//If we will not use catch statement, then in case of error zend engine terminate the script and display a back trace. This back trace will likely reveal the full database connection details, including the username and password.  
?>