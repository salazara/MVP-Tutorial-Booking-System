<?php

include('config.php');

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

$sql = "DROP TABLE IF EXISTS users";
$mysqli->query($sql);

$sql = "DROP TABLE IF EXISTS enrollments";
$mysqli->query($sql);

// create users table
$sql = "CREATE TABLE users (
			username VARCHAR(50) PRIMARY KEY, 
			password VARCHAR(50), 
			email VARCHAR(100), 
			first_name VARCHAR(80), 
			last_name VARCHAR(80),
			admin TINYINT(1)
		)";

if ($mysqli->query($sql) === TRUE) {

    echo "SUCCESSFUL CREATION OF TABLE users<br>";
} 

// create enrollments table
$sql = "CREATE TABLE enrollments (
			id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(50),
			topic VARCHAR(100)
		)";

if ($mysqli->query($sql) === TRUE) {

    echo "SUCCESSFUL CREATION OF TABLE enrollments<br>";
} 

// insert admin user
$sql = "INSERT  INTO users (username, password, email, first_name, last_name, admin) 
		VALUES ('salazara', 'password', 'salazara@uwindsor.ca', 'angelico', 'salazar', '1')";
			 
if ($mysqli->query($sql)) {

	echo "SUCCESSFUL INSERT TO TABLE users :: ADMIN salazara<br>";
} 

$mysqli->close();

?>