<?php

$first_name = "";
$last_name = "";
$email = "";
$username = "";

if(isset($_GET['first_name'])) {
	$first_name = $_GET['first_name'];
}
if(isset($_GET['last_name'])) {
	$last_name = $_GET['last_name'];
}
if(isset($_GET['email'])) {
	$email = $_GET['email'];
}
if(isset($_GET['username'])) {
	$username = $_GET['username'];
}

?>

<h2><span style="color: yellow;">REGISTER</span> TO BECOME A USER</h2>

<form action="../register.php" method="POST">

	<p>First Name:</p>
	<input type="text" name="first_name" value="<?php echo $first_name ?>"/><br/>
	<p>Last Name:</p>
	<input type="text" name="last_name" value="<?php echo $last_name ?>"><br/>
	<p>Email:</p>
	<input type="text" name="email" value="<?php echo $email ?>"/><br/>
	<p>Username:</p>
	<input type="text" name="username" value="<?php echo $username ?>"/><br/>
	<p>Password:</p>
	<input type="password" name="password" value=""/><br/>
	<input type="submit" name="submit" value="R E G I S T E R" style="margin: 15px 0 10px 0;"/>

</form>
