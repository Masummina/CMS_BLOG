<?php
	include 'db.php';
	session_start();
	if(isset($_POST['login_submit'])){
		$login_username = $_POST['login_username'];
		$login_password = $_POST['login_password'];
		//$login_username = mysqli_real_escape_string($dbconnect, $login_username);
		//$login_password = mysqli_real_escape_string($dbconnect, $login_password);
		$login_query = "SELECT * FROM users WHERE username = '{$login_username}'";
		$login_query_cont = mysqli_query($dbconnect, $login_query);
		if(!$login_query_cont){
			 echo "Failed to connect to MySQL: " . mysqli_error($dbconnect);
		}else{
			while($selectquery = mysqli_fetch_array($login_query_cont)){
				$userid = $selectquery['user_id'];
				$username = $selectquery['username'];
				$user_password = $selectquery['user_password'];
				$user_firstname = $selectquery['user_firstname'];
				$user_lastname = $selectquery['user_lastname'];
				$user_email = $selectquery['user_email'];
				$user_role = $selectquery['user_role'];
				$user_randsalt = $selectquery['user_randsalt'];
			}
		}

			if($username == $login_username && $user_password == $login_password){
					$_SESSION['user_id'] = $userid;
					$_SESSION['username'] = $username;
					// echo $username. "<br>";
					$_SESSION['user_password'] = $user_password;
					$_SESSION['user_firstname'] = $user_firstname;
					$_SESSION['user_lastname'] = $user_lastname;
					$_SESSION['user_email'] = $user_email;
					$_SESSION['user_role'] = $user_role;
					header("location: ../admin/index.php");
					echo "yes";
				}else{
					header('location: ../index.php');
				}

		}
		

?>
