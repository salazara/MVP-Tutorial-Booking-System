<?php

session_start();

if(isset($_SESSION['user'])) {

	include('functions.php');
	include('config.php');
	
	$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	$username = $_SESSION['user'];
	$topic = $_POST['topic'];

	$sql = "SELECT * FROM enrollments WHERE username='{$username}' and topic='{$topic}'";

	if($mysqli->query($sql)->num_rows > 0) {

		$page = "tutorials.php";
		$msg = "ALREADY ENROLLED IN: " . $topic;

		reloadPageWithMessage($page, $msg);
	} 

	$sql = "INSERT  INTO enrollments (username, topic) 
			VALUES ('{$username}', '{$topic}')";


	if ($mysqli->query($sql)) {

		$page = "tutorials.php";
		$msg = "ENROLLED IN: " . $topic;
		
		reloadPageWithMessage($page, $msg);
	}

}
elseif(isset($_SESSION['admin'])){
	
	include('functions.php');

	$page = "tutorials.php";
	$msg = "ADMIN USERS CANNOT ENROLL";

	reloadPageWithMessage($page, $msg);
}
else {

	include('functions.php');

	$page = "tutorials.php";
	$msg = "ONLY REGISTERED USERS CAN ENROLL";
	
	reloadPageWithMessage($page, $msg);
}

?>