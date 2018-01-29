<?php 

session_start(); 

?>

<!DOCTYPE html>

<html>

	<head>

	<title>Sensei Salazar</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script src="js/functions.js"></script>

	</head>

	<body>

		<div id="view">

			<img src="images/ss_logo.jpg" alt="sensei salazar logo"/>

		<?php
			// admin view
			if(isset($_SESSION['admin'])){ 
		?>
				<?php $admin = $_SESSION['admin']; ?>
				
				<p>
					HELLO ADMIN
				 	<br/>
				 	<span style="color: yellow;"><?php echo $admin ?></span>
				</p>

				<ul>
					<li><a href="logout.php"><button type="button">LOG OUT</button></a></li>
					<li><button type="button" onclick="loadContent('pages/manage_users.php');">MANAGE USERS</button></li>
					<li><button type="button" onclick="loadContent('pages/manage_enrollments.php');">MANAGE ENROLLMENTS</button></li>
					<li><button type="button" onclick="loadContent('pages/manage_tutorials.php');">MANAGE TUTORIALS</button></li>
				</ul>
		
		<?php 
			} 
			// user_view
			elseif(isset($_SESSION['user'])) {
		?>

				<?php $user = $_SESSION['user']; ?>

				<p>
					HELLO USER
					<br/>
					<span style="color: yellow;"><?php echo $user ?></span>
				</p>

				<ul>
					<li><a href="logout.php"><button type="button">LOG OUT</button></a></li>
					<li><button type="button" onclick="loadContent('pages/profile.php?user=<?php echo $user ?>');">PROFILE</button></li>
					<li><button type="button" onclick="loadContent('pages/enrollments.php');">ENROLLMENTS</button></li>
				</ul>

		<?php
			}
			// guest_view
			else {
		?>

			<p>HELLO GUEST</p>

			<form action="login.php" method="POST">
				<input type="text" name="username" value="USERNAME"/></br/>
				<input type="password" name="password" value="PASSWORD"/><br/>
				<input type="submit" value="LOG IN"/> 
			</form>

			<button type="button" onclick="loadContent('pages/register.php');">REGISTER</button>

		<?php
			}
		?>

		</div>

		<div id="nav">

			<h1>- - -</h1>


			<h1>- - -</h1>

			<ul>
				<li><button type="button" onclick="loadContent('pages/home.php');">HOME</button></li>
				<li><button type="button" onclick="loadContent('pages/tutorials.php');">TUTORIALS</button></li>
				<li><button type="button" onclick="loadContent('pages/contact.php');">CONTACT</button></li>
			</ul>

		</div>

		<div id="content">

		</div>

		<?php

			// involved with reloadPageWithMessage function

			if(isset($_POST['page'])){

				$page = $_POST['page'];
				echo "<script>loadContent('pages/$page');</script>";
			}
			else {

				$page = "home.php";
				echo "<script>loadContent('pages/$page');</script>";
			}

			if(isset($_POST['msg'])){

				$msg = $_POST['msg'];
				echo "<script>alert('$msg');</script>";
			}
		?>

	</body>
	
</html>