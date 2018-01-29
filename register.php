<?php

if(isset($_POST['first_name']) && 
	isset($_POST['last_name']) && 
	isset($_POST['email']) && 
	isset($_POST['username'])&& 
	isset($_POST['password'])&&
	isset($_POST['submit'])) {

	include('config.php');
	include('functions.php');

	$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	$first_name	= $_POST['first_name'];
	$last_name	= $_POST['last_name'];
	$email		= $_POST['email'];
	$username	= $_POST['username'];
	$password	= $_POST['password'];
		 
	$valid = true;

	$sql = "SELECT email from users WHERE email='{$email}'";
	if ($mysqli->query($sql)->num_rows > 0) {
				
		$valid = false;
	}

	$sql = "SELECT username from users WHERE username='{$username}'";
	if ($mysqli->query($sql)->num_rows > 0) {

		$valid = false;
	}

	if($valid){
			
		$sql = "INSERT  INTO users (username, password, email, first_name, last_name, admin) 
				VALUES ('{$username}', '{$password}', '{$email}', '{$first_name}', '{$last_name}', '0')";
				 
		if ($mysqli->query($sql)) {

			$mysqli->close();


			$page = "home.php";
			$msg = "SUCCESSFUL REGISTRATION : " . $username;

			reloadPageWithMessage($page, $msg);
		} 
	}
	else {

		$mysqli->close();

		// form repopulation via get variables
		$page = "register.php?first_name={$first_name}&&last_name={$last_name}&&email={$email}&&username={$username}";
		$msg = "USERNAME AND/OR EMAIL ALREADY EXISTS";
		
		reloadPageWithMessage($page, $msg);
	}
}

?>	