<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Login Page</title>
	<link rel="stylesheet" type="text/css" href="NoUserStyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		$(document).on("click","#login_btn",function(){
			window.location.href="login.php";
		});
	});
	</script>	
</head>
<body>
	<form class="">
		<div class="container">
			<label for=""> No such user</label>
			<a href="GuestPage.php"> Login as a guest</a>
			<button type="button" class="btn" id="login_btn">Return</button>
		</div>	
	</form>
</body>
</html>