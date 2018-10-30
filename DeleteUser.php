<?php
	session_start();
	$id = $_POST['id'];
	
	$con = mysqli_connect("localhost","root", "", "login");
		//if(isset($_POST['log'])){
			$select = "DELETE FROM users WHERE id='$id'";
			$result = mysqli_query($con, $select);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		//}
		
		mysqli_close($con);
		//header("Location: process.php");
?>
	