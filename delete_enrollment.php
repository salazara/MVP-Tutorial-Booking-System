<?php

session_start();

if(isset($_SESSION['admin'])) {

	include('functions.php');
	include('config.php');
	
	$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	$username = $_POST['username'];
	$topic = $_POST['topic'];

	$sql = "DELETE FROM enrollments WHERE username='{$username}' AND topic='{$topic}'";

	$mysqli->query($sql);

	$page = "manage_enrollments.php";
	$msg = "DELETED: " . $username . " -- " . $topic;

	reloadPageWithMessage($page, $msg); 
}