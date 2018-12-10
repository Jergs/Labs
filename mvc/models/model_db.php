<?php

	class Model_db extends Model{

		function delete($id){
			session_start();
			$con = mysqli_connect("localhost","root", "", "login");
			$select = "DELETE FROM users WHERE id='$id'";
			$result = mysqli_query($con, $select);
			mysqli_close($con);
		}

		function change_user($id){
		session_start();	
		$con = mysqli_connect("localhost","root", "", "login"); 
			if($_SESSION['role']!= "admin"){
				$login = $_SESSION['login'];
				$password = $_SESSION['password'];
				$id=$_SESSION['id'];
			}
			else{
				$select = "SELECT * FROM users WHERE id ='$id'";
				$result = mysqli_query($con, $select);
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$login = $row['login'];
				$password=$row['password'];
				$login = mysqli_real_escape_string($con,$login);
				$password = mysqli_real_escape_string($con,$password);
			}
			if($login!="" && $password!=""){
				$select = "SELECT * FROM users WHERE login ='$login' and password ='$password'";
				$result = mysqli_query($con, $select);
				$count = mysqli_num_rows($result);
				if( $count == 0){
					mysqli_close($con);
					header("Location: NoUser.html");
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
			$page = "";
				$page = $page . '<label for="">Cabinet</label>';
				$page = $page . '<form id="my_form" enctype="multipart/form-data">';
				$page = $page . '<input type="text" name="login" id="f_login" value="'.$row["login"].'">';
				$page = $page . '<input type="password" name="password" id="f_password" value="'.$row["password"].'">';
				$page = $page . "<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br><br>";
				$page = $page . '<input id="f_image" type="file" class="upload" name="uploadfile">';
				$page = $page . '<input type="text" name="name" id="f_name" value="'.$row["name"].'">';
				$page = $page . '<input type="text" name="secondname" id="f_secondname" value="'.$row["secondname"].'">';
				$page = $page . '<input type="hidden" name="id" id="f_id" value="'.$row["id"].'">';
				$page = $page . '<input type="file" id="audio_fill">';
				$page = $page . '<video controls></video>';
				$page = $page . '<input type="file" id="video_fill">';
				$page = $page . '<iframe src="" allowfullscreen allow="autoplay; encrypted-media" id="youtube_frame"></iframe>';
				$page = $page . '<input type="text" id="youtube_input">';
				$page = $page . '<button id="sub_btn" type="button" class="btn" name="log">Save</button>';
				$page = $page . '</form>';
				mysqli_close($con);

			return $page;
		}

		function add($login,$password,$name,$secondname,$role,$photo,$tmp_photo){
			session_start();
			$con = mysqli_connect("localhost","root", "", "login"); 
				$login = mysqli_real_escape_string($con,$login);
				$password = mysqli_real_escape_string($con,$password);
				$select = "INSERT INTO users (name,secondname,login,password,role)
						VALUES ('". $name . "','" . $secondname . "','" . $login . "','" . $password . "','" .$role ."')"; 
				$result = mysqli_query($con, $select);
				$uploaddir = '../../uploads/';
				$uploadfile = $uploaddir . basename($photo);
				move_uploaded_file($tmp_photo, $uploadfile);
				$select = "UPDATE users SET photo='./uploads/" . $photo . "' WHERE login='$login' AND password='$password'";
				$result = mysqli_query($con, $select);	
			mysqli_close($con);
		}
	}


?>