<?php

	class Model_media extends Model{

		function check_updates($login, $password, $name, $secondname, $id){
			session_start();
				if($_SESSION['login']!="admin" && $_SESSION['password']){
					$_SESSION['login'] = $login;
					$_SESSION['password'] = $password;
				}
				
				$con = mysqli_connect("localhost","root", "", "login"); 
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
				mysqli_close($con);
		}


		function update($name, $tmp_name,$id,$type){
			$con = mysqli_connect("localhost","root", "", "login"); 
				$uploaddir = '../../uploads/';
				$uploadfile = $uploaddir . basename($name);
				move_uploaded_file($tmp_name, $uploadfile);
				$select = "UPDATE users SET " . $type ."='./uploads/" . $name . "' WHERE id='$id'";
				$result = mysqli_query($con, $select);	
			mysqli_close($con);
		}

		function update_youtube($name,$id){
			$select = "UPDATE users SET video='" . $_POST[$name] . "' WHERE id='$id'";
			$result = mysqli_query($con, $select);
		}

	}


?>