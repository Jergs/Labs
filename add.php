<?php
session_start();
	$login = $_POST['login'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$secondname = $_POST['secondname'];
	$role= $_POST['role'];

	$con = mysqli_connect("localhost","root", "", "login"); 
		$login = mysqli_real_escape_string($con,$login);
		$password = mysqli_real_escape_string($con,$password);
		$select = "INSERT INTO users (name,secondname,login,password,role)
				VALUES ('". $name . "','" . $secondname . "','" . $login . "','" . $password . "','" .$role ."')"; 
		$result = mysqli_query($con, $select);

		
		$uploaddir = './uploads/';
		$uploadfile = $uploaddir . basename($_FILES['uploadfile']['name']);
		move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile);
		$select = "UPDATE users SET photo='./uploads/" . $_FILES['uploadfile']['name'] . "' WHERE login='$login' AND password='$password'";
		$result = mysqli_query($con, $select);	
	
	mysqli_close($con);
		//header("Location: index.html");
	?>