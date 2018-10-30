<?php 
	session_start();
	?>
	
		<?php

						
				if($_SESSION['role']!= "admin"){
					$login = $_SESSION['login'];
					$password = $_SESSION['password'];
					$id=$_SESSION['id'];
				}
				else{
					$id = $_POST['id'];

				}
					$con = mysqli_connect("localhost","root", "", "login"); 
					$select = "SELECT * FROM users WHERE id ='$id'";
					$result = mysqli_query($con, $select);
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$login = $row['login'];
					$password=$row['password'];
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
				echo '<label for="">Cabinet</label>';
				echo '<form id="my_form" method="POST" enctype="multipart/form-data">';
				echo '<input type="text" name="login" id="f_login" value="'.$row["login"].'">';
				echo '<input type="password" name="password" id="f_password" value="'.$row["password"].'">';
				echo "<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br><br>";
				echo '<input id="f_image" type="file" class="upload" name="uploadfile">';
				echo '<input type="text" name="name" id="f_name" value="'.$row["name"].'">';
				echo '<input type="text" name="secondname" id="f_secondname" value="'.$row["secondname"].'">';
				echo '<input type="hidden" name="id" id="f_id" value="'.$row["id"].'">';
				echo '<button id="sub_btn" type="button" class="btn" name="log">Save</button>';
				echo '</form>';
				mysqli_close($con);
	?>				
