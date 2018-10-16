<?php
session_start();
	$login = $_POST['login'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$secondname = $_POST['secondname'];
	$photo = $_POST['photo'];

	$con = mysqli_connect("localhost","root", "", "login"); 
	if(isset($_POST['log'])){
		$login = mysqli_real_escape_string($con,$login);
		$password = mysqli_real_escape_string($con,$password);
		$select = "INSERT INTO users (name,secondname,login,password,photo)
				VALUES ('". $name . "','" . $secondname . "','" . $login . "','" . $password . "','" . $photo . "')"; 
		$result = mysqli_query($con, $select);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	else{
		echo "error";
	}
	mysqli_close($con);
		header("Location: admin.php");
	?>