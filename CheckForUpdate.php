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
			<label for="">Table</label>
				<?php
				$login = $_POST['login'];
				$password = $_POST['password'];
				$name = $_POST['name'];
				$secondname = $_POST['secondname'];
				$id = $_POST['id'];
				if($_SESSION['login']!="admin" && $_SESSION['password']){
					$_SESSION['login'] = $_POST['login'];
					$_SESSION['password'] = $_POST['password'];
				}
				
				$con = mysqli_connect("localhost","root", "", "login"); 
				if(isset($_POST['log'])){
					$login = mysqli_real_escape_string($con,$login);
					$password = mysqli_real_escape_string($con,$password);
					
					if(isset($_FILES['uploadfile']['name'])&&($_FILES['uploadfile']['name'])!=''){
						$uploaddir = './uploads/';
						$uploadfile = $uploaddir . basename($_FILES['uploadfile']['name']);
						move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile);
						$select = "UPDATE users SET photo='./uploads/" . $_FILES['uploadfile']['name'] . "' WHERE id='$id'";
						$result = mysqli_query($con, $select);	
					}
						
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
						mysqli_close($con);
						header("Location: login.php");
					}
				mysqli_close($con);
				?>
				
			<form class="" action="process.php" method="POST">
			</form>
			<script>document.getElementsByTagName('form')[0].submit();</script>
		</div>
</body>
</html>