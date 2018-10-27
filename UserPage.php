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
			<label for="">Cabinet</label>
			<?php
				
				if($_SESSION['login']!= "admin" && $_SESSION['password']!="admin"){
					$login = $_SESSION['login'];
					$password = $_SESSION['password'];
				}
				else{
					$login = $_POST['login'];
					$password = $_POST['password'];
				}
				
				$con = mysqli_connect("localhost","root", "", "login"); 
				if(isset($_POST['log'])){
					$login = mysqli_real_escape_string($con,$login);
					$password = mysqli_real_escape_string($con,$password);
					
					if($login!="" && $password!=""){
						$select = "SELECT * FROM users WHERE login ='$login' and password ='$password'";
						$result = mysqli_query($con, $select);
						$count = mysqli_num_rows($result);
						if( $count == 0){
							mysqli_close($con);
							header("Location: NoUser.php");
						}
						else{
							$result = mysqli_query($con, $select);
							$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						}
					}
					else{
						mysqli_close($con);
						header("Location: login.php");
					}
				}
				mysqli_close($con);
				?>
			<form class="" action="CheckForUpdate.php" method="POST" enctype="multipart/form-data">
				<input type="text" name="login" value="<?php echo $row["login"]; ?>">
				<input type="password" name="password" value="<?php echo $row["password"]; ?>">
				<?php
					echo"<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br><br>";
				?>
				<input type="file" class="upload" name="uploadfile">
				<input type="text" name="name" value="<?php echo $row["name"]; ?>">
				<input type="text" name="secondname" value="<?php echo $row["secondname"]; ?>">
				<input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
				<button type="submit" class="btn" name="log">Save</button>
			</form>
		</div>
</body>
</html>