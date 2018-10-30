<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){
        $(".del_btn").click(function(){
        	var del_id=$(this).attr("id");
			$.ajax({
				type: 'POST',
				url:"DeleteUser.php",
				data:{id:del_id},
			}).done(function(result){
				$.get("newProcess.php",function(data){
					$("#net").html(data);
				}, "html"
			);
			});
		});

		$(".info_btn").click(function(){
        	var info_id=$(this).attr("id");
       		localStorage.setItem("UserId",info_id);
       		window.location.href="User.html";
		});

		$("#add").click(function(){
			window.location.href="addUser.html";
		});
    });
</script>	

<?php
session_start();
	$login=$_SESSION['login'];
	$password=$_SESSION['password'];
	$role=$_SESSION['role'];
	$con = mysqli_connect("localhost","root", "", "login"); 
	$select = "SELECT * FROM users";
	$result = mysqli_query($con, $select);
	$count=1;
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$idnum = $row['id'];
		echo "<div id='form_".$row['id']."'>";
		echo "<br>";
		echo "<button type='button' class='info_btn' id='".$row['id']."'>".$count."</button>";
		$count++;
		if($role == 'admin'){
			echo "<button type='button' class='del_btn' id='".$row['id']."'>X</button>";
		}	
		
		echo "
		login: $row[login]";
		echo"<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br>
		Name: $row[name] <br>
		SecondName: $row[secondname]<br>";
		echo "</div>";
	}
	mysqli_close($con);
	if($role== 'admin'){
		echo "<button type='button' class='btn' id='add'>AddUser</button>";
	}
?>