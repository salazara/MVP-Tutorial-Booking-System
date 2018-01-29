<?php

session_start();

if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {

	include('config.php');
	include('functions.php');

	$page = "home.php";
		
	$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT admin FROM users WHERE username='{$username}' and password='{$password}'";

	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
		
		if($result->fetch_array(MYSQLI_ASSOC)['admin'] == 1){

			$_SESSION['admin'] = $username;
		}
		else{

			$_SESSION['user'] = $username;
		}

		$mysqli->close();

		$msg = "LOGIN SUCCESSFUL";
		reloadPageWithMessage($page, $msg);
	}
	else {

		$mysqli->close();

		$msg = "INVALID USERNAME AND/OR PASSWORD";
		reloadPageWithMessage($page, $msg);
	}
}