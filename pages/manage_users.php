<?php

	session_start();

	if(isset($_SESSION['admin'])) {

		include('../config.php');

		$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

		echo "<h2>MANAGE <span style='color: yellow;'>USERS</span></h2>";

		$sql = "SELECT * FROM users";
		$result = $mysqli->query($sql);

		echo "<ul>";

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {

			// cannot manage admins; only users
			if($row['admin'] == 0) {

				$username = $row['username'];
				
			   	echo "<li>";
			  		echo "<p>USER: <span style='color: yellow;'>$username</span></p>";
			  		echo "<form action='delete_user.php' method='POST'>";
			    		echo "<input type='hidden' name='username' value='$username'/>";
			    		echo "<input type='submit' value='DELETE'/>";
			    	echo "</form>";
			    echo "</li>";
			}
		}

		echo "</ul>";

		$mysqli->close();
	}
?>