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

<div class="table">
<label for=""> User info</label>
	<?php
		$login = $_SESSION['login'];
		$password = $_SESSION['password'];
		$id = $_POST['id'];
		$con = mysqli_connect("localhost","root", "", "login");
		if(isset($_POST['log'])){
			$login = mysqli_real_escape_string($con,$login);
			$password = mysqli_real_escape_string($con,$password);
			$select = "SELECT * FROM users WHERE id='$id'";
			$result = mysqli_query($con, $select);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo "<br>
				login: $row[login]";
				echo"<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br>
				Name: $row[name] <br>
				SecondName: $row[secondname]<br>";
			if($login=="admin" && $password=="admin"){
				$log = $row['login'];
				$pass = $row['password'];
				echo "<br>
				<form class='' action='UserPage.php' method='POST'>
					<input type='hidden' name='login' value='$log'>
					<input type='hidden' name='password' value='$pass'>
					<button type='submit' class='info_btn' name='log'>Change</button>
				</form>";
			}
		}
		?>

	<form class="" action="process.php" method="POST">
			<button type="submit" class="btn" name="log">Back</button>	
	</form>
</div>
</body>
</html>