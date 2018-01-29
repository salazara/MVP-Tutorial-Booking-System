<?php

	session_start();

	if(isset($_SESSION['user'])) {

		include('../config.php');

		$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

		$username = $_SESSION['user'];

		echo "<h2><span style='color: yellow;'>$username</span>'s ENROLLMENTS</h2>";

		$sql = "SELECT * FROM enrollments WHERE username='{$username}'";
		$result = $mysqli->query($sql);

		echo "<ul>";

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {

			$topic = $row['topic'];

			echo "<form action='drop.php' method='POST'>";
		   		echo "<li>";
		  			echo "<p>TOPIC: <span style='color: yellow;'>$topic</span></p>";
		    		echo "<input type='hidden' name='topic' value='$topic'/>";
		    		echo "<p><input type='submit' value='D R O P'/></p>";
		    	echo "</li>";
		  	echo "</form>";
		}

		echo "</ul>";

		$mysqli->close();
	}
?>