<?php 
	session_start();
	?>
	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
		<div class="container">
			<label for="">Add Page</label>
			<form class="" action="add.php" method="POST">
				<input type="text" name="login" placeholder="login" value="">
				<input type="password" name="password" placeholder="password" value="">
				<input type="text" name="name" placeholder="name" value="">
				<input type="text" name="secondname" placeholder="secondname" value="">
				<input type="text" name="photo" placeholder="photo link" value="">
				<button type="submit" class="btn" name="log">Add</button>
			</form>
		</div>
</body>
</html>