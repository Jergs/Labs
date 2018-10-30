
				<?php
				session_start();
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
		
				mysqli_close($con);
				?>
