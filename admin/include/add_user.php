<?php
$username = $password = $conf_password = $fname = $lname = $user_email ="" ;
	if(isset($_POST['user_submit'])){
		// print_r($_POST);
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conf_password = $_POST['conf_password'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];

		// $user_image = $_POST['user_image'];

		$user_image = $_FILES['user_image']['name'];
		$phototmp = $_FILES['user_image']['tmp_name'];
		move_uploaded_file($phototmp, "../user_image/$user_image");

		$user_email = $_POST['user_email'];
		$user_role = $_POST['user_role'];
		// insert Query
		if(empty($username) || $username == ""){
			$error = "Your user name is empty";
		}else if (empty($password) || $password == "") {
			$error = "Please enter your password";
		}else if(empty($conf_password) || $conf_password == ""){
			$error = "Please Re-enter your password";
		}else if ($password != $conf_password) {
			$error = "Your password is not same";
		}else if (empty($fname) || $fname == "") {
			$error = "Your first name is invalid";
		}else if (empty($lname) || $lname == "") {
			$error = "Your last name is invalid";
		}else if (empty($user_email) || $user_email == "") {
			$error = "Your email is invalid";
		}else if (empty($user_image) || $user_image == "") {
			$error = "Select an image";
		}else if (empty($user_role) || $user_role == "") {
			$error = "Your user role invalid";
		}else{

			$user_insert_query ="INSERT INTO `users` (`username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`)";
			$user_insert_query .="VALUES ('{$username}', '{$password}', '{$fname}', '{$lname}', '{$user_email}', '{$user_image}', '{$user_role}')";
			$user_query_select = mysqli_query($dbconnect, $user_insert_query);
			// confirmQuery($user_query_select);
			if($user_query_select){
				echo "<p style='color:green;'>User added successfully <a href='../admin/users.php'>View all users</a></p>";
			}
				
			}

		}


?>

<?php
	if(isset($error)){
		echo "<p style='color:red'>{$error}</p>";
	}


?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="username">User name</label>
		<input type="text" value="<?php echo $username?>" class="form-control" name="username" >
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" value="<?php echo $password?>" class="form-control" name="password" >
	</div>
	<div class="form-group">
		<label for="conf_password">Conform Password</label>
		<input type="password" value="<?php echo $conf_password?>" class="form-control" name="conf_password" >
	</div>

	<div class="form-group">
		<label for="fname">First Name</label>
		<input type="text" value="<?php echo $fname?>" class="form-control" name="fname" >
	</div>
	<div class="form-group">
		<label for="lname">Last name</label>
		<input type="text" value="<?php echo $lname?>" class="form-control" name="lname">
	</div>
	<div class="form-group">
		<label for="user_email">User Email</label>
		<input type="email" value="<?php echo $user_email?>" class="form-control" name="user_email">
	</div>
	<div class="form-group">
	  <label for="company">User role</label>
	   <select id="sel1" name="user_role">
	    <option value="" selected hidden>Select role</option>
	    <option value="admin">admin</option>
	    <option value="subscriber">Subscriber</option>
	  </select>
	</div>
	<div class="form-group">
		<label for="user_image">Post photo</label>
		<input type="file" name="user_image">
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary"  name="user_submit">
	</div>
</form>