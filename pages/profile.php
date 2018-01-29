<?php

	if(isset($_GET['user'])){
		
		include('../config.php');

		$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

		$username = $_GET['user'];

		$sql = "SELECT * FROM users WHERE username='{$username}' AND admin='0'";
		$user_count = $mysqli->query($sql)->num_rows;

		if($user_count > 0) {

			$sql = "SELECT * FROM enrollments WHERE username='{$username}'";
			$enrollment_count = $mysqli->query($sql)->num_rows;

			echo "<h2><span style='color: yellow;'>$username</span>'s PROFILE</h2>";
			echo "<p>NUMBER OF ENROLLMENTS: <span style='color: yellow;'>$enrollment_count</span></p>";
		}
		else {

			echo "<h2><span style='color: yellow;'>$username</span> NOT FOUND</h2>";			
		}

		$mysqli->close();
	}
?>