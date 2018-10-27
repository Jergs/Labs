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
					$login=$_SESSION['login'];
					$password=$_SESSION['password'];
					$role=$_SESSION['role'];

					$con = mysqli_connect("localhost","root", "", "login"); 
					$select = "SELECT * FROM users";
					$result = mysqli_query($con, $select);
					$count=1;
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						$idnum = $row['id'];
						echo "<br>
						<form class='' action='User.php' method='POST'>
							<input type='hidden' name='id' value='$idnum'>
							<button type='submit' class='info_btn' name='log'>$count</button>
						</form>";
						$count++;
						if($role == 'admin'){
							echo "
							<form class='' action='DeleteUser.php' method='POST'>
								<input type='hidden' name='id' value='$idnum'>
								<button type='submit' class='delete_btn' name='log'>X</button>
							</form>";
						}
		
						echo "
						login: $row[login]";
						echo"<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br>
						Name: $row[name] <br>
						SecondName: $row[secondname]<br>";
					}
					mysqli_close($con);
					if($role== 'admin'){
							echo "<br><form class='' action='addUser.php' method='POST'>
									<button type='submit' class='btn' name='log'>AddUser</button>
								</form>";
						}
			
				if(!($role == 'admin')){
					echo "<form class='' action='UserPage.php' method='POST'>
						<button type='submit' class='btn' name='log'>ChangeSettings</button>
					</form>";
				}
				?>
		<a href="Logout.php"> Log out</a>
		</div>	
</body>
</html>