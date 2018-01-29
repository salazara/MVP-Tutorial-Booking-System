<?php

session_start();

if(isset($_SESSION['user'])) {

	include('functions.php');
	include('config.php');
	
	$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	$username = $_SESSION['user'];
	$topic = $_POST['topic'];

	$sql = "DELETE FROM enrollments WHERE username='{$username}' and topic='{$topic}'";

	$mysqli->query($sql);

	$page = "enrollments.php";
	$msg = "DROPPED: " . $topic;

	reloadPageWithMessage($page, $msg); 
}
?>