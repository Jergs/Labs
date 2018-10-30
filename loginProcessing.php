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
			//header("Location: NoUser.php");
			echo "noUser";
		}
		else{

			$_SESSION['login']=$_POST['login'];
			$_SESSION['password']=$_POST['password'];
			$_SESSION['id']=$row1['id'];

			$role;
			$select = "SELECT role FROM users WHERE login='$login' AND password='$password'";
			$result = mysqli_query($con, $select);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$role = $row['role'];
			$_SESSION['role'] = $role;
			mysqli_close($con);
			//header("Location: index.html");
			echo "index";
		}
	}
	else{
		mysqli_close($con);
		echo "login";
		//header("Location: login.php");
	}
?>