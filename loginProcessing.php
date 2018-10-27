<?php
session_start();
	$login=$_POST['login'];
	$password=$_POST['password'];
	$con = mysqli_connect("localhost","root", "", "login"); 
	//if(isset($_POST['log'])){
	$login = mysqli_real_escape_string($con,$login);
	$password = mysqli_real_escape_string($con,$password);
				
	if($login!="" && $password!=""){
		$select = "SELECT * FROM users WHERE login = '$login' and password = '$password'";
		$result1 = mysqli_query($con, $select);
		$count = mysqli_num_rows($result1);
		$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
		if( $count == 0){
			mysqli_close($con);
			header("Location: NoUser.php");
		}
		else{

			$_SESSION['login']=$_POST['login'];
			$_SESSION['password']=$_POST['password'];

			$role;
			$select = "SELECT role FROM users WHERE login='$login' AND password='$password'";
			$result = mysqli_query($con, $select);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$role = $row['role'];
			$_SESSION['role'] = $role;
			mysqli_close($con);
			header("Location: process.php");
		}
	}
	else{
		mysqli_close($con);
		header("Location: login.php");
	}
?>