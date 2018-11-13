
				<?php
				session_start();
				$login = $_POST['login'];
				$password = $_POST['password'];
				$name = $_POST['name'];
				$secondname = $_POST['secondname'];
				$id = $_POST['id'];
				if($_SESSION['login']!="admin" && $_SESSION['password']){
					$_SESSION['login'] = $_POST['login'];
					$_SESSION['password'] = $_POST['password'];
				}
				
				$con = mysqli_connect("localhost","root", "", "login"); 
					$login = mysqli_real_escape_string($con,$login);
					$password = mysqli_real_escape_string($con,$password);
					
					if(isset($_FILES['uploadfile']['name'])&&($_FILES['uploadfile']['name'])!=''){
						$uploaddir = './uploads/';
						$uploadfile = $uploaddir . basename($_FILES['uploadfile']['name']);
						move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile);
						$select = "UPDATE users SET photo='./uploads/" . $_FILES['uploadfile']['name'] . "' WHERE id='$id'";
						$result = mysqli_query($con, $select);	
					}
						
					$select = "UPDATE users SET login='$login' WHERE id='$id'";
					$result = mysqli_query($con, $select);
					$select = "UPDATE users SET password='$password' WHERE id='$id'";
					$result = mysqli_query($con, $select);
					$select = "UPDATE users SET name='$name' WHERE id='$id'";
					$result = mysqli_query($con, $select);
					$select = "UPDATE users SET secondname='$secondname' WHERE id='$id'";
					$result = mysqli_query($con, $select);

				//print_r($_FILES);

					if(isset($_FILES['audio']['name'])&&($_FILES['audio']['name'])!=''){
						$uploaddir = './uploads/';
						$uploadfile = $uploaddir . basename($_FILES['audio']['name']);
						move_uploaded_file($_FILES['audio']['tmp_name'], $uploadfile);
						$select = "UPDATE users SET audio='./uploads/" . $_FILES['audio']['name'] . "' WHERE id='$id'";
						$result = mysqli_query($con, $select);	
					}

					if(strpos($_POST['vidosik'], 'yout')){
						$select = "UPDATE users SET video='" . $_POST['vidosik'] . "' WHERE id='$id'";
						$result = mysqli_query($con, $select);
					}
					else{
						if(isset($_FILES['vidosik']['name'])&&($_FILES['vidosik']['name'])!=''){
						$uploaddir = './uploads/';
						$uploadfile = $uploaddir . basename($_FILES['vidosik']['name']);
						move_uploaded_file($_FILES['vidosik']['tmp_name'], $uploadfile);
						$select = "UPDATE users SET video='./uploads/" . $_FILES['vidosik']['name'] . "' WHERE id='$id'";
						$result = mysqli_query($con, $select);	
					}
					}
				/*$query = "SELECT url FROM media WHERE id='" . $_POST['id'] . "' AND type='" . $_POST['type'] . "'";
				$result = $conn->query($query);
				if (!mysqli_num_rows($result)){
					$id = $_POST['id'];
					$type = $_POST['type'];
					if ($_POST['type'] == "video"){
						move_uploaded_file($_FILES['file']['tmp_name'],'../video/'. $_FILES['file']['name']);
						$url = '../video/'. $_FILES['file']['name'];
					}else{
						move_uploaded_file($_FILES['file']['tmp_name'],'../audio/'. $_FILES['file']['name']);
						$url = '../audio/'. $_FILES['file']['name'];	
					}
					$query = "INSERT INTO media VALUES" .
				                "('','$id','$type','$url')";
					$conn->query($query);
				}else{
					if ($_POST['type'] == "video"){
						move_uploaded_file($_FILES['file']['tmp_name'],'../video/'. $_FILES['file']['name']);
						$url = '../video/'. $_FILES['file']['name'];
					}else{
						move_uploaded_file($_FILES['file']['tmp_name'],'../audio/'. $_FILES['file']['name']);
						$url = '../audio/'. $_FILES['file']['name'];	
					}
					$query = "UPDATE media SET url='" . $url . "' WHERE id='" . $_POST['id'] . "' AND type='" . $_POST['type'] . "'";   
					$conn->query($query);
				}*/
		
				mysqli_close($con);
				?>
