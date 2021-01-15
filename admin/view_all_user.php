
                    <!-- comments show -->
        <table class="table table-bordered table-hover">
		<thead style="background: #777; color: #fff">
			<tr>
				<th>Id</th>
				<th>username</th>
				<th>Password</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
				<th>Image</th>
				<th>Role</th>
				<th>user change</th>
				<th>Action</th>
			</tr>
		</thead>
		
			<?php
				$user_query = "SELECT * FROM users";
				$select_user = mysqli_query($dbconnect, $user_query);
				$row_count = mysqli_num_rows($select_user);
				if($row_count > 0){
					while($row = mysqli_fetch_assoc($select_user)){
						$user_id = $row['user_id'];
						$username = $row['username'];
						$user_password = $row['user_password'];
						$user_firstname = $row['user_firstname'];
						$user_lastname = $row['user_lastname'];
						$user_email = $row['user_email'];
						$user_image = $row['user_image'];
						$user_role = $row['user_role'];
						echo "<tbody>";
						echo "<td>$user_id</td>";
						echo "<td>$username</td>";
						echo "<td>$user_password</td>";
						echo "<td>$user_firstname</td>";
						echo "<td>$user_lastname</td>";
						echo "<td>$user_email</td>";
						echo "<td> <img style='max-width:90px;' src='../user_image/$user_image'></td>";
						echo "<td>$user_role</td>";
						echo "<td><a href='users.php?sourcead={$user_id}'>Admin</a> / <a href='users.php?sourcesub={$user_id}'>user</a></td>";
       					echo "<td>
       					<a href='users.php?delete={$user_id}'>Delete</a><br>
       					<a class='btn btn-primary' href='users.php?source=user_edit&user_edit={$user_id}'>Edit</a>
       					</td>";
       					echo "</tbody>";
					}
				}else{
					echo "No user Yet";
				}
				

			?>
    	</table>

    	<?php
    	if(isset($_GET['delete'])){
    		$delete_user = $_GET['delete'];
    		$user_delete_query = "DELETE FROM users WHERE user_id = $delete_user";
    		$user_delete = mysqli_query($dbconnect, $user_delete_query);
    		if($user_delete){
    			header("location: users.php");
    		}
    	}


    	// change admin or superadmin
    	if(isset($_GET['sourcesub'])){
    		$adminuser = $_GET['sourcesub'];
    		$user_role_query = "UPDATE users SET user_role = 'user' WHERE user_id = $adminuser";
    		$suer_approve = mysqli_query($dbconnect, $user_role_query);
    		if($suer_approve){
    			header("location: users.php");
    		}
    	}
    	if(isset($_GET['sourcead'])){
    		$adminuser = $_GET['sourcead'];
    		$user_role_query = "UPDATE users SET user_role = 'admin' WHERE user_id = $adminuser";
    		$suer_approve = mysqli_query($dbconnect, $user_role_query);
    		if($suer_approve){
    			header("location: users.php");
    		}
    	}



    	?>



                    <!-- comments end -->

