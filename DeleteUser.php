<?php
	session_start();
	$id = $_POST['id'];
	
	$con = mysqli_connect("localhost","root", "", "login");
			$select = "DELETE FROM users WHERE id='$id'";
			$result = mysqli_query($con, $select);
		mysqli_close($con);
?>
	