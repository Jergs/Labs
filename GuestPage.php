<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Guest Page</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
		<div class="container">
			<label for=""> Table</label>
			<?php
				$con = mysqli_connect("localhost","root", "", "login"); 
				$select = "SELECT * FROM users";
				$result = mysqli_query($con, $select);
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					echo "<br>
						login: $row[login]";
						echo"<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br>
						Name: $row[name] <br>
						SecondName: $row[secondname]<br>";
				}
				mysqli_close($con);
			?>
			<form class="" action="login.php">
				<button type="submit" class="btn" name="log">Login</button>
			</form>
		</div>	
</body>
</html>