<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		$(document).on("click","#sub_btn",function(){
			var form_d = new FormData();
			form_d.append("login",document.getElementById("f_login").value);
			form_d.append("password",document.getElementById("f_password").value);
			$.ajax({
				url:"loginProcessing.php",
				type:"POST",
				data:form_d,
				processData:false,
				contentType:false,
				success:function(e){
					switch(e){
						case "index":
							window.location.href = "index.html";
							break;
						case "login":
							window.location.href = "login.php";
							break;
						case "noUser":
							window.location.href = "NoUser.php";
							break;
					}
				}
			});
		});
	});		
</script>
</head>
<body>
	<form class="" method="POST">
		<div class="container">
			<label for="">Sign up</label>
			<input type="text" name="login" id="f_login" placeholder="login" value="">
			<input type="password" name="password" id="f_password" placeholder="password" value="">
			<a href="GuestPage.php"> Login as a guest</a>
			<button type="button" class="btn" id="sub_btn">Login</button>
		</div>	
	</form>
</body>
</html>
			