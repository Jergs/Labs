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
			<label for=""> Table</label>
				<?php
				$login = $_POST['login'];
				$password = $_POST['password'];
				$name = $_POST['name'];
				$secondname = $_POST['secondname'];
				$id = $_POST['id'];

				$_SESSION['login'] = $_POST['login'];
				$_SESSION['password'] = $_POST['password'];
				
				$con = mysqli_connect("localhost","root", "", "login"); 
				if(isset($_POST['log'])){
					$login = mysqli_real_escape_string($con,$login);
					$password = mysqli_real_escape_string($con,$password);
					
					$select = "UPDATE users SET login='$login' WHERE id='$id'";
					$result = mysqli_query($con, $select);
					$select = "UPDATE users SET password='$password' WHERE id='$id'";
					$result = mysqli_query($con, $select);
					$select = "UPDATE users SET name='$name' WHERE id='$id'";
					$result = mysqli_query($con, $select);
					$select = "UPDATE users SET secondname='$secondname' WHERE id='$id'";
					$result = mysqli_query($con, $select);
					}
					else{
						header("Location: login.php");
					}
				mysqli_close($con);
				?>
				
			<form class="" action="process.php" method="POST">
				<input type="hidden" name="login" value="<?php echo $_SESSION['login']; ?>">
				<input type="hidden" name="password" value="<?php echo $_SESSION['password']; ?>">
			</form>
			<script>document.getElementsByTagName('form')[0].submit();</script>
		</div>
</body>
</html>