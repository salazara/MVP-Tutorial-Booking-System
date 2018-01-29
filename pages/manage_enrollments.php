<?php

	session_start();

	if(isset($_SESSION['admin'])) {

		include('../config.php');

		$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

		//$username = $_SESSION['admin'];

		echo "<h2>MANAGE <span style='color: yellow;'>ENROLLMENTS</span></h2>";

		$sql = "SELECT * FROM enrollments";
		$result = $mysqli->query($sql);

		echo "<ul>";

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {

			$username = $row['username'];
			$topic = $row['topic'];

			// todo: create php files to delete enrollments
		   	echo "<li>";
		  		echo "<p>USER: <span style='color: yellow;'>$username</span></p>";
		  		echo "<p>TOPIC: <span style='color: yellow;'>$topic</span></p>";
		  		echo "<form action='delete_enrollment.php' method='POST'>";
		    		echo "<input type='hidden' name='username' value='$username'/>";
		   		 	echo "<input type='hidden' name='topic' value='$topic'/>";
		    		echo "<input type='submit' value='D E L E T E'/>";
		    	echo "</form>";
		    echo "</li>";
		}

		echo "</ul>";

		$mysqli->close();
	}
?>