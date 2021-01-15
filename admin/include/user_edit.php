<?php
if(isset($_GET['user_edit'])){
	$user_id_get = $_GET['user_edit'];
	$user_select_sql = "SELECT * FROM users WHERE user_id = {$user_id_get}";
	$user_select_cont = mysqli_query($dbconnect, $user_select_sql);
	while($row = mysqli_fetch_assoc($user_select_cont)){

		$username = $row['username'];
		$password = $row['user_password'];
		$conf_password = $row['user_password'];
		$fname = $row['user_firstname'];
		$lname = $row['user_lastname'];

		$user_image = $row['user_image'];

		// $user_image = $_FILES['user_image']['name'];
		// $phototmp = $_FILES['user_image']['tmp_name'];
		// move_uploaded_file($phototmp, "../user_image/$user_image");

		$user_email = $row['user_email'];
		$user_role = $row['user_role'];


	}



}

if(isset($_POST['user_submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];
		$conf_password = $_POST['conf_password'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];

		// $user_image = $_POST['user_image'];

		$user_image = $_FILES['user_image']['name'];
		$phototmp = $_FILES['user_image']['tmp_name'];
		move_uploaded_file($phototmp, "../user_image/$user_image");
		if(empty($user_image)){
			$user_edit_img = "SELECT * FROM users WHERE user_id = {$user_id_get}";
			$user_edit_cont = mysqli_query($dbconnect, $user_edit_img);
			while($useredit_img = mysqli_fetch_assoc($user_edit_cont)){
				$user_image = $useredit_img['user_image'];
			}
		}

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

			$user_edit_query ="UPDATE `users` SET `username` = '{$username}', `user_password` = '{$password}', `user_firstname` = '{$fname}', `user_lastname` = '{$lname}', `user_email` = '{$user_email}', `user_image` = '{$user_image}', `user_role` = '{$user_role}' WHERE `users`.`user_id` = $user_id_get";

			$user_query_select = mysqli_query($dbconnect, $user_edit_query);

			if($user_query_select){
				echo"<script>alert('Your Account has been Updated successfully, Thanks')</script>";
			}else{
				echo "jjjj";
			}

		}


}



?>

<?php




?>
<?php
	if(isset($error)){
		echo $error;
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
	    <option value="<?php echo $user_role ?>" selected hidden ><?php echo $user_role ?></option>
	    <option value="admin">admin</option>
	    <option value="subuser">user</option>
	  </select>
	</div>
	<div class="form-group">
		<label for="user_image">Post photo</label>
		<input type="file" name="user_image">
		<div>
			<img style="max-width: 150px; padding: 20px 0;" src="../user_image/<?php echo $user_image ?>">
		</div>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary"  name="user_submit">
	</div>
</form>