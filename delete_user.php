<?php

session_start();

if(isset($_SESSION['admin'])) {

	include('functions.php');
	include('config.php');
	
	$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	$username = $_POST['username'];

	$sql = "DELETE FROM users WHERE username='{$username}'";

	$mysqli->query($sql);

	$page = "manage_users.php";
	$msg = "DELETED: " . $username;

	reloadPageWithMessage($page, $msg); 
}