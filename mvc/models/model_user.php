<?php

	class Model_user extends Model{


	function get_user_page($id){
		session_start();
		$page = "";
		$login = $_SESSION['login'];
		$password = $_SESSION['password'];
		$role=$_SESSION['role'];
		$con = mysqli_connect("localhost","root", "", "login");
		$login = mysqli_real_escape_string($con,$login);
		$password = mysqli_real_escape_string($con,$password);
		$select = "SELECT * FROM users WHERE id='$id'";
		$result = mysqli_query($con, $select);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$page = $page . "<br>
			login: $row[login]";
			$page = $page ."<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br>";
			$page = $page . "Name: $row[name] <br>
			SecondName: $row[secondname]<br>";
			$page = $page . '<audio controls loop src="'.$row['audio'].'"></audio>';
			if (strpos($row['video'], 'yout')){
				$page = $page . '<iframe src="'.$row['video'].'" allowfullscreen allow="autoplay; encrypted-media" id="youtube_frame"></iframe>';
			}
			else{
				$page = $page . '<video controls height="200" width="500" src="'.$row['video'].'"></video>';
			}

		if($id==$_SESSION['id'] || $role=="admin"){
			$page = $page . "<button type='button' class='info_btn' id='".$row['id']."'>Change</button>";
		}
		$page = $page . "<button type='button' class='btn' id='back'>Back</button>";
	mysqli_close($con);
	return $page;
	}

	function get_page(){
		session_start();
		$page = "";
		$flag = 0;
		if(isset($_SESSION['login']) && isset($_SESSION['password'])){
			$login=$_SESSION['login'];
			$password=$_SESSION['password'];
			$role=$_SESSION['role'];
			$flag = 1;	
		}
		$con = mysqli_connect("localhost","root", "", "login"); 
		$select = "SELECT * FROM users";
		$result = mysqli_query($con, $select);
		$count=1;
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$idnum = $row['id'];
			$page = $page .  "<div id='form_".$row['id']."'>";
			$page = $page .  "<br>";
			if($flag==1){
				$page = $page .  "<button type='button' class='info_btn' id='".$row['id']."'>".$count."</button>";
				$count++;
				if($role == 'admin'){
					$page = $page .  "<button type='button' class='del_btn' id='". $row['id'] ."'>X</button>";
				}	
			}
			$page = $page .  "
			login: $row[login]";
			$page = $page . "<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br>
			Name: $row[name] <br>
			SecondName: $row[secondname]<br>";
			$page = $page .  "</div>";
		}
		mysqli_close($con);

		if($flag == 1){
			if($role== 'admin'){
				$page = $page .  "<button type='button' class='btn' id='add'>AddUser</button>";
			}
			$page = $page . '<a href="Logout.php"> Log out</a>';
		}	
		else{
			$page = $page . '<a href="login.html"> Log In</a>';
		}

		return $page;
	}

	function  log_in($login,$password){
		session_start();
		$con = mysqli_connect("localhost","root", "", "login"); 
		$login = mysqli_real_escape_string($con,$login);
		$password = mysqli_real_escape_string($con,$password);
					
		if($login!="" && $password!=""){
			$select = "SELECT * FROM users WHERE login = '$login' and password = '$password'";
			$result1 = mysqli_query($con, $select);
			$count = mysqli_num_rows($result1);
			$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
			if( $count == 0){
				mysqli_close($con);
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
				echo "index";
			}
		}
		else{
			mysqli_close($con);
			echo "login";
		}
	}
}


?>