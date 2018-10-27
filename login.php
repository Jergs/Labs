<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form class="" action="loginProcessing.php" method="POST">
		<div class="container">
			<label for=""> Sign up</label>
			<input type="text" name="login" placeholder="login" value="">
			<input type="password" name="password" placeholder="password" value="">
			<a href="GuestPage.php"> Login as a guest</a>
			<button type="submit" class="btn" name="log">Login</button>
		</div>	
	</form>
</body>
</html>
			